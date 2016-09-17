<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
<<<<<<< HEAD
use think\View;
use app\home\model\Ticket;
=======
use think\Request;
use app\admin\model\User;
>>>>>>> origin/master

class Index extends base
{
    public function _initialize(){
        parent::_initialize();
    }
    public function index()
    {
<<<<<<< HEAD
        // $this->assign('name', $name);
        // return $this->fetch();
        // return __DIR__.'/thinkphp/start.php';
    	// $data = Db::name('user')->select();
     //    $this->assign('result', $data);
     //    var_dump($data);
     //    return $this->fetch();
        // 查询状态为1的用户数据 并且每页显示10条数据
        // $list = db('user')
        //     ->where('status',1)
        //     ->paginate(5);
        // $page = $list->render();
        // // dump($page);
        // $this->assign('list', $list);
        // $this->assign('page', $page);

        $view = \app\index\model\Ticket::getName();

        return $this->fetch();
    }
    public function Ticket(){
        
=======
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
>>>>>>> origin/master
    }
}