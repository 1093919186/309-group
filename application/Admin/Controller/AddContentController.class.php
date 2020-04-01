<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 15:51
 */
namespace Admin\Controller;
use Think\Controller;
class AddContentController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function scipro()
    {
        $result = M("scifruits")->add($_POST);
        if($result>0){
            $this->success('添加成功',__APP__."/AdmFruits/index");
        }else{
            $this->success('添加失败',__APP__."/AddContent/index");
        }
    }




    public function sciRew(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function scirews()
    {
        $result = M("scirews")->add($_POST);
        if($result>0){
            $this->success('添加成功',__APP__."/AdmFruits/sciRew");
        }else{
            $this->success('添加失败',__APP__."/AddContent/sciRew");
        }
    }




    public function aca(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function academic(){
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
                $savePath = "public/picture/academic/$fileName";
                //上传文件

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("academic")->execute("insert into academic(title,header,imgpath,content,type) values('$title','$header','$savePath','$content','$type')");
            }else{
                $this->success("添加失败",__APP__."/AddContent/aca");
            }
            if($result)
            {
                $this->success("添加成功",__APP__."/AdmAca/index");
            }
            else
            {
                $this->success("添加失败",__APP__."/AddContent/aca");
            }

        }else{
            $this->success("添加失败",__APP__."/AddContent/aca");
        }
    }

    public function news(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function addnews(){
        $title = $_POST['title'];
        $header = $_POST['header'];
        $content = $_POST['simple-editor'];
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
                $savePath = "public/picture/academic/$fileName";
                //上传文件

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("news")->execute("insert into news(title,header,imgpath,content) values('$title','$header','$savePath','$content')");
            }else{
                $this->success("添加失败",__APP__."/AddContent/news");
            }
            if($result)
            {
                $this->success("添加成功",__APP__."/AdmAca/index");
            }
            else
            {
                $this->success("添加失败",__APP__."/AddContent/news");
            }

        }else{
            $this->success("添加失败",__APP__."/AddContent/news");
        }
    }





    public function writings(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function addbooks(){
        $name = $_POST['name'];
        $content = $_POST['simple-editor'];
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
                $savePath = "public/picture/booksIcon/$fileName";
                //上传文件

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("peopleandbook")->execute("insert into peopleandbook(name,imgpath,content,type) values('$name','$savePath','$content',0)");
            }else{
                $this->success("添加失败",__APP__."/AddContent/writings");
            }
            if($result)
            {
                $this->success("添加成功",__APP__."/AdmWritings/index");
            }
            else
            {
                $this->success("添加失败",__APP__."/AddContent/writings");
            }

        }else{
            $this->success("添加失败",__APP__."/AddContent/writings");
        }
    }




    public function people(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function addpeople(){
        $name = $_POST['name'];
        $content = $_POST['simple-editor'];
        $imgPath = $_FILES["imgpath"];
        $type = $_POST['type'];
        if($type=='教授'){
            $type=1;
        }elseif($type=='副教授'){
            $type=2;
        }elseif($type=='讲师'){
            $type=3;
        }elseif($type=='毕业博士'){
            $type=4;
        }elseif($type=='在读博士'){
            $type=5;
        }elseif($type=='毕业硕士'){
            $type=6;
        }else{
            $type=7;
        }
        if($type==1 or $type==2 or $type==3) {
            if ($_FILES['imgpath']['name']) {

                //1、上传文件
                $savePath = NULL;
                if ($imgPath["name"] != NULL) {
                    //原文件名 xxxx.txt.jpg
                    $oldFileName = $imgPath["name"];
                    //截取文件扩展名
                    $index = strrpos($oldFileName, ".");
                    $ext = substr($oldFileName, $index);
                    //生成一个新文件名
                    $fileName = uniqid() . $ext;
                    //保存路径
                    $savePath = "public/picture/teachersIcon/$fileName";
                    //上传文件

                    $bool = move_uploaded_file($imgPath["tmp_name"], "{$savePath}");  //注意修改权限
                }

                if ($savePath != null) {
                    $result = M("peopleandbook")->execute("insert into peopleandbook(name,imgpath,content,type) values('$name','$savePath','$content',$type)");
                } else {
                    $this->success("添加失败", __APP__ . "/AddContent/people");
                }
                if ($result) {
                    $this->success("添加成功", __APP__ . "/AdmPeople/index");
                } else {
                    $this->success("添加失败", __APP__ . "/AddContent/people");
                }

            } else {
                $this->success("添加失败", __APP__ . "/AddContent/people");
            }
        }else{
            if ($_FILES['imgpath']['name']) {

                //1、上传文件
                $savePath = NULL;
                if ($imgPath["name"] != NULL) {
                    //原文件名 xxxx.txt.jpg
                    $oldFileName = $imgPath["name"];
                    //截取文件扩展名
                    $index = strrpos($oldFileName, ".");
                    $ext = substr($oldFileName, $index);
                    //生成一个新文件名
                    $fileName = uniqid() . $ext;
                    //保存路径
                    $savePath = "public/picture/studentsIcon/$fileName";
                    //上传文件

                    $bool = move_uploaded_file($imgPath["tmp_name"], "{$savePath}");  //注意修改权限
                }

                if ($savePath != null) {
                    $result = M("peopleandbook")->execute("insert into peopleandbook(name,imgpath,content,type) values('$name','$savePath','$content',$type)");
                } else {
                    $this->success("添加失败", __APP__ . "/AddContent/people");
                }
                if ($result) {
                    $this->success("添加成功", __APP__ . "/AdmPeople/index");
                } else {
                    $this->success("添加失败", __APP__ . "/AddContent/people");
                }

            } else {
                $this->success("添加失败", __APP__ . "/AddContent/people");
            }
        }
    }





    public function paper(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function addpaper(){
        $title = $_POST['title'];
        $writer = $_POST['writer'];
        $content = $_POST['simple-editor'];
        $loads = $_FILES["loads"];
        $link = $_POST['link'];
        $type = $_POST['type'];
        if($type=='中文论文'){
            $type=0;
        }else{
            $type=1;
        }
        if($_FILES['loads']['name']){

            //1、上传文件
            $savePath = NULL;
            if($loads["name"] != NULL)
            {
                //原文件名 xxxx.txt.jpg
                $oldFileName = $loads["name"];
                //截取文件扩展名
                $index = strrpos($oldFileName,".");
                $ext = substr($oldFileName,$index);
                //生成一个新文件名
                $fileName = uniqid().$ext;
                //保存路径
                $savePath = "public/files/$fileName";
                //上传文件

                $bool=move_uploaded_file($loads["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("paper")->execute("insert into paper(title,writer,content,type,link,loads) values('$title','$writer','$content','$type','$link','$savePath')");
            }else{
                $this->success("添加失败",__APP__."/AddContent/paper");
            }
            if($result)
            {
                $this->success("添加成功",__APP__."/AdmWritings/paper");
            }
            else
            {
                $this->success("添加失败",__APP__."/AddContent/paper");
            }

        }else{
            $this->success("添加失败",__APP__."/AddContent/paper");
        }
    }





    public function info(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function addinfo(){
        $title = $_POST['title'];
        $content = $_POST['simple-editor'];
        $result = M("info")->execute("insert into info(title,content) values('$title','$content')");
        if($result>0){
            $this->success('添加成功',__APP__."/AdmAffairs/index");
        }else{
            $this->success('添加失败',__APP__."/AddContent/info");
        }
    }

    public function patent(){
        if($_SESSION['manager']) {
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function addpatent(){
        if($_SESSION['manager']) {
            $title = $_POST['title'];
            $type=$_POST['type'];
            $date=$_POST['time'];
            $content = $_POST['simple-editor'];
            $result = M("patent")->execute("insert into patent(name,origin,data,content) values('$title','$type','$date','$content')");
            if($result>0){
                $this->success('添加成功',__APP__."/AdmWritings/patent");
            }else{
                $this->success('添加失败',__APP__."/AddContent/patent");
            }
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

}