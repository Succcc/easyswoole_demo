<?php

/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/11/20
 * Time: 上午11:52
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */
namespace App\Model;

class User extends BaseModel
{

    public function add(UserBean $bean){
        return $this->db->insert($this->tableName,$bean->toArray($bean::FILTER_TYPE_NOT_NULL));
    }

}