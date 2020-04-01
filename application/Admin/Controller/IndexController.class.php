<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 19:26
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function checkLogin(){
        $userName = $_POST["username"];
        $passWord = $_POST["password"];
        $checkcode = $_POST["checkcode"];
        $verify = new \Think\Verify();
        $rs1=$verify->check($checkcode);

        if($rs1){
            $result = M("admin")->where("username='{$userName}' && password='{$passWord}'")->select();
            if($result)
            {
                $_SESSION['manager']=$_POST['username'];
                $this->success("登陆成功",__APP__."/AdmAffairs/index");
            }
            else
            {
                $this->success("登录失败",__APP__."/Index/index");
            }
        } else {
            $this->success("验证码错误",__APP__."/Index/index");
        }

    }

    public function showcode(){
        ob_clean();
        $verify = new \Think\Verify();
        $verify->length = 4;//设置字符的个数
        $verify->fontSize = 15;//设置字符的大小
        $verify->imageH=  40;               // 验证码图片高度
        $verify->imageW=  120;               // 验证码图片宽度
        $verify->useCurve= false;
        $verify->entry();//显示验证码
    }

    public function out()
    {
        session_destroy();
        $this->success("退出成功",__APP__."/Index/index");
    }

}