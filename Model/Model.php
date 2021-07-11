<?php
require('_config/Db.php');
abstract class Model
{
	 protected $pdo;
    
    public function __construct(){
		$this->pdo = \db::getPdo();
	}

}