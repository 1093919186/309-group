<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 15:24
 */
namespace Admin\Controller;
use Think\Controller;
class AdmAcaController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $count = M("academic")->where("type=0")->count();
            $p = getpage($count,20);
            $rs1 = M("academic")->field("id,title,dateandtime")->order("dateandtime desc")->where("type=0")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("inter",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upaca($aid){
        if($_SESSION['manager']) {
            $rs1 = M("academic")->where("id=$aid")->find();
            $this ->assign("inter",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upacaend($aid){

        $title = $_POST['title'];
        $header = $_POST['header'];
        $content = $_POST['simple-editor'];
        $type = $_POST['type'];
        if($type=='国际学术交流'){
            $type=0;
        }else{
            $type=1;
        }
        $imgPath = $_FILES["imgpath"];
        $id = $aid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("academic")->field("imgpath")->where("id=$aid")->find();
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
                $result = M("academic")->execute("update academic set  title='$title',header='$header',content='$content',type='$type',imgpath='$savePath' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmAca/upaca/aid/$id");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAca/index");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAca/upaca/aid/$id");
            }

        }else{
            $oldImg = M("academic")->field("imgpath")->where("id=$aid")->find();
            $oldImg = $oldImg['imgpath'];
            unlink($oldImg);
            $result = M("academic")->execute("update academic set  title='$title',header='$header',content='$content',type='$type',imgpath='' where id=$id;");
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAca/index");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAca/upaca/aid/$id");
            }
        }
    }
    public function delaca($aid){
        $imgpath = M("academic")->field("imgpath")->where("id=$aid")->find();
        $imgpath = $imgpath['imgpath'];
        $rs1 = M("academic")->where("id=$aid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmAca/index");
        }else{
            $this->success('删除失败',__APP__."/AdmAca/index");
        }
    }


    public function nationAca(){
        if($_SESSION['manager']) {
            $count = M("academic")->where("type=1")->count();
            $p = getpage($count,20);
            $rs1 = M("academic")->field("id,title,dateandtime")->order("dateandtime desc")->where("type=1")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("nation",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upacana($aid){
        if($_SESSION['manager']) {
            $rs1 = M("academic")->where("id=$aid")->find();
            $this ->assign("nation",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upacanaend($aid){

        $title = $_POST['title'];
        $header = $_POST['header'];
        $content = $_POST['simple-editor'];
        $type = $_POST['type'];
        if($type=='国际学术交流'){
            $type=0;
        }else{
            $type=1;
        }
        $imgPath = $_FILES["imgpath"];
        $id = $aid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("academic")->field("imgpath")->where("id=$aid")->find();
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
                $result = M("academic")->execute("update academic set  title='$title',header='$header',content='$content',type='$type',imgpath='$savePath' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmAca/upacana/aid/$id");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAca/nationAca");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAca/upacana/aid/$id");
            }

        }else{
            $oldImg = M("academic")->field("imgpath")->where("id=$aid")->find();
            $oldImg = $oldImg['imgpath'];
            unlink($oldImg);
            $result = M("academic")->execute("update academic set  title='$title',header='$header',content='$content',type='$type',imgpath='' where id=$id;");
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmAca/nationAca");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmAca/upacana/aid/$id");
            }
        }
    }
    public function delacana($aid){
        $imgpath = M("academic")->field("imgpath")->where("id=$aid")->find();
        $imgpath = $imgpath['imgpath'];
        $rs1 = M("academic")->where("id=$aid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmAca/nationAca");
        }else{
            $this->success('删除失败',__APP__."/AdmAca/nationAca");
        }
    }
}