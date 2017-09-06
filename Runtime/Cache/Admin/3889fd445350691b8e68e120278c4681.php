<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>编辑客片</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/admin/css/iframe.css">
</head>
<body>
<header class="iframe_header">
	<nav class="iframe_top_nav clearfix">
		<span class="glyphicon glyphicon-home"></span>
		首页 <span class="c-gray en"> &gt;</span>
		广告管理<span class="c-gray en"> &gt;</span>
		首页顶部广告位
		<a href="javascript:location.replace(location.href);" class="btn btn-success float_r" title="刷新"><span class="glyphicon glyphicon-refresh"></span></a>
	</nav>
</header>
<div class="iframe_main banner_iframe index_top_banner">
	<!-- 首屏顶部广告位，轮播，最多可上传5张广告位 -->
	<!-- <h3 class="hd_box">添加发布广告位</h3> -->
	<div class="tip_box alert alert-danger"><span class="glyphicon glyphicon-info-sign" style="font-size: 30px; vertical-align: bottom;"></span> 最多可添加五个广告位</div>
	<div class="bd_box">
		<p class="text-primary">*抱歉，您目前没有广告</p>
		<button>上传</button>
		<ul class="banner_list">
			<li class="banner_item"></li>
		</ul>
	</div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function(){
    // 上传图片
    
    // 取消更改缩略图
    $('#set_srcImg_btn').on('click', function(){
        $('#src_img').prop('src', 'http://www.qqbaby.com/Public/admin/images/default-thumbnail.png').attr('data-srcImgBool', 'fasle');
    });
});
</script>
</body>
</html>