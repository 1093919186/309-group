<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:34
 */
namespace Home\Controller;
use Think\Controller;
class AcademicController extends BaseController {
    public function index(){
        $count = M("academic")->where("type=0")->count();
        $p = getpage($count,30);
        $rs1 = M("academic")->where("type=0")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("interaca",$rs1);
        $this->display();
    }

    public function nation(){
        $count = M("academic")->where("type=1")->count();
        $p = getpage($count,30);
        $rs1 = M("academic")->where("type=1")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("nationaca",$rs1);
        $this->display();
    }

    public function details($cid){
        $id = $cid;
        $hints=M("academic")->where("id=$id")->find();
        $hints=$hints["hints"]+1;
        M("academic")->where("id=$id")->save(array(
            'hints'=>"$hints"
        ));
        $rs1 = M("academic")->where("id=$id")->find();
        $this ->assign("academic",$rs1);
        $this->display();
    }
}
