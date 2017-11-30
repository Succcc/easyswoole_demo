<?php
/**
 * Created by PhpStorm.
 * User: YF
 * Date: 2017/2/8
 * Time: 11:51
 */

namespace App\Controller\WeChat;

use App\Component\WeChat;
use Conf\Config;
use Core\AbstractInterface\AbstractController;

class Index extends AbstractController
{
    function index()
    {
        $app = WeChat::getInstance()->getApplication();
        $server = $app->server;
        $server->setMessageHandler(function ($message) {
            return "欢迎!";
        });
        $response = $server->serve();
        $content = $response->getContent();
        $this->response()->write($content);
    }


    function onRequest($actionName)
    {
        $param = $this->request()->getRequestParam();
        $echoStr = $param['echostr'] ?? '';
        $timeStamp = $param['timestamp'] ?? '';
        $nonce = $param['nonce'] ?? '';
        $signature = $param['signature'] ?? '';
        if (!empty($echoStr) && !empty($timeStamp) && !empty($nonce) && !empty($signature)) {
            $token = Config::getInstance()->getConf("WE_CHAT_CONF")['token'];
            $res = [$timeStamp, $nonce, $token];
            sort($res);
            $tmpStr = implode('', $res);
            $tmpStr = sha1($tmpStr);
            if ($tmpStr == $signature) {
                $this->response()->write($echoStr);
                $this->response()->end();
            }
        }
    }

    function actionNotFound($actionName = null, $arguments = null)
    {
        // TODO: Implement actionNotFount() method.
        $this->response()->withStatus(Status::CODE_NOT_FOUND);
        $this->response()->write(file_get_contents(ES_ROOT . "/App/Static/404.html"));
    }

    function afterAction()
    {
        // TODO: Implement afterResponse() method.
    }

    function test()
    {
        $this->response()->write("this is 12312");
    }

    function router()
    {
        $this->response()->write("your router not end");
    }

}