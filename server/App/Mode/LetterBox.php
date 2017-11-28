<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/12
 * Time: 下午10:27
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Mode;


use Swoole\Table;

class LetterBox
{
    /**
     * @var int
     * 参数指定表格的最大行数，如果$size不是为2的N次方，如1024、8192,65536等，底层会自动调整为接近的一个数字
     */
    private $size;
    private $name;
    private $message_length=10;
    private $box;

    function __construct(int $size)
    {
        if(empty($size)){
            $size =  pow(2,8);
        }
        echo "最大行数 {$size}";
        $table = new \Swoole\Table($size);

        $table->column('data',Table::TYPE_STRING, 1);
        $table->column('pad',Table::TYPE_STRING, 1);
        $table->create();

        $table->set(1,[]);
        var_dump($table->get(1));
    }


//    function __destruct()
//    {
//        unset($this->box);
//        echo "unset table";
//    }

    function __debugInfo()
    {
        // TODO: Implement __debugInfo() method.
    }
}

$table = new LetterBox(1024);
var_dump($table);
exit();