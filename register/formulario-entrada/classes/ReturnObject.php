<?php
/**
 * Created by PhpStorm.
 * User: Home Work
 * Date: 02/08/2014
 * Time: 22:47
 */

class ReturnObject {
    public $status = "success";
    public $message;
    public $data;

    public function expose() {
        return get_object_vars($this);
    }
} 