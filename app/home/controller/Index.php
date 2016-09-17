<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\View;
use app\home\model\Ticket;

class Index extends base
{
    public function _initialize(){
        parent::_initialize();
    }
    public function index()
    {
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
        
    }
}