<?php
namespace app\index\model;

use think\Model;

class Ticket extends Model
{
	public static function getName(){
		$user = new Ticket();
		$user = db('timem_speak')
				->where('status',1)
				->find();
    	return $user;
	}

}