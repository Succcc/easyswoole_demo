<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/30
 * Time: 下午4:55
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Component;
use Conf\Config;
use EasyWeChat\Foundation\Application;

class WeChat
{
    protected static $instance;
    protected $application;
    static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function __construct($config = null)
    {
        if(empty($config)){
            $config = Config::getInstance()->getConf('WE_CHAT_CONF');
        }
        $application = new Application($config);
        $application->server->setRequest(Request::createFromGlobals());
        $this->application = $application;
    }

    public function getApplication(){
        return $this->application;
    }
}