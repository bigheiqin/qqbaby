<?php
/**
 * 后台作品风格控制类
 * Author: Sky <1127820180@qq.com>
 */
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends CommonController {

	//改变显示条数的功能
	public function changeNum(){
		$num = $_GET['num'];
		setcookie('num',$num,time()+3600,'/');
	}

	//显示孕妈作品添加页面
	public function addMami(){
		$this->display();
	}

	//显示婴儿作品添加页面
	public function addChild(){
		$this->display();
	}

	//显示宝宝作品添加页面
	public function addBoy(){
		$this->display();
	}

	//显示亲子全家福作品添加页面
	public function addFamily(){
		$this->display();
	}

	//显示每月客照添加页面
	public function addGust(){
		$this->display();
	}
	//孕妈风格列表
	public function showMami(){
		$mami=M('mami');

		//获取当前请求的页码
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 5;
		setcookie('num',$num,time()+3600,'/');

		//计算表中数据总数 
		$count = $mami->count();
		//实例化对象
		$page = new \Think\Page($count,$num);
		//获取页码的html
		$show = $page->show();

		$mamiInfo=$mami->order("id desc")->page($p,$num)->select();

		$this->assign('mamiInfo',$mamiInfo);
		$this->assign('page',$show);
		$this->display();
	}
	//婴儿风格列表
	public function showChild(){
		$child=M('child');

		//获取当前请求的页码
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 5;
		setcookie('num',$num,time()+3600,'/');

		//计算表中数据总数 
		$count = $child->count();
		//实例化对象
		$page = new \Think\Page($count,$num);
		//获取页码的html
		$show = $page->show();
		$childInfo=$child->order("id desc")->page($p,$num)->select();

		$this->assign('page',$show);
		$this->assign('childInfo',$childInfo);
		$this->display();
	}

	//宝宝作品列表
	public function showBoy(){

		$boy=M('boy');

		//获取当前请求的页码
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 5;
		setcookie('num',$num,time()+3600,'/');

		//计算表中数据总数 
		$count = $boy->count();
		//实例化对象
		$page = new \Think\Page($count,$num);
		//获取页码的html
		$show = $page->show();

		$boyInfo=$boy->order("id desc")->page($p,$num)->select();

		$this->assign('page',$show);
		$this->assign('boyInfo',$boyInfo);
		$this->display();
	}

	//亲子全家福作品列表
	public function showFamily(){

		$family=M('family');

		//获取当前请求的页码
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 5;
		setcookie('num',$num,time()+3600,'/');

		//计算表中数据总数 
		$count = $family->count();
		//实例化对象
		$page = new \Think\Page($count,$num);
		//获取页码的html
		$show = $page->show();
		$familyInfo=$family->order("id desc")->page($p,$num)->select();

		$this->assign('page',$show);
		$this->assign('familyInfo',$familyInfo);
		$this->display();
	}

	//客照列表
	public function showGust(){

		$gust=M('gust');

		//获取当前请求的页码
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 5;
		setcookie('num',$num,time()+3600,'/');

		//计算表中数据总数 
		$count = $gust->count();
		//实例化对象
		$page = new \Think\Page($count,$num);
		//获取页码的html
		$show = $page->show();
		$gustInfo=$gust->order("id desc")->page($p,$num)->select();

		$this->assign('page',$show);
		$this->assign('gustInfo',$gustInfo);
		$this->display();
	}

	//插入孕妈作品风格方法
	public function insertMami(){
		//上传主图
		if(!empty($_FILES['show']['name'])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "mami_pic/";//这一块只能设置一层目录
			$info = $upload->upload();
			$newname = trim($upload->rootPath.$info['show']['savepath'].$info['show']['savename'],'./') ;
			$url=$_POST['url']='u'.trim($newname,'./Public/');

		}else{
			$_POST['url']='uploads/mami_pic/default.jpg';
		}

		//创建模型
		$photo = M('mami');
		$photo->create();

		$seat=$_POST['seat'];
		if($seat!==5){
			$result = $photo->where("seat = '$seat'")->setField('seat','5');
		}
		$id = $photo->add();

		//执行添加操作
		if($id){
			$this->success('孕妈风格添加成功',U('Photo/showMami'),3);
		}else{
			$this->error('孕妈风格添加失败',U('Photo/showMami'),3);
		}
	}

	//插入婴儿作品风格方法
	public function insertChild(){
		//上传主图
		if(!empty($_FILES['show']['name'])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "child_pic/";//这一块只能设置一层目录
			$info = $upload->upload();
			$newname = trim($upload->rootPath.$info['show']['savepath'].$info['show']['savename'],'./') ;
			$url=$_POST['url']='u'.trim($newname,'./Public/');
		
		}else{
			$_POST['url']='uploads/child_pic/default.jpg';
		}

		//创建模型
		$photo = M('child');
		$photo->create();

		$id = $photo->add();

		//执行添加操作
		if($id){
			$this->success('婴儿风格添加成功',U('Photo/showChild'),3);
		}else{
			$this->error('婴儿风格添加失败',U('Photo/showChild'),3);
		}
	}

	//插入宝宝作品风格方法
	public function insertBoy(){
		//上传主图
		if(!empty($_FILES['show']['name'])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "boy_pic/";//这一块只能设置一层目录
			$info = $upload->upload();
			$newname = trim($upload->rootPath.$info['show']['savepath'].$info['show']['savename'],'./') ;
			$url=$_POST['url']='u'.trim($newname,'./Public/');
		
		}else{
			$_POST['url']='uploads/boy_pic/default.jpg';
		}

		//创建模型
		$photo = M('boy');
		$photo->create();

		$seat=$_POST['seat'];
		if($seat!==5){
			$result = $photo->where("seat = '$seat'")->setField('seat','5');
		}
		$id = $photo->add();

		//执行添加操作
		if($id){
			$this->success('宝宝风格添加成功',U('Photo/showBoy'),3);
		}else{
			$this->error('宝宝风格添加失败',U('Photo/showBoy'),3);
		}
	}

	//插入亲子全家福作品风格方法
	public function insertFamily(){
		//上传主图
		if(!empty($_FILES['show']['name'])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "family_pic/";//这一块只能设置一层目录
			$info = $upload->upload();
			$newname = trim($upload->rootPath.$info['show']['savepath'].$info['show']['savename'],'./') ;
			$url=$_POST['url']='u'.trim($newname,'./Public/');
		
		}else{
			$_POST['url']='uploads/family_pic/default.jpg';
		}

		//创建模型
		$photo = M('family');
		$photo->create();

		$id = $photo->add();

		//执行添加操作
		if($id){
			$this->success('亲子全家福添加成功',U('Photo/showFamily'),3);
		}else{
			$this->error('亲子全家福添加失败',U('Photo/showFamily'),3);
		}
	}

	//插入客照方法
	public function insertGust(){
		//上传主图
		if(!empty($_FILES['show']['name'])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "gust_pic/";//这一块只能设置一层目录
			$info = $upload->upload();
			$newname = trim($upload->rootPath.$info['show']['savepath'].$info['show']['savename'],'./') ;
			$url=$_POST['url']='u'.trim($newname,'./Public/');

		}else{
			$_POST['url']='uploads/gust_pic/default.jpg';
		}

		//创建模型
		$photo = M('gust');
		$photo->create();

		$id = $photo->add();

		//执行添加操作
		if($id){
			$this->success('客照添加成功',U('Photo/showGust'),3);
		}else{
			$this->error('客照添加失败',U('Photo/showGust'),3);
		}
	}

	//删除孕妈风格
	public function deleteM(){
		$mami = M('mami');
		//获取孕妈风格id
		$id = I('get.id');
		$mamiInfo = $mami->where("id=$id")->find();
		//删除主图
		if($mamiInfo['url']!='uploads/spot_pic/default.jpg'){
			$url = './Public/'.$mamiInfo['url'];
			@unlink($url);
		}

		$picture=M('mpicture');
		$url=$picture->field('url')->where("styleid='$id'")->select();
		foreach ($url as $key => $value) {
			$pic='./Public/'.$value['url'];
			@unlink($pic);
			$picture->where("url='{$value['url']}'")->delete();
		}
		
		if($mami->delete($id)){
			echo 0;
		}else{
			echo 1;
		}
	}

	//删除婴儿作品风格
	public function deleteC(){
		$child = M('child');
		//获取婴儿作品风格id
		$id = I('get.id');
		$childInfo = $child->where("id=$id")->find();
		//删除主图
		if($childInfo['url']!='uploads/spot_pic/default.jpg'){
			$url = './Public/'.$childInfo['url'];
			@unlink($url);
		}

		$picture=M('cpicture');
		$url=$picture->field('url')->where("styleid='$id'")->select();
		foreach ($url as $key => $value) {
			$pic='./Public/'.$value['url'];
			@unlink($pic);
			$picture->where("url='{$value['url']}'")->delete();
		}
		
		if($child->delete($id)){
			echo 0;
		}else{
			echo 1;
		}
	}

	//删除宝宝作品风格
	public function deleteB(){
		$boy = M('boy');
		//获取宝宝作品风格id
		$id = I('get.id');
		$boyInfo = $boy->where("id=$id")->find();
		//删除主图
		if($boyInfo['url']!='uploads/boy_pic/default.jpg'){
			$url = './Public/'.$boyInfo['url'];
			@unlink($url);
		}

		$picture=M('bpicture');
		$url=$picture->field('url')->where("styleid='$id'")->select();
		foreach ($url as $key => $value) {
			$pic='./Public/'.$value['url'];
			@unlink($pic);
			$picture->where("url='{$value['url']}'")->delete();
		}
		
		if($boy->delete($id)){
			echo 0;
		}else{
			echo 1;
		}
	}

	//删除亲子全家福作品风格
	public function deleteF(){
		$family = M('family');
		//获取宝宝作品风格id
		$id = I('get.id');
		$familyInfo = $family->where("id=$id")->find();
		//删除主图
		if($familyInfo['url']!='uploads/family_pic/default.jpg'){
			$url = './Public/'.$familyInfo['url'];
			@unlink($url);
		}

		$picture=M('fpicture');
		$url=$picture->field('url')->where("styleid='$id'")->select();
		foreach ($url as $key => $value) {
			$pic='./Public/'.$value['url'];
			@unlink($pic);
			$picture->where("url='{$value['url']}'")->delete();
		}
		
		if($family->delete($id)){
			echo 0;
		}else{
			echo 1;
		}
	}

	//删除每月客照
	public function deleteG(){
		$gust = M('gust');
		//获取客照id
		$id = I('get.id');
		$gustInfo = $gust->where("id=$id")->find();
		//删除主图
		if($gustInfo['url']!='uploads/gust_pic/default.jpg'){
			$url = './Public/'.$gustInfo['url'];
			@unlink($url);
		}

		$picture=M('gpicture');
		$url=$picture->field('url')->where("gustid='$id'")->select();
		foreach ($url as $key => $value) {
			$pic='./Public/'.$value['url'];
			@unlink($pic);
			$picture->where("url='{$value['url']}'")->delete();
		}
		
		if($gust->delete($id)){
			echo 0;
		}else{
			echo 1;
		}
	}

	//孕妈作品
	public function mamiPhoto(){
		$mami = M('mami');
		$id = I('get.id');
		$style = $mami->field('mq_mami.style')->where("mq_mami.id=$id")->find();
		$this->assign('mamiStyle',$style['style']);
		$this->display();
	}

	//婴儿作品
	public function childPhoto(){
		$mami = M('child');
		$id = I('get.id');
		$style = $mami->field('mq_child.style')->where("mq_child.id=$id")->find();
		$this->assign('childStyle',$style['style']);
		$this->display();
	}

	//宝宝作品
	public function boyPhoto(){
		$boy = M('boy');
		$id = I('get.id');
		$style = $boy->field('mq_boy.style')->where("mq_boy.id=$id")->find();
		$this->assign('boyStyle',$style['style']);
		$this->display();
	}

	//亲子全家福作品
	public function familyPhoto(){
		$family = M('family');
		$id = I('get.id');
		$style = $family->field('mq_family.style')->where("mq_family.id=$id")->find();
		$this->assign('familyStyle',$style['style']);
		$this->display();
	}

	//月份获取
	public function gustPhoto(){
		$gust = M('gust');
		$id = I('get.id');
		$month = $gust->field('mq_gust.name')->where("mq_gust.id=$id")->find();
		$this->assign('gustName',$month['name']);
		$this->display();
	}


	public function check_exists(){
		$targetFolder = '/Public/uploads/temp_images/';
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . $_POST['filename'])) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function uploadifive(){
		$uploadpre = '/Public/uploads/temp_images/';
		$uploadDir =$_SERVER['DOCUMENT_ROOT'] . $uploadpre;
		$fileTypes = array('jpg', 'jpeg', 'gif', 'png');
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$targetFile = $uploadDir . $_FILES['Filedata']['name'];
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
				move_uploaded_file($tempFile, $targetFile);
				$returndata= $targetFile;
				$returndata=substr($targetFile, 35);
				echo $returndata;
			} else {
				echo 'Invalid file type.';
			}
		}
	}

	//孕妈风格多图上传
	public function upload(){
		$str=$_POST['c'];
		$id=$_POST['id'];
		$arr=explode('///', $str);
		$time=time();
		$t=date("Y-m-d",$time);
		$dir='Public/uploads/mami_images/'.$t.'/';
		sort($arr);
		$picture=M('mpicture');
		for($i=1;$i<count($arr);$i++){
			$ext=strrchr($arr[$i],'.');
			$filename=md5($time.$arr[$i]).$ext;
			$newname=$dir.$filename;

			if(is_dir($dir)){
				rename($arr[$i],$newname);
			}else{
				$res=mkdir(iconv("UTF-8", "GBK", $dir),0777,true); 
				rename($arr[$i],$newname);
			}

			$url='uploads/mami_images/'.$t.'/'.$filename;
			$data[url]=$url;
			$data[styleid]=$id;
			$picture->data($data)->add();
		}
		$this->success('图片上传成功',U('Photo/showMami'),3);
	}

	//婴儿作品多图上传
	public function uploadC(){
		$str=$_POST['c'];
		$id=$_POST['id'];
		$arr=explode('///', $str);
		$time=time();
		$t=date("Y-m-d",$time);
		$dir='Public/uploads/child_images/'.$t.'/';
		sort($arr);

		
		$picture=M('cpicture');
		for($i=1;$i<count($arr);$i++){
			$ext=strrchr($arr[$i],'.');
			$filename=md5($time.$arr[$i]).$ext;
			$newname=$dir.$filename;

			if(is_dir($dir)){
				rename($arr[$i],$newname);
			}else{
				$res=mkdir(iconv("UTF-8", "GBK", $dir),0777,true); 
				rename($arr[$i],$newname);
			}
			

			$url='uploads/child_images/'.$t.'/'.$filename;
			$data[url]=$url;
			$data[styleid]=$id;
			$picture->data($data)->add();
		}
		$this->success('图片上传成功',U('Photo/showChild'),3);
	}

	//宝宝作品多图上传
	public function uploadB(){
		$str=$_POST['c'];
		$id=$_POST['id'];
		$arr=explode('///', $str);
		$time=time();
		$t=date("Y-m-d",$time);
		$dir='Public/uploads/boy_images/'.$t.'/';
		sort($arr);

		
		$picture=M('bpicture');
		for($i=1;$i<count($arr);$i++){
			$ext=strrchr($arr[$i],'.');
			$filename=md5($time.$arr[$i]).$ext;
			$newname=$dir.$filename;

			if(is_dir($dir)){
				rename($arr[$i],$newname);
			}else{
				$res=mkdir(iconv("UTF-8", "GBK", $dir),0777,true); 
				rename($arr[$i],$newname);
			}
			

			$url='uploads/boy_images/'.$t.'/'.$filename;
			$data[url]=$url;
			$data[styleid]=$id;
			$picture->data($data)->add();
		}
		$this->success('图片上传成功',U('Photo/showBoy'),3);
	}

	//宝宝作品多图上传
	public function uploadF(){
		$str=$_POST['c'];
		$id=$_POST['id'];
		$arr=explode('///', $str);
		$time=time();
		$t=date("Y-m-d",$time);
		$dir='Public/uploads/family_images/'.$t.'/';
		sort($arr);

		$picture=M('fpicture');
		for($i=1;$i<count($arr);$i++){
			$ext=strrchr($arr[$i],'.');
			$filename=md5($time.$arr[$i]).$ext;
			$newname=$dir.$filename;

			if(is_dir($dir)){
				rename($arr[$i],$newname);
			}else{
				$res=mkdir(iconv("UTF-8", "GBK", $dir),0777,true); 
				rename($arr[$i],$newname);
			}
			

			$url='uploads/family_images/'.$t.'/'.$filename;
			$data[url]=$url;
			$data[styleid]=$id;
			$picture->data($data)->add();
		}
		$this->success('图片上传成功',U('Photo/showFamily'),3);
	}

	//客照多图上传
	public function uploadG(){
		$str=$_POST['c'];
		$id=$_POST['id'];
		$arr=explode('///', $str);
		$time=time();
		$t=date("Y-m-d",$time);
		$dir='Public/uploads/gust_images/'.$t.'/';
		sort($arr);
		
		$picture=M('gpicture');
		for($i=1;$i<count($arr);$i++){
			$ext=strrchr($arr[$i],'.');
			$filename=md5($time.$arr[$i]).$ext;
			$newname=$dir.$filename;
			if(is_dir($dir)){
					rename($arr[$i],$newname);
				}else{
					$res=mkdir(iconv("UTF-8", "GBK", $dir),0777,true); 
					rename($arr[$i],$newname);
				}
			$url='uploads/gust_images/'.$t.'/'.$filename;
			$data[url]=$url;
			$data[gustid]=$id;
			$picture->data($data)->add();
		}
		$this->success('图片上传成功',U('Photo/showGust'),3);
	}

}