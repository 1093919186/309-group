<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:06
 */
namespace Home\Controller;
use Think\Controller;
class TeachersController extends BaseController {
    public function index(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=1")->select();
        $this ->assign("professor",$rs1);
        $this->display();
    }

    public function viceprofessor(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=2")->select();
        $this ->assign("viceprofessor",$rs1);
        $this->display();
    }

    public function teachers(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=3")->select();
        $this ->assign("teachers",$rs1);
        $this->display();
    }

    public function details($cid){
        $id = $cid;
        $rs1 = M("peopleandbook")->where("id=$id")->find();

        $this ->assign("pab",$rs1);
        $this->display();
    }
}