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
    // 封面图上传
    public function addCover_upload(){
        // 实例化上传类
        $upload = new \Think\Upload();
        $upload->maxSize   =     9999999 ;// 设置附件上传大小
        $upload->subName   =     array('date','Ymd');
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'case_pic/'; // 设置附件上传（子）目录

        // 上传文件 
        $info =  $upload->upload();

        $type_id = $_POST['type_id'];
        $case_titel = $_POST['case_titel'];

        $Case;
        if($type_id && $case_titel) {
            // 实例化对应栏目数据表
            switch ($type_id) {
                case '1':
                    $Case = M('infant');
                    break;

                case '2':
                    $Case = M('babay');
                    break;

                case '3':
                    $Case = M('children');
                    break;

                case '4':
                    $Case = M('family');
                    break;
                
                case '5':
                    $Case = M('new');
                    break;
                default:
                    break;
            }
            $data['title']  =  $case_titel;   // 标题
            $data['parent'] =  $type_id;      // 所属栏目
            $data['srcImg'] =  "Uploads/".$info['case_img']['savepath'].$info['case_main']['savename'];   // 封面图url

            $case_id = $Case->add($data);
            // echo $case_id;   // 返回新增id
            // exit(); // 此处用来解决返回大量无用字符的问题
        }
    }

    // 多图上传
    public function addDetail_upload(){
        
        // 实例化上传类
        $upload = new \Think\Upload();
        $upload->maxSize   =     9999999 ;// 设置附件上传大小
        $upload->subName   =     array('date','Ymd');
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'case_pic/'; // 设置附件上传（子）目录
        // 上传文件 
        $info =  $upload->upload();

        $type_id = $_POST['type_id'];
        $case_id = $_POST['case_id'];

        // 实例化
        // $Case_pic;
        // switch ($type_id) {
        //     case '1':
        //         $Case_pic = M('infantpic');
        //         break;

        //     case '2':
        //         $Case_pic = M('babaypic');
        //         break;

        //     case '3':
        //         $Case_pic = M('childrenpic');
        //         break;

        //     case '4':
        //         $Case_pic = M('familypic');
        //         break;
            
        //     case '5':
        //         $Case_pic = M('newpic');
        //         break;
        //     default:
        //         break;
        // }
        $Case_pic = M('familypic');
        show_bug($info);
        
        $data['case_id'] =  '23';  // 主贴id
        $data['pic_url'] =  "Uploads/".$info['case_img']['savepath'].$info['case_img']['savename'];   // 图片链接

        $Case_pic->add($data);
        
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