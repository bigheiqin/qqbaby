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
		客片管理<span class="c-gray en"> &gt;</span>
		编辑
		<a href="javascript:location.replace(location.href);" class="btn btn-success float_r" title="刷新"><span class="glyphicon glyphicon-refresh"></span></a>
	</nav>
</header>
<div class="iframe_main edit_iframe">
    <div class="iframe_table">
        <form action="/index.php/Admin/Photo/edit" enctype="multipart/form-data" method="post" >
		<table class="table_data table table-bordered">
			<thead class="table_hd">
				<tr class="table_row">
					<th class="table_item" colspan="2">添加发布新的客片</th>
				</tr>
			</thead>
			<tbody>
				<!-- 此处遍历 -->
				<tr class="table_row">
					<td class="table_item">选择所属栏目</td>
					<td class="table_item">
                        <select class="form-control">
                            <option>婴儿照</option>
                            <option>宝宝照</option>
                            <option>儿童照</option>
                            <option>亲子照</option>
                        </select>
                    </td>
				</tr>
				<tr class="table_row">
					<td class="table_item">标题</td>
					<td class="table_item">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="标题">
                        </div>
                    </td>
                </tr>
                <!-- <tr class="table_row">
					<td class="table_item">副标题</td>
					<td class="table_item">192.168.1.1</td>
                </tr> -->
                <tr class="table_row">
					<td class="table_item">缩略图</td>
					<td class="table_item">
                        <a class="src_img_link"><img src="/Public/admin/images/default-thumbnail.png" id="src_img" alt="" data-srcImgBool="false"></a>
                        <input type="file" name="photo" />
                        <button type="button" id="set_srcImg_btn" class="btn btn-default">取消图片</button>
                    </td>
				</tr>
			</tbody>
        </table>
        </form>
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