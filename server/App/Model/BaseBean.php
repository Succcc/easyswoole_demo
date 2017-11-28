<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/20
 * Time: 下午12:04
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Model;


use Core\Component\Spl\SplBean;

class BaseBean extends SplBean
{
    protected $id;
    protected $gmtCreate;
    protected $gmtModified;

    protected function initialize()
    {
        $this->gmtCreate = time();
    }


}