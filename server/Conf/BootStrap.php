<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/23
 * Time: 下午5:03
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace Conf;


use Core\AutoLoader;

class BootStrap
{

    /**
     * 文件引入,命名空间注册
     */
    public static function run()
    {
        require_once __DIR__."/../../vendor/autoload.php";// 加载 composer 扩展
        date_default_timezone_set('Asia/Shanghai'); //时区
        //mysql
        AutoLoader::getInstance()->requireFile("App/Utility/Db/MysqliDb.php");
    }

}