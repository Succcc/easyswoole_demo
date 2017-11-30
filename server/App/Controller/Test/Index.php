<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/30
 * Time: 下午6:18
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Controller\Test;


use Core\AbstractInterface\AbstractController;

class Index extends AbstractController
{

    public function index()
    {
        $this->response()->write(1123);
    }

    function onRequest($actionName)
    {
        // TODO: Implement onRequest() method.
    }

    function actionNotFound($actionName = null, $arguments = null)
    {
        // TODO: Implement actionNotFound() method.
    }

    function afterAction()
    {
        // TODO: Implement afterAction() method.
    }
}