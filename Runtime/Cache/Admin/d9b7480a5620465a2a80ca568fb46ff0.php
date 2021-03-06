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
		<form action="" method="POST" id="form_ajax">
		<table class="table_data table table-bordered">
			<thead class="table_hd">
				<tr class="table_row">
					<th class="table_item" colspan="2">添加新的客片</th>
				</tr>
			</thead>
			<tbody>
				<!-- 此处遍历 -->
				<tr class="table_row">
					<td class="table_item">选择所属栏目</td>
					<td class="table_item">
                        <select class="form-control" name="type_id">
                            <option value="1">婴儿照</option>
                            <option value="2">宝宝照</option>
                            <option value="3">儿童照</option>
							<option value="4">亲子照</option>
							<option value="5">活动</option>
                        </select>
                    </td>
				</tr>
				<tr class="table_row">
					<td class="table_item">标题</td>
					<td class="table_item">
                        <div class="form-group">
                            <input type="text" name="case_titel" class="form-control"  placeholder="标题">
                        </div>
                    </td>
                </tr>
                <tr class="table_row">
					<td class="table_item">封面图</td>
					<td class="table_item">
                        <!-- <label class="src_img_link" for="upload_img" id="src_img_test"> -->
							<img src="/Public/admin/images/default-thumbnail.png" id="src_img" alt="">
						<!-- </label> -->
						<button type="button" id="src_img_btn">选择封面图</button>
                    </td>
				</tr>
			</tbody>
		</table>
		<div class="tip_box alert alert-danger"><span class="glyphicon glyphicon-info-sign" style="font-size: 30px; vertical-align: bottom;"></span> 多图上传选定后，如需更改，请重新刷新页面！</div>
		<div class="multiple_upload">
			<button id="browse" type="button">选择文件</button>
			<button id="start_upload" type="button">开始上传</button>
			<div id="file-list">
			</div>
		</div>
		</form>
	</div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script	src="/Public/admin/js/plupload.full.min.js"></script>
<script>
$(function(){
	// 单图上传
	
	var oneUploader = new plupload.Uploader({
		browse_button : 'src_img_btn',
		url : '<?php echo U("addCover_upload");?>',
		silverlight_xap_url : '/Public/admin/js/Moxie.xap',
		filters: {
		  mime_types : [ //只允许上传图片文件
		    { title : "图片文件", extensions : "jpg,gif,png" }
		  ]
		},
		multi_selection: false,	// 对话框单选
		file_data_name: 'case_main'
	});
	oneUploader.init();
	// 单图
	oneUploader.bind('FilesAdded',function(uploader,files){
		if(files.length > 1){
			uploader.removeFile(files[0]);
		} else {
			previewImage(files[0], function(imgsrc){
				$('#src_img').attr('src', imgsrc)
			}, 1)
		}
	});
	// 此处用来存放返回的主表id
	// var $back_case_id;
	// oneUploader.bind('FileUploaded', function(uploader, file, responseObject){
	// 	// console.log('某一队列上传完成后返回的服务器信息', responseObject.response)
	// 	// # responseObject.response 将会返回模板的大量字符，所以请不要做多于打印，且请在返回值后添加 exit()
	// 	// # 可以尝试关闭debug调试模式看看。
	// 	$back_case_id = responseObject.response
	// 	console.log('test测试111111')
	// });
	// 所以单图上传完毕后，触发多图上传
	oneUploader.bind('UploadComplete', function(oneUploader, files){
		// console.log('test测试22222')
		// uploader.setOption({
		// 	multipart_params: {
		// 		'case_id': $back_case_id,	// 传递主表id
		// 		'type_id': $('select[name="type_id"]').val()	// 传递所属栏目
		// 	}
		// });
		uploader.start()
	});
	
	// 多图上传
	var uploader = new plupload.Uploader({ //实例化一个plupload上传对象
		browse_button : 'browse',
		url: '<?php echo U("addDetail_upload");?>',
		flash_swf_url : '/Public/admin/js/Moxie.swf',
		silverlight_xap_url : '/Public/admin/js/Moxie.xap',
		filters: {
		  mime_types : [ //只允许上传图片文件
		    { title : "图片文件", extensions : "jpg,gif,png" }
		  ]
		},
		file_data_name: 'case_img'
	});
	uploader.init(); //初始化

	// 绑定文件添加进队列事件
	uploader.bind('FilesAdded',function(uploader,files){
		for(var i = 0, len = files.length; i<len; i++){
			!function(i){
				previewImage(files[i], function(imgsrc){
					$('#file-list').append('<img src="'+ imgsrc +'" />');
				})
		    }(i);
		}
	});
	//plupload中为我们提供了mOxie对象
	//有关mOxie的介绍和说明请看：https://github.com/moxiecode/moxie/wiki/API
	//如果你不想了解那么多的话，那就照抄本示例的代码来得到预览的图片吧
	function previewImage(file,callback, typeId) {
		//file为plupload事件监听函数参数中的file对象,callback为预览图片准备完成的回调函数
		if(!file || !/image\//.test(file.type)) return; //确保文件是图片
		if(file.type=='image/gif') {
			//gif使用FileReader进行预览,因为mOxie.Image只支持jpg和png
			var fr = new mOxie.FileReader();
			fr.onload = function(){
				callback(fr.result);
				fr.destroy();
				fr = null;
			}
			fr.readAsDataURL(file.getSource());
		} else {
			var preloader = new mOxie.Image();
			preloader.onload = function() {
				if(typeId == 1) {
					preloader.downsize( 300, 300 )
				}
				// preloader.downsize( 300, 300 );//先压缩一下要预览的图片,宽300，高300
				var imgsrc = preloader.type=='image/jpeg' ? preloader.getAsDataURL('image/jpeg', 80) : preloader.getAsDataURL(); //得到图片src,实质为一个base64编码的数据
				callback && callback(imgsrc); //callback传入的参数为预览图片的url
				preloader.destroy();
				preloader = null;
			};
			preloader.load( file.getSource() );
		}	
	}

	$('#start_upload').click(function(){
		oneUploader.setOption({
			multipart_params: {
				'type_id': $('select[name="type_id"]').val(),
				'case_titel': $('input[name="case_titel"]').val()
			}
		});
		oneUploader.start()
	});
});

</script>
</body>
</html>