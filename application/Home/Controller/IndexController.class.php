<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 16:40
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $rs1 = M("admimg")->where("type=0")->select();
        $rs2 = M("admimg")->where("type=10")->find();
        $rs3 = M("admimg")->where("type=2")->find();
        $rs4 = M("admimg")->where("type=3")->find();
        $rs5 = M("info")->field("title,infoid")->order("dateandtime desc")->limit(7)->select();
        $rs6 = M("academic")->field("title,id,header,imgpath,dateandtime")->order("dateandtime desc")->limit(3)->select();
        $rs7 = M("paper")->field("title,id")->where("type=0")->order("dateandtime desc")->limit(7)->select();
        $rs8 = M("paper")->field("title,id")->where("type=1")->order("dateandtime desc")->limit(7)->select();

        $this ->assign("lunbo",$rs1);
        $this ->assign("toutu",$rs2);
        $this ->assign("adv1",$rs3);
        $this ->assign("adv2",$rs4);
        $this ->assign("info",$rs5);
        $this ->assign("academic",$rs6);
        $this ->assign("chpaper",$rs7);
        $this ->assign("enpaper",$rs8);

        $this->display();
    }

}