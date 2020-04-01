<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/3
 * Time: 17:28
 */
namespace Home\Controller;
use Think\Controller;
class AffairsController extends BaseController {
    public function index(){
        $count = M("info")->count();
        $p = getpage($count,30);
        $rs1 = M("info")->field("title,infoid,dateandtime")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("info",$rs1);
        $this->display();
    }
    public function details($cid){
        $id = $cid;
        $hints=M("info")->where("infoid=$cid")->find();
        $hints=$hints["hints"]+1;
        M("info")->where("infoid=$cid")->save(array(
            'hints'=>"$hints"
        ));
        $rs1 = M("info")->where("infoid=$id")->find();
        $this ->assign("info",$rs1);
        $this->display();
    }
}