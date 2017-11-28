<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/12
 * Time: 上午11:31
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Mode;


use App\Constant\SysConstant;
use Core\AbstractInterface\AbstractAsyncTask;
use Core\Component\Logger;
use Core\Component\ShareMemory;
use Core\Utility\Curl\Request;
use Core\Utility\Curl\UAGenerate;

class Runner extends AbstractAsyncTask
{

    function handler(\swoole_server $server, $taskId, $fromId)
    {
        // TODO: Implement handler() method.
        //记录处于运行状态的task数量
        $share = ShareMemory::getInstance();
        $share->startTransaction();
        $share->set(SysConstant::TASK_RUNNING_NUM,$share->get(SysConstant::TASK_RUNNING_NUM)+1);
        $share->commit();
        $flag = true;
        //while其实为危险操作，while会剥夺进程控制权
        while ($flag){
            $task = Queue::pop();
            if($task instanceof TaskBean){
                $userAgent = UAGenerate::mock(UAGenerate::SYS_OSX, false, UAGenerate::SYS_BIT_X64);
                $opt = [
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_USERAGENT => $userAgent
                ];
                $req = new Request($task->getUrl(),$opt);
                $response = $req->exec();
                $ret = $response->getBody();
                //$cookies = $response->getCookies();
                $err = $response->getError();
                if(!empty($ret)){
                    $images = $this->getimgs($ret);
                    if(!empty($images)){
                        $this->loop($images);
                    }else{
                        var_dump($ret);

                    }
                }else{
                    echo $err."\n";
                }
                Logger::getInstance("curl")->console("finish url:".$task->getUrl());
            }else{
                $flag = false;
            }
        }
//        Logger::getInstance()->console("async task exit");
        $share->startTransaction();
        $share->set(SysConstant::TASK_RUNNING_NUM,$share->get(SysConstant::TASK_RUNNING_NUM)-1);
        $share->commit();
    }


    function finishCallBack(\swoole_server $server, $task_id, $resultData)
    {
        // TODO: Implement finishCallBack() method.
    }

    function getimgs($str) {
        $reg = '/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*(jpg|gif|png)/';
        $matches = array();
        $data = [];
        preg_match_all($reg, $str, $matches);
        foreach ($matches[0] as $value) {
            $data[] = $value;
        }
        return $data;
    }

    function loop($arr){
        if(is_array($arr)){
            foreach ($arr as $item){
                if(is_array($item)){
                    $this->loop($item);
                }else{
                    echo $item.PHP_EOL;
                }
            }
        }else{
            echo $arr.PHP_EOL;
        }
    }
}