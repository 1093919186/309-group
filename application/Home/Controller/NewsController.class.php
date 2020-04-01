<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/18
 * Time: 21:56
 */
namespace Home\Controller;
use Think\Controller;
class NewsController extends BaseController {
    public function index(){
        $count = M("news")->count();
        $p = getpage($count,30);
        $rs1 = M("news")->field("title,id,dateandtime")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("news",$rs1);
        $this->display();
    }
    public function details($cid){
        $id = $cid;
        $hints=M("news")->where("id=$id")->find();
        $hints=$hints["hints"]+1;
        M("news")->where("id=$id")->save(array(
            'hints'=>"$hints"
        ));
        $rs1 = M("news")->where("id=$id")->find();
        $this ->assign("news",$rs1);
        $this->display();
    }
}