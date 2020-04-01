<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/11/28
 * Time: 9:36
 */
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
        $rs1 = M("contactus")->find();
        $rs2 = M("admimg")->where("type=1")->find();
        $this ->assign("contact",$rs1);
        $this ->assign("erweima",$rs2);
    }

}