<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/12
 * Time: 下午9:39
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Mode;


class Letter
{
    /**
     * 发送者
     */
    private $sender;
    /**
     * 接受者
     */
    private $recipient;
    /**
     * 信息
     */
    private $message;
    /**
     * 信息存放地址
     */
    private $address;
    /**
     * @var bool
     * 是否需要回信
     */
    private $reply = false;
    /**
     * @var
     * 回信地址
     */
    private $reply_address;

    /**
     * @return bool
     */
    public function isReply(): bool
    {
        return $this->reply;
    }

    /**
     * @param bool $reply
     */
    public function setReply(bool $reply)
    {
        $this->reply = $reply;
    }

    /**
     * @return mixed
     */
    public function getReplyAddress()
    {
        return $this->reply_address;
    }

    /**
     * @param mixed $reply_address
     */
    public function setReplyAddress($reply_address)
    {
        $this->reply_address = $reply_address;
    }
    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param mixed $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     * @internal param mixed $addres
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    function __construct()
    {

    }


}