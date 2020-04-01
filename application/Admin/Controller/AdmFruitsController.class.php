<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 16:51
 */
namespace Admin\Controller;
use Think\Controller;
class AdmFruitsController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $count = M("scifruits")->count();
            $p = getpage($count,1);
            $rs1 = M("scifruits")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("fruits",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upfruits($fid){
        if($_SESSION['manager']) {
            $rs1 = M("scifruits")->where("id=$fid")->find();
            $this ->assign("fruits",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upfruend($fid){
        $rs1 = M("scifruits")->where("id=$fid")->save($_POST);
        if($rs1){
            $this->success('更新成功',__APP__."/AdmFruits/index");
        }else{
            $this->success('更新失败',__APP__."/AdmFruits/upfruits/fid/$fid");
        }
    }
    public function del($fid){
        $rs1 = M("scifruits")->where("id=$fid")->delete();
        if($rs1){
            $this->success('删除成功',__APP__."/AdmFruits/index");
        }else{
            $this->success('删除失败',__APP__."/AdmFruits/index");
        }
    }
    public function sciRew(){
        if($_SESSION['manager']) {
            $count = M("scirews")->count();
            $p = getpage($count,20);
            $rs1 = M("scirews")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("scirews",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function uprews($rid){
        if($_SESSION['manager']) {
            $rs1 = M("scirews")->where("id=$rid")->find();
            $this ->assign("scirews",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function uprewsend($rid){
        $rs1 = M("scirews")->where("id=$rid")->save($_POST);
        if($rs1){
            $this->success('更新成功',__APP__."/AdmFruits/scirew");
        }else{
            $this->success('更新失败',__APP__."/AdmFruits/uprews/rid/$rid");
        }
    }
    public function delrews($rid){
        $rs1 = M("scirews")->where("id=$rid")->delete();
        if($rs1){
            $this->success('删除成功',__APP__."/AdmFruits/scirew");
        }else{
            $this->success('删除失败',__APP__."/AdmFruits/scirew");
        }
    }
}