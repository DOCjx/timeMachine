<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;
use app\admin\model\Data;
use think\Db;
use think\Url;
use think\Request;

class Index extends base{
    public function _initialize(){
        parent::_initialize();
    }
    public function index(){
        // dump($this->request->session('status')==2);
        if($this->request->session('status')==2){
            $User = new User();
        	$userName = $User->getUser();
        	$this->assign('userName',$userName['nick_name']);
        	$userInfo = $User->getUserInfo();
        	$this->assign('userInfo',$userInfo);
            return $this->fetch();
        } else {
            return $this->redirect('Index/detail');
        }
    }
    public function editUser($flag, $editUserId){
    	$User = new User();
        $request = Request::instance();
        $userName = $User->getUser();
    	$this->assign('userName',$userName['nick_name']);
        $this->assign('flag',$flag);
    	$userInfo = $User->editUserInfo($editUserId);
    	$this->assign('userInfo',$userInfo);
    	var_dump($request->session('id'));
    	if( !empty($request->session('id') ) ){
            return $this->fetch();
        }
    }
    public function updataUser(){
        $User = new User();
    	$result = $User->updataUser();
            // dump($result);
        if( $result!==FALSE ){
            return $this->success('更新成功！','Index/index');
        } else {
            return $this->error('更新失败！');
        }
    }
    public function delUser(){
        $User = new User();
    	$result = $User->delUser();
    	if( $result ){
            return $this->success('删除成功！','index/index');
        } else {
            return $this->error('删除失败！');
        }
    }
    public function addUser(){
        $User = new User();
    	$result = $User->addUser();
    	if( $result ){
            return $this->success('增加成功！','index/index');
        } else {
            return $this->error('增加失败！');
        }
    }
    public function detail(){
     //    $User = new User();
     //    $Data = new Data();
     //    $userName = $User->getUser();
     //    $this->assign('userName',$userName['nick_name']);
	    // if( $flag){
	    // 	$data = $Data->getGameData();
	    // 	$this->assign('data',$data);
    	// 	$this->assign('page',$Data->dataPage());
	    // 	$this->fetch();
	    // } else {
	    // 	return $this->redirect('Home/Index/index');
	    // }
    }
    public function doData($status){
        $Data = new Data();
    	$doData = $Data->doData($status);
        if( $doData!==FALSE ){
            return $this->success('删除/恢复成功！');
        } else {
            return $this->error('删除失败！');
        }
    }
}