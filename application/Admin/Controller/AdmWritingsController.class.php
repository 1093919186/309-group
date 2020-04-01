<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 16:41
 */
namespace Admin\Controller;
use Think\Controller;
class AdmWritingsController extends Controller {
    public function index(){
        if($_SESSION['manager']) {
            $count = M("peopleandbook")->where("type=0")->count();
            $p = getpage($count,20);
            $rs1 = M("peopleandbook")->where("type=0")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("books",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function upbooks($bid){
        if($_SESSION['manager']) {
            $rs1 = M("peopleandbook")->where("id=$bid")->find();
            $this ->assign("books",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function upboend($bid){

        $name = $_POST['name'];
        $content = $_POST['simple-editor'];
        $type = 0;
        $imgPath = $_FILES["imgpath"];
        $id = $bid;

        if($_FILES['imgpath']['name']){

            $oldImg = M("peopleandbook")->field("imgpath")->where("id=$bid")->find();
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
                $savePath = "public/picture/booksIcon/$fileName";
                //上传文件

                unlink($oldImg);

                $bool=move_uploaded_file($imgPath["tmp_name"],"{$savePath}");  //注意修改权限
            }

            if($savePath!=null){
                $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='$savePath' where id=$id;");
            }else{
                $this->success("图片上传失败",__APP__."/AdmWritings/upbooks/bid/$id");
            }
            if($result)
            {
                $this->success("更新成功",__APP__."/AdmWritings/index");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmWritings/upbooks/bid/$id");
            }

        }else{
            $oldImg = M("peopleandbook")->field("imgpath")->where("id=$bid")->find();
            $oldImg = $oldImg['imgpath'];
            unlink($oldImg);
            $result = M("peopleandbook")->execute("update peopleandbook set  name='$name',content='$content',type='$type',imgpath='' where id=$id;");

            if($result)
            {
                $this->success("更新成功",__APP__."/AdmWritings/index");
            }
            else
            {
                $this->success("更新失败",__APP__."/AdmWritings/upbooks/bid/$id");
            }
        }
    }

    public function delbooks($bid){
        $imgpath = M("peopleandbook")->field("imgpath")->where("id=$bid")->find();
        $imgpath = $imgpath['imgpath'];
        $rs1 = M("peopleandbook")->where("id=$bid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmWritings/index");
        }else{
            $this->success('删除失败',__APP__."/AdmWritings/index");
        }
    }

    public function paper(){
        if($_SESSION['manager']) {
            $count = M("paper")->count();
            $p = getpage($count,20);
            $rs1 = M("paper")->field("id,title,writer")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("papers",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function uppapers($pid){
        if($_SESSION['manager']) {
            $rs1 = M("paper")->where("id=$pid")->find();
            $this ->assign("papers",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }
    public function uppaperend($pid){

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

        $oldImg = M("paper")->field("loads")->where("id=$pid")->find();
        $oldImg = $oldImg['loads'];

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

            unlink($oldImg);

            $bool=move_uploaded_file($loads["tmp_name"],"{$savePath}");  //注意修改权限
        }

        if($savePath!=null){
            $result = M("paper")->execute("update paper set title='$title',writer='$writer',content='$content',type='$type',loads='$savePath',link='$link'  where id=$pid;");
        }else{
            $this->success("文件上传失败",__APP__."/AdmWritings/uppapers/pid/$pid");
        }
        if($result)
        {
            $this->success("更新成功",__APP__."/AdmWritings/paper");
        }
        else
        {
            $this->success("更新失败",__APP__."/AdmWritings/uppapers/pid/$pid");
        }

    }else{
        $oldImg = M("paper")->field("loads")->where("id=$pid")->find();
        $oldImg = $oldImg['loads'];
        unlink($oldImg);
        $result = M("paper")->execute("update paper set title='$title',writer='$writer',content='$content',type='$type',loads='',link='$link'  where id=$pid;");

        if($result)
        {
            $this->success("更新成功",__APP__."/AdmWritings/paper");
        }
        else
        {
            $this->success("更新失败",__APP__."/AdmWritings/uppapers/pid/$pid");
        }
    }
}
    public function delpapers($pid){
        $imgpath = M("paper")->field("loads")->where("id=$pid")->find();
        $imgpath = $imgpath['loads'];
        $rs1 = M("paper")->where("id=$pid")->delete();
        unlink($imgpath);
        if($rs1){
            $this->success('删除成功',__APP__."/AdmWritings/paper");
        }else{
            $this->success('删除失败',__APP__."/AdmWritings/paper");
        }
    }

    public function patent(){
        if($_SESSION['manager']) {
            $count = M("patent")->count();
            $p = getpage($count,20);
            $rs1 = M("patent")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();
            $this ->assign("patent",$rs1);
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function delpatent($pid){
        $rs1 = M("patent")->where("id=$pid")->delete();
        if($rs1){
            $this->success('删除成功',__APP__."/AdmWritings/patent");
        }else{
            $this->success('删除失败',__APP__."/AdmWritings/patent");
        }
    }

    public function uppatent($pid){
        if($_SESSION['manager']) {
            $rs1 = M("patent")->where("id=$pid")->find();
            $this ->assign("patent",$rs1);
            $this->display();
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

    public function uppatentend($pid){
        if($_SESSION['manager']) {
            $title = $_POST['title'];
            $type = $_POST['type'];
            $time = $_POST['time'];
            $content = $_POST['simple-editor'];
            $result = M("patent")->execute("update patent set name='$title',origin='$type',content='$content',data='$time' where id=$pid;");
            if($result){
                $this->success("更新成功",__APP__."/AdmWritings/patent");
            }else{
                $this->success("更新失败",__APP__."/AdmWritings/uppatent/pid/$pid");
            }
        }else{
            $this->success('您未登录',__APP__."/Index/index");
        }
    }

}