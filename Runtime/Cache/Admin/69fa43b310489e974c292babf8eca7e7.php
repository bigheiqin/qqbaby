<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>我的桌面</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/admin/css/iframe.css">
</head>
<body>
<header class="iframe_header">
	<nav class="iframe_top_nav clearfix">
		<span class="glyphicon glyphicon-home"></span>
		首页 <span class="c-gray en"> &gt;</span>
		我的桌面
		<a href="javascript:location.replace(location.href);" class="btn btn-success float_r" title="刷新"><span class="glyphicon glyphicon-refresh"></span></a>
	</nav>
</header>
<div class="iframe_main welcome_iframe">
	<div class="iframe_table">
		<!-- <table class="table_data table table-bordered">
			<thead class="table_hd">
				<tr class="table_row">
					<th class="table_item" colspan="2">服务器信息</th>
				</tr>
			</thead>
			<tbody>
				<tr class="table_row">
					<td class="table_item">服务器计算机名</td>
					<td class="table_item">http://127.0.0.1/</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器IP地址</td>
					<td class="table_item">192.168.1.1</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器域名</td>
					<td class="table_item">www.qqbaby.com</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器端口</td>
					<td class="table_item">80</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器IIS版本</td>
					<td class="table_item">Microsoft-IIS/6.0</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">本文件所在文件夹</td>
					<td class="table_item">D:\phpStudy\WWW\qqbaby\</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器操作系统</td>
					<td class="table_item">Microsoft Windows NT 5.2.3790 Service Pack 2</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">系统所在文件夹</td>
					<td class="table_item">C:\WINDOWS\system32</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器脚本超时时间</td>
					<td class="table_item">30000秒</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器的语言种类</td>
					<td class="table_item">Chinese (People's Republic of China)</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">.NET Framework 版本</td>
					<td class="table_item">2.050727.3655</td>
				</tr>		
				<tr class="table_row">
					<td class="table_item">服务器当前时间</td>
					<td class="table_item">2017-9-8 9:36:23</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器IE版本</td>
					<td class="table_item">6.0000</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">服务器上次启动到现在已运行</td>
					<td class="table_item">7210分钟</td>
				</tr>
				<tr class="table_row">
					<td class="table_item">逻辑驱动器</td>
					<td class="table_item">C:\D:\</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">CPU 总数</td>
					<td class="table_item">4</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">CPU 类型</td>
					<td class="table_item">x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
				</tr>		
				<tr class="table_row">
					<td class="table_item">虚拟内存</td>
					<td class="table_item">52480M</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">当前程序占用内存</td>
					<td class="table_item">3.29M</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">Asp.net所占内存</td>
					<td class="table_item">51.46M</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">当前Session数量</td>
					<td class="table_item">8</td>
				</tr>		
				<tr class="table_row">
					<td class="table_item">当前SessionID</td>
					<td class="table_item">gznhpwmp34004345jz2q3l45</td>
				</tr>	
				<tr class="table_row">
					<td class="table_item">当前系统用户名</td>
					<td class="table_item">NETWORK SERVICE</td>
				</tr>	
			</tbody>
		</table> -->
		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><img src="/Public/<?php echo ($vo['pic_url']); ?>" /><?php endforeach; endif; ?>
	</div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>