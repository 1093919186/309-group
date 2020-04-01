<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:14
 */
namespace Home\Controller;
use Think\Controller;
class StudentsController extends BaseController {
    public function index(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=4")->select();
        $this ->assign("doctor",$rs1);
        $this->display();
    }

    public function readdoctor(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=5")->select();
        $this ->assign("readdoctor",$rs1);
        $this->display();
    }

    public function master(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=6")->select();
        $this ->assign("master",$rs1);
        $this->display();
    }

    public function readmaster(){
        $rs1 = M("peopleandbook")->field("name,id,imgpath")->where("type=7")->select();
        $this ->assign("readmaster",$rs1);
        $this->display();
    }

}