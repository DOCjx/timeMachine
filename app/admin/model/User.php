<?php
namespace app\Admin\Model;
use think\Model;
use think\Request;
use think\Db;
class User extends Model {
	public function getUser(){
		$request = Request::instance();
		$map['user_num'] = $request->session('user_num');
		return $this->where($map)
					->field('nick_name,id')
					->find();
	}
	public function getUserInfo(){
		return $this->order('login_time DESC')
					->select();
	}
	public function editUserInfo($editUserId){
        // var_dump(I('editUserId'));
		return $this->where(array('id'=>array('EQ',$editUserId)))->find();
	}
	public function updataUser(){
		$request = Request::instance();
        $map['id'] = $request->post('editUserId');
        return $this->where($map)
        			->update([
        				'user_num' => $request->post('user_num'),
				        'nick_name' => $request->post('nick_name'),
				        'psd' => $request->post('psd'),
				        'sex' => $request->post('sex'),
				        'qq' => $request->post('qq'),
				        'phone' => $request->post('phone'),
				        'status' => $request->post('status'),
				        'login_last_time'=>time()
        			]);
        
        // return $result;
	}
	public function delUser(){
		// dump($editUserId);
		$request = Request::instance();
		$editUserId = $request->only('editUserId');
		// dump($editUserId);
  //       dump($request->session('id'));
		return db('user')->delete($editUserId);
	}
	public function addUser(){
		$request = Request::instance();
		$datail = [
			'id' => $request->post('id'),
			'user_num' => $request->post('user_num'),
	        'nick_name' => $request->post('nick_name'),
	        'psd' => $request->post('psd'),
	        'sex' => $request->post('sex'),
	        'qq' => $request->post('qq'),
	        'phone' => $request->post('phone'),
	        'login_time' => time(),
			'login_last_time'=>time(),
	        'status' => $request->post('status')
	    ];
        return db('user')->insert($datail);
	}
	public function checkLogin($user_num,$psd){
		$map['user_num'] = $user_num;
		$map['psd'] = $psd;
		$map['status'] = ['<>','0'];
		$userinfo = $this->where($map)
						 ->field('id,status,user_num,nick_name')
						 ->find();
			// var_dump($userinfo);
		db('user')->where($map)->update(['login_last_time' => time()]);
		if( $userinfo ){
			session('id',$userinfo['id']);
			session('status',$userinfo['status']);
			session('user_num',$userinfo['user_num']);
			session('nick_name',$userinfo['nick_name']);
		}
		return $userinfo;
	}
	public function sign(){
		$request = Request::instance();
		// dump(strlen($request->post('user_num')));
		if( strlen($request->post('user_num'))==12 ){
			$datail = [
				'id' => $request->post('id'),
				'user_num' => $request->post('user_num'),
		        'nick_name' => $request->post('nick_name'),
		        'psd' => $request->post('psd'),
		        'sex' => $request->post('sex'),
		        'qq' => $request->post('qq'),
		        'phone' => $request->post('phone'),
		        'login_time' => time(),
				'login_last_time'=>time(),
		        'status' => 1
		    ];
	        return db('user')->insert($datail);
	    }
	}
}