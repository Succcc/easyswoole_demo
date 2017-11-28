<?php

namespace App\Mode;


use App\Utility\Db\Redis;

class Queue
{
    const QUEUE_NAME = 'task_list';
    static function set(TaskBean $taskBean){
        return Redis::getInstance()->rPush(self::QUEUE_NAME,$taskBean);
    }
    static function pop(){
        return Redis::getInstance()->lPop(self::QUEUE_NAME);
    }
}