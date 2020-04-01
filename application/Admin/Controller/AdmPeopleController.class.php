<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 20:47
 */
namespace Admin\Controller;
use Think\Controller;
class AdmPeopleController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $map['type'] = array('in','1,2,3');
            $count = M("peopleandbook")->where($map)->count();
            $p = getpage($count,20);
            $rs1 = M("peopleandbook")->where($map)->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("people",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upteachers($tid){
        if($_SESSION['manager']) {
            $rs1 = M("peopleandbook")->where("id=$tid")->find();
            $this ->assign("teachers",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function upteaend($tid){

        $name = $_POST['name'];
        $content = $_POST['simple-editor'];
        $type = $_POST['type'];
        if($type=='教授'){
            $type=1;
        }elseif($type=='副教授'){
            $type=2;
        }else{
            $type=3;
        }
        $imgPath = $_FILES["imgpath"];
        $id = $tid;

            if($_FILES['imgpath']['name']){

                $oldImg = M("peopleandbook")->field("imgpath")->where("id=$tid")->find();
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
                    $savePath = "public/picture/teachersIcon/$fileName";
                    //上传文件

                    unlink($oldImg);

                    $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
                }

                if($savePath!=null){
                    $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='$savePath' where id=$id;");
                }else{
                    $this->success("图片上传失败",__APP__."/AdmPeople/upteachers/tid/$id");
                }
                if($result)
                {
                    $this->success("更新成功",__APP__."/AdmPeople/index");
                }
                else
                {
                    $this->success("更新失败",__APP__."/AdmPeople/upteachers/tid/$id");
                }

            }else{
                $oldImg = M("peopleandbook")->field("imgpath")->where("id=$tid")->find();
                $oldImg = $oldImg['imgpath'];
                unlink($oldImg);
                $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='' where id=$id;");

                if($result)
                {
                    $this->success("更新成功",__APP__."/AdmPeople/index");
                }
                else
                {
                    $this->success("更新失败",__APP__."/AdmPeople/upteachers/tid/$id");
                }
            }

        }

    public function delteachers($tid){
        $imgpath = M("peopleandbook")->field("imgpath")->where("id=$tid")->find();
        $imgpath = $imgpath['imgpath'];
        $rs1 = M("peopleandbook")->where("id=$tid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmPeople/index");
        }else{
            $this->success('删除失败',__APP__."/AdmPeople/index");
        }
    }

    public function students(){
        if($_SESSION['manager']) {
            $map['type'] = array('in','4,5,6,7');
            $count = M("peopleandbook")->where($map)->count();
            $p = getpage($count,20);
            $rs1 = M("peopleandbook")->where($map)->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("students",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upstudents($sid){
        if($_SESSION['manager']) {
            $rs1 = M("peopleandbook")->where("id=$sid")->find();
            $this ->assign("students",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upstuend($sid){

        $name = $_POST['name'];
        $content = $_POST['simple-editor'];
        $type = $_POST['type'];
        if($type=='毕业博士'){
            $type=4;
        }elseif($type=='在读博士'){
            $type=5;
        }elseif($type=='毕业硕士'){
            $type=6;
        }else{
            $type=7;
        }
        $imgPath = $_FILES["imgpath"];
        $id = $sid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("peopleandbook")->field("imgpath")->where("id=$sid")->find();
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
                $savePath = "public/picture/studentsIcon/$fileName";
                //上传文件

                unlink($oldImg);

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='$savePath' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmPeople/upstudents/sid/$id");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmPeople/students");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmPeople/upstudents/sid/$id");
            }

        }else{
            $oldImg = M("peopleandbook")->field("imgpath")->where("id=$sid")->find();
            $oldImg = $oldImg['imgpath'];
            unlink($oldImg);
            $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='' where id=$id;");

            if($result)
            {
                $this->success("更新成功",__APP__."/AdmPeople/students");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmPeople/upstudents/sid/$id");
            }
        }
    }
    public function delstudents($sid){
        $imgpath = M("peopleandbook")->field("imgpath")->where("id=$sid")->find();
        $imgpath = $imgpath['imgpath'];
        $rs1 = M("peopleandbook")->where("id=$sid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmPeople/students");
        }else{
            $this->success('删除失败',__APP__."/AdmPeople/students");
        }
    }
}