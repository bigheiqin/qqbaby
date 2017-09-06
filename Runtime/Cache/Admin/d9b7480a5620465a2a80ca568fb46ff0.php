<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>编辑客片</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/admin/css/webuploader.css">
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
        <form action="<?php echo U('addCase_upload');?>" enctype="multipart/form-data" method="post" >
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
					<td class="table_item">封面图</td>
					<td class="table_item">
                        <label class="src_img_link" for="upload_img">
							<img src="/Public/admin/images/default-thumbnail.png" id="src_img" alt="">
						</label>
                        <input type="file" name="photo" id="upload_img" style="display: none;" />
						<input type="submit" id="upload_btn" value="上传" >
                    </td>
				</tr>
			</tbody>
		</table>
        </form>
	</div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdn.staticfile.org/webuploader/0.1.0/webuploader.min.js"></script>
<script>
$(function(){
	
    // 封面上传图片
	var EventUtil = {
		addHandler: function(element,type,handler) {
			if(element.addEventListener) {
				element.addEventListener(type,handler,false);
			}else if(element.attachEvent) {
				element.attachEvent("on"+type,handler);
			}else {
				element["on" +type] = handler;
			}
		}
	};
	var btn = document.getElementById("upload_img");
	var pic = document.getElementById("src_img");
	function getBase64Image(img) {
		var canvas = document.createElement("canvas");
		canvas.width = img.width;
		canvas.height = img.height;

		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0, img.width, img.height);
		var ext = img.src.substring(img.src.lastIndexOf(".")+1).toLowerCase();
		var dataURL = canvas.toDataURL("image/"+ext);
		return dataURL;
	}
	var ua = navigator.userAgent.toLowerCase();
	EventUtil.addHandler(btn,'change',function(){
	var file = document.getElementById("upload_img");
	
	var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();
	
		// gif在IE浏览器暂时无法显示
		if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
			alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
			return;
		}
		if(/msie ([^;]+)/.test(ua)) {
			var lowIE10 = RegExp["$1"]*1;
			if(lowIE10 == 6){
				// IE6浏览器设置img的src为本地路径可以直接显示图片
				file.select();
				// 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
				file.blur();

				var reallocalpath = document.selection.createRange().text;
				pic.src = reallocalpath;
			}else if(lowIE10 < 10){
				// IE7~9 IE10+按照html5的标准去处理
				file.select();
				// 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
				file.blur();

				var reallocalpath = document.selection.createRange().text;
				// 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
				pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
				// 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
				pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
			}else if(lowIE10 >= 10) {
				html5Reader(file);
			} 
		}else {
		html5Reader(file);
		}
	});
		
	function html5Reader(file) {
		var fileObj = file.files[0],
		img = document.getElementById("src_img");
		// URL.createObjectURL  safari不支持
		img.src = URL.createObjectURL(fileObj);
		img.onload =function() {
			var data = getBase64Image(img);
			// console.log(data);  // 打印出base64编码
		}
		/*
		var file = file.files[0];
		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e){
			var pic = document.getElementById("img");
			pic.src=this.result;
		}*/
	}
	
});

</script>
</body>
</html>