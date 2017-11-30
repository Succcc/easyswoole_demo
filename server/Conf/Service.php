<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/20
 * Time: 上午11:30
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace Conf;


use App\Constant\SysConstant;
use Core\Component\Di;
use EasyWeChat\Foundation\Application;

class Service
{

    /**
     * 容器注入
     */
    public static function run()
    {
        $di = Di::getInstance();
        $conf = Config::getInstance();
        /**
         *
         * @see(https://github.com/ThingEngineer/PHP-MySQLi-Database-Class)
         */
        $di->set(SysConstant::DB,\MysqliDb::class,$conf->getConf("DATABASE"));

    }

}