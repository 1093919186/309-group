<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:37
 */
namespace Home\Controller;
use Think\Controller;
class ContributeController extends BaseController {
    public function index(){
        $count = M("info")->count();
        $p = getpage($count,30);
        $rs1 = M("info")->field("title,infoid,dateandtime")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("info",$rs1);
        $this->display();
    }
    public function message(){
        $contact = $_POST['contact'];
        $company = $_POST['company'];
        $content = $_POST['content'];
        $checkcode = $_POST["checkcode"];
        $verify = new \Think\Verify();
        $result=$verify->check($checkcode);

        if($result){
            if($contact==''or $company=='' or $content==''){
                $this->success("请完善相关信息",__APP__."/Contribute/index.html");
            }else{
                $rs1 = M("message")->execute("insert into message(contact,company,content) values('$contact','$company','$content')");
                if($rs1){
                    $this->success("发布成功",__APP__."/Index/index.html");
                }else{
                    $this->success("发布失败,请再试一遍",__APP__."/Contribute/index.html");
                }
            }
        }else{
            $this->success("验证码错误",__APP__."/Contribute/index.html");
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
}