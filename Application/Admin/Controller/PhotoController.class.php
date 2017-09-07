<?php
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends Controller {
    public function index(){
        $this->display();
    }
    // 客片添加
    public function addCase(){
        // $id  = $_GET['id'];
        // var_dump($id) ;
        $this->display();
    }
    // upload
    public function addCase_upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     9999999999 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'case_pic/'; // 设置附件上传（子）目录
        // 上传文件 
        $info =  $upload->upload();
        show_bug( $_POST['type_id']);
    }

    // ### 广告位添加
    // 首屏顶部主体广告位
    public function topBanner(){
        $this->display();
    }

    // 首屏最新活动广告位
    public function newBanner(){
        $this->display();
    }

    // 首屏婴儿作品广告位
    public function infantBanner(){
        $this->display();
    }

    // 首屏宝宝作品广告位
    public function babayBanner(){
        $this->display();
    }

    // 首儿童作品主体广告位
    public function childrenBanner(){
        $this->display();
    }

    // 首屏亲子作品广告位
    public function familyBanner(){
        $this->display();
    }

    // 首屏我们的团队广告位
    public function teamBanner(){
        $this->display();
    }

    // 首屏场馆主题广告位
    public function venueBanner(){
        $this->display();
    }
    
}