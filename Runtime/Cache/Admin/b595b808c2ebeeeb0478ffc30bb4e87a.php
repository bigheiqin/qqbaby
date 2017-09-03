<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html style="overflow-y:hidden;">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/admin/js/html5.js"></script>
<script type="text/javascript" src="/Public/admin/js/respond.min.js"></script>
<script type="text/javascript" src="/Public/admin/js/PIE_IE678.js"></script>
<![endif]-->
<link href="/Public/admin/css/H-ui.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/Public/admin/font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="font/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="/Public/admin/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>H-ui.admin v2.1</title>
</head>
<body style="overflow:hidden">
<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.1" href="/">QQ宝贝后台管理系统</a> <span class="Hui-subtitle l">V1.0</span> <span class="Hui-userbox"><span class="c-white">超级管理员：admin</span> <a class="btn btn-danger radius ml-10" href="#" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" id="nav-toggle" href="#"></a> </header>
<div class="cl Hui-main">
  <aside class="Hui-aside" style="">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
      <dl id="menu-user">
        <dt><i class="icon-user"></i> 用户中心<b></b></dt>
        <dd>
          <ul>
            <li><a _href="user-list.html" href="javascript:;">用户管理</a></li>
            <li><a _href="user-list-del.html" href="javascript:;">删除的用户</a></li>
            <li><a _href="user-list-black.html" href="javascript:;">黑名单</a></li>
            <li><a _href="record-browse.html" href="javascript:void(0)">浏览记录</a></li>
            <li><a _href="record-download.html" href="javascript:void(0)">下载记录</a></li>
            <li><a _href="record-share.html" href="javascript:void(0)">分享记录</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-picture">
        <dt><i class="icon-picture"></i> 客片管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="article-class.html" href="javascript:void(0)">分类管理</a></li>
            <li><a _href="picture-list.html" href="javascript:void(0)">图片管理</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-product">
        <dt><i class="icon-beaker"></i> 产品库<b></b></dt>
        <dd>
          <ul>
            <li><a _href="product-brand.html" href="javascript:void(0)">品牌管理</a></li>
            <li><a _href="article-class.html" href="javascript:void(0)">分类管理</a></li>
            <li><a _href="product-list.html" href="javascript:void(0)">产品管理</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-admin">
        <dt><i class="icon-key"></i> 管理员管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="admin-role.html" href="javascript:void(0)">角色管理</a></li>
            <li><a _href="admin-permission.html" href="javascript:void(0)">权限管理</a></li>
            <li><a _href="admin-list.html" href="javascript:void(0)">管理员列表</a></li>
          </ul>
        </dd>
      </dl>
    </div>
  </aside>
  <div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);"></a></div>
  <section class="Hui-article">
    <div id="Hui-tabNav" class="Hui-tabNav">
      <div class="Hui-tabNav-wp">
        <ul id="min_title_list" class="acrossTab cl">
          <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
        </ul>
      </div>
      <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-forward"></i></a></div>
    </div>
    <div id="iframe_box" class="Hui-articlebox">
      <div class="show_iframe">
        <div style="display:none" class="loading"></div>
        <iframe scrolling="yes" frameborder="0" src="Admin/Index/welcome"></iframe>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="/Public/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/js/Validform_v5.3.2_min.js"></script> 
<script type="text/javascript" src="/Public/admin/layer/layer.min.js"></script>
<script type="text/javascript" src="/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/admin/js/H-ui.admin.js"></script>
</body>
</html>