<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    // 欢迎页
    public function welcome(){
        $Familypic = M("familypic"); // 实例化User对象
        // 查找status值为1name值为think的用户数据 
        $data = $Familypic->select();
        $this->assign('data', $data);
        $this->display();
    }

    // 客片列表
    public function caseList(){
        $this->display();
    }
}