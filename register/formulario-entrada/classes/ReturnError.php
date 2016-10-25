<?php
/**
 * Created by PhpStorm.
 * User: Home Work
 * Date: 02/08/2014
 * Time: 22:47
 */

require_once( "ReturnObject.php" );

class ReturnError extends ReturnObject {
    public $type;
    public $file;
    public $line;
} 