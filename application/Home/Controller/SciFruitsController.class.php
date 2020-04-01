<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 18:21
 */
namespace Home\Controller;
use Think\Controller;
class SciFruitsController extends BaseController {
    public function index(){
        $count = M("scifruits")->count();
        $p = getpage($count,30);
        $rs1 = M("scifruits")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("scifruits",$rs1);
        $this->display();
    }

    public function scirew(){
        $count = M("scirews")->count();
        $p = getpage($count,30);
        $rs1 = M("scirews")->order("dateandtime desc")->limit($p->firstRow, $p->listRows)->select();

        $this->assign('page', $p->show());
        $this ->assign("scirews",$rs1);
        $this->display();
    }

}