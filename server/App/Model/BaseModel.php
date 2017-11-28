<?php
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/20
 * Time: 上午11:53
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */

namespace App\Model;


use App\Utility\Db\MysqliDb;
use Core\Component\Di;

class BaseModel
{
    protected $db;
    protected $tableName;


    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    protected function setTableName()
    {
        $arr = explode('\\', get_class($this));
        $string = end($arr);
        $arr = preg_split("/(?=[A-Z])/", $string);
        $string = implode('_', $arr);
        $this->tableName = strtolower($string);
    }

    public function __construct()
    {
        $db = Di::getInstance()->get("MYSQL");
        if($db instanceof MysqliDb){
            $this->db = $db;
        }
        $this->setTableName();
    }

    function __debugInfo()
    {
       $this->toString();
    }

    public function toArray()
    {
        $res = [];
        return $res;
    }

    public function toString()
    {
        $arr = $this->toArray();
        return json_encode($arr);
    }

    private function allVarKeys(){
        $data = get_class_vars(static::class);
        unset($data['__varList']);
        return array_keys($data);
    }


}