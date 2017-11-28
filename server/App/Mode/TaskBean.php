<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/12
 * Time: 上午11:30
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Mode;


use Core\Component\Spl\SplBean;

class TaskBean extends SplBean
{
    /*
     * 仅仅做示例，curl opt 选项请自己写
     */
    protected $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    protected function initialize()
    {
        // TODO: Implement initialize() method.
    }
}