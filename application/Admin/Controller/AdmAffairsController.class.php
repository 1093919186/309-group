<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 17:02
 */
namespace Admin\Controller;
use Think\Controller;
class AdmAffairsController extends BaseController {
    public function index(){
        if($_SESSION['manager']) {
            $count = M("info")->count();
            $p = getpage($count,20);
            $rs1 = M("info")->field("infoid,dateandtime,title,hints")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("info",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upinfo($iid){
        if($_SESSION['manager']) {
            $rs1 = M("info")->where("infoid=$iid")->find();
            $this ->assign("info",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upend($iid){
        $content = $_POST['simple-editor'];
        $title = $_POST['title'];
        $rs1 = M("info")->execute("update info set  title='$title',content='$content' where infoid=$iid;");
        if($rs1){
            $this->success('更新成功',__APP__."/AdmAffairs/index");
        }else{
            $this->success('更新失败',__APP__."/AdmAffairs/upinfo/iid/$iid");
        }
    }
    public function delinfo($iid){
        $rs1 = M("info")->where("infoid=$iid")->delete();
        if($rs1){
            $this->success('删除成功',__APP__."/AdmAffairs/index");
        }else{
            $this->success('删除失败',__APP__."/AdmAffairs/index");
        }
    }
    public function message(){
        if($_SESSION['manager']) {
            $rs1 = M("message")->field("id,dateandtime,contact,company,type")->order("dateandtime desc")->select();
            $this ->assign("message",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function operate($mid){
        if($_SESSION['manager']) {
            $id = $mid;
            $rs1 = M("message")->where("id=$id")->find();
            $this ->assign("message",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function operend($mid){
        $rs1 = M("message")->where("id=$mid")->execute("update message set type=1 where id=$mid");
        if($rs1){
            $this->success('已处理',__APP__."/AdmAffairs/message");
        }else{
            $this->success('处理失败',__APP__."/AdmAffairs/operate/mid/$mid");
        }
    }
    public function del($mid){
        $rs1 = M("message")->where("id=$mid")->delete();
        if($rs1){
            $this->success('已删除',__APP__."/AdmAffairs/message");
        }else{
            $this->success('删除失败',__APP__."/AdmAffairs/message");
        }
    }
    public function contact(){
        if($_SESSION['manager']) {
            $rs1 = M("contactus")->find();
            $this ->assign("contact",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upcontact(){
        $rs1 = M("contactus")->where("id=1")->save($_POST);
        if($rs1){
            $this->success('更新成功',__APP__."/AdmAffairs/contact");
        }else{
            $this->success('更新失败',__APP__."/AdmAffairs/contact");
        }
    }


    public function news(){
        if($_SESSION['manager']) {
            $count = M("news")->count();
            $p = getpage($count,20);
            $rs1 = M("news")->field("id,title,dateandtime")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("news",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function delnews($nid){
        $rs1 = M("news")->where("id=$nid")->delete();
        if($rs1){
            $this->success('已删除',__APP__."/AdmAffairs/news");
        }else{
            $this->success('删除失败',__APP__."/AdmAffairs/news");
        }
    }
    public function upnews($nid){
        if($_SESSION['manager']) {
            $id = $nid;
            $rs1 = M("news")->where("id=$id")->find();
            $this ->assign("news",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function upnewsend($nid){

        $title = $_POST['title'];
        $header = $_POST['header'];
        $content = $_POST['simple-editor'];
        $imgPath = $_FILES["imgpath"];
        $id = $nid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("news")->field("imgpath")->where("id=$nid")->find();
            $oldImg = $oldImg['imgpath'];

            //1、上传文件
            $savePath = NULL;
            if($imgPath["name"] != NULL)
            {
                //原文件名 xxxx.txt.jpg
                $oldFileName = $imgPath["name"];
                //截取文件扩展名
                $index = strrpos($oldFileName,".");
                $ext = substr($oldFileName,$index);
                //生成一个新文件名
                $fileName = uniqid().$ext;
                //保存路径
                $savePath = "public/picture/academic/$fileName";
                //上传文件

                unlink($oldImg);

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("news")->execute("update news set  title='$title',header='$header',content='$content',imgpath='$savePath' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmAffairs/upnews/nid/$id");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAffairs/news");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAffairs/upnews/nid/$id");
            }

        }else{
            $oldImg = M("news")->field("imgpath")->where("id=$nid")->find();
            $oldImg = $oldImg['imgpath'];
            unlink($oldImg);
            $result = M("news")->execute("update news set  title='$title',header='$header',content='$content',imgpath='' where id=$id;");
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAffairs/news");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAffairs/upnews/nid/$id");
            }
        }
    }

}