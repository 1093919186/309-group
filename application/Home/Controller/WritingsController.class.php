<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:28
 */
namespace Home\Controller;
use Think\Controller;
class WritingsController extends BaseController {
    public function index(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=0")->select();
        $this ->assign("books",$rs1);
        $this->display();
    }

    public function chinapaper(){
        $count = M("paper")->where("type=0")->count();
        $p = getpage($count,30);
        $rs1 = M("paper")->order("dateandtime desc")->where("type=0")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("chinapaper",$rs1);
        $this->display();
    }

    public function englishpaper(){
        $count = M("paper")->where("type=1")->count();
        $p = getpage($count,30);
        $rs1 = M("paper")->order("dateandtime desc")->where("type=1")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("englishpaper",$rs1);
        $this->display();
    }
    public function details($cid){
        $hints=M("paper")->where("id=$cid")->find();
        $hints=$hints["hints"]+1;
        M("paper")->where("id=$cid")->save(array(
            'hints'=>"$hints"
        ));
        $rs1 = M("paper")->where("id=$cid")->find();
        $this ->assign("paper",$rs1);
        $this->display();
    }
    public function patent(){
        $count = M("patent")->count();
        $p = getpage($count,30);
        $rs1 = M("patent")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("patent",$rs1);
        $this->display();
    }

    public function patdetails($pid){
        $rs1 = M("patent")->where("id=$pid")->find();
        $this ->assign("patent",$rs1);
        $this->display();
    }

}