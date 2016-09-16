<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\User;

class Index extends base
{
    public function _initialize(){
        parent::_initialize();
    }
    public function index()
    {
        $request = Request::instance();
        if( $request->url()=='/timeMachine/' ) $this->assign('hasIndex','');
        else $this->assign('hasIndex',1);
        // dump($this->request->session('nick_name'));
        $this->assign('nick_name',$this->request->session('nick_name'));
        return $this->fetch();
    }
    public function login()
    {
        $User = new User();
        $result = $User->checkLogin($this->request->post('user_num'),$this->request->post('psd'));
        // dump($this->request->session());
        if( $result ){
            // dump($this->request->session('nick_name'));
            return $this->success('登入成功！','Index/index');
        } else {
            return $this->error('用户名不存在或密码错误！');
        } 
    }
    public function logout()
    {
        if( !empty($this->request->session('nick_name')) ){
            session_unset();
            session_destroy();
            return $this->success('已安全退出！','Index/index');
        } else {
            return $this->error('未退出！');
        }
    }
    public function sign()
    {
        $User = new User();
        $result = $User->sign();
        if( $result ){
            $userInfo =$User->getUser();
            dump($userInfo);
            session('status',1);
            session('user_num',$this->request->post('user_num'));
            session('nick_name',$this->request->post('nick_name'));
            return $this->success('注册成功！','Index/index');
        } else {
            return $this->error('注册失败');
        }
    }
}