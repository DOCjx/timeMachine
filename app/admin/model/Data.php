<?php
namespace app\Admin\Model;
use Think\Model;
class Data extends Model {
	public function getGameData(){
		return $this->where(array('pid'=>array('EQ',I('editDataId'))))
					->field('game_name,result,times,updata_time,status,id')
					->page($_GET['p'],c('DATA_NUM'))
					->order('updata_time DESC')
					->select();
		// var_dump($return);
	}
	public function dataPage(){
                $count = $this->where(array('pid'=>array('EQ',I('editDataId'))))
                			  ->count();
                $Page = new\Think\Page($count,c(30));
                $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
                $Page->setConfig('prev','上一页');
                $Page->setConfig('next','下一页');
                $show=$Page->show();
                return $show;
    }
    public function doData($status){
		if( $status==-1 ){
			return $this
				->where(array('id'=>array('EQ',I('id'))))
				->delete();
		} else {
			$date['status']=$status;
			return $this
				->where(array('id'=>array('EQ',I('id'))))
				->save($date);
			// var_dump($id);
		}
	}
}