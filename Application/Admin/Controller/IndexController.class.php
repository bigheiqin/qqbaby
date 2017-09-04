<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    // 欢迎页
    public function welcome(){
        $this->display();
    }

    // 客片列表
    public function pictureList(){
        $this->display();
    }
}