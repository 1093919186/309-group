<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 17:15
 */
namespace Admin\Controller;
use Think\Controller;
class AdmImgController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $rs1 = M("admimg")->select();
            $this ->assign("img",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upimg($mid){
        $imgPath = $_FILES["imgpath"];
        $id = $mid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("admimg")->field("imgpath")->where("id=$mid")->find();
            $links = $_POST['links'];
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
                $savePath = "public/picture/publicIcon/$fileName";
                //上传文件

                unlink($oldImg);

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("admimg")->execute("update admimg set imgpath='$savePath',links='$links' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmImg/index");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmImg/index");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmImg/index");
            }

        }else{
            $this->success("更新失败",__APP__."/AdmImg/index");
        }

    }

    public function upPic(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function upPicend(){
        if($_SESSION['manager']) {

            $imgPath = $_FILES["imgpath"];
            if($_FILES['imgpath']['name']){

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
                    $savePath = "public/picture/outPic/$fileName";
                    //上传文件

                    $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
                }

                if($savePath!=null){
                    $result = M("admimg")->execute("insert into admimg(imgpath,type) values('$savePath',5)");
                }else{
                    $this->success("添加失败",__APP__."/AdmImg/upPic");
                }
                if($result)
                {
                    $this->success("添加成功",__APP__."/AdmImg/outPic");
                }
                else
                {
                    $this->success("添加失败",__APP__."/AdmImg/upPic");
                }

            }else{
                $this->success("添加失败",__APP__."/AdmImg/upPic");
            }

        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function outPic(){
        if($_SESSION['manager']) {
            $count = M("admimg")->where("type=5")->count();
            $p = getpage($count,20);
            $rs1 = M("admimg")->where("type=5")->order("id desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("img",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function deloutpic($oid){
        if($_SESSION['manager']) {
            $rs1 = M("admimg")->where("id=$oid")->find();
            $rs1 = $rs1['imgpath'];
            unlink($rs1);

            $rs2 = M("admimg")->where("id=$oid")->delete();
            if($rs2){
                $this->success('已删除',__APP__."/AdmImg/outPic");
            }else{
                $this->success('删除失败',__APP__."/AdmImg/outPic");
            }
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }


}