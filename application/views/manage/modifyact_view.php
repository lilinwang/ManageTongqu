<!DOCTYPE html>
<html>
<head>
<title>管理平台 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/act.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
</head>
<script>
	$(function () {
	//	document.getElementById("long").checked=true;
		$('#cancel').click(function() {
			window.location.href = '<?php echo base_url()?>manag/mainview';
		});
	});
</script>
<body>
<h1>Welcome to：活动信息 修改页面</h1>
<a href="logout">退出</a>
 	<div id="dialog_regwll"  class="pos_centerwll"> 
		<form  id="addauthor_form" action="modifyact" method="post">  
			<p color="red">不修改的信息置为空！</p>
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br />' ?><br />
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="不超过11位"  />  
			<br />
			<b>活动名称</b> &nbsp;<input  id="name" type="text" name="name" value="" size="25" placeholder="不超过100个字符(50个汉字)"  />  
			<br />
			<b>活动开始时间</b> &nbsp;<input  id="start_time" type="text" name="start_time" value="" size="25" placeholder="0000-00-00 00:00:00"  />  
			<br />
			<b>活动结束时间</b> &nbsp;<input  id="end_time" type="text" name="end_time" value="" size="25" placeholder="0000-00-00 00:00:00"  />  
			<br />
			<b>地点</b> &nbsp;<input  id="location" type="text" name="location" value="" size="25" placeholder="不超过50个字符(25个汉字)"  />  
			<br />
			<b>活动类型</b> &nbsp;<!--<input  id="type" type="text" name="type" value="" size="20" placeholder="不超过20个字符(10个汉字)"  />  -->
			<select id="type" name="type">
				<option value=""></option>
				<option value="校内公告">校内公告</option>
				<option value="讲座论坛">讲座论坛</option>
				<option value="学业科创">学业科创</option>
				<option value="就业宣讲">就业宣讲</option>
				<option value="精彩游学,绚彩夏季">精彩游学,绚彩夏季</option>
				<option value="勤工/奖助">勤工/奖助</option>
				<option value="公益/时间">公益/时间</option>
				<option value="校园文娱">校园文娱</option>
				<option value="校园体育">校园体育</option>
				<option value="大杂烩">大杂烩</option>
				<option value="缤纷小学期">缤纷小学期</option>
				<option value="社会实践">社会实践</option>
				<option value="科技创新">科技创新</option>
				<option value="创业训练">创业训练</option>
				<option value="特色讲座">特色讲座</option>
				<option value="兴趣体验">兴趣体验</option>
				<option value="兴趣指南">兴趣指南</option>
			</select>

			<br />
			<b>活动标签</b> &nbsp;<input  id="tag" type="text" name="tag" value="" size="25" placeholder="不超过256个字符(178个汉字)"  />  
			<br />
			<b>主办方</b> &nbsp;<input  id="source" type="text" name="source" value="" size="25" placeholder="不超过50个字符(25个汉字)"  />  
			<br />
			<b>衔接</b> &nbsp;<input  id="sourcelink" type="text" name="sourcelink" value="" size="25" placeholder="不超过200个字符(100个汉字)"  />  
			<br />
			<b>发起人id</b> &nbsp;<input  id="creatorid" type="text" name="creatorid" value="" size="25" placeholder="不超过11位"  />  
			<br />
			<b>发起时间</b> &nbsp;<input  id="create_time" type="text" name="create_time" value="" size="25" placeholder="0000-00-00 00:00:00"  />  
			<br />
			<b>报名信息</b> &nbsp;<input  id="sign_info" type="text" name="sign_info" value="" size="25" placeholder="不超过256个字符(178个汉字)"  />  
			<br />
			<b>报名开始时间</b> &nbsp;<input  id="sign_start_time" type="text" name="sign_start_time" value="" size="25" placeholder="0000-00-00 00:00:00"  />  
			<br />
			<b>报名结束时间</b> &nbsp;<input  id="sign_end_time" type="text" name="sign_end_time" value="" size="25" placeholder="0000-00-00 00:00:00"  />  
			<br />
			<b>人数限制</b> &nbsp;<input  id="max_member" type="text" name="max_member" value="" size="25" placeholder="不超过11位"  />  
			<br />
			<b>是否需要二维码</b> &nbsp;<!--<input  id="needqrcode" type="text" name="needqrcode" value="" size="25" placeholder="1或0"  />  -->
			是：<input type="radio" checked="checked" id="needqrcode" name="needqrcode" value="1" />
			否：<input type="radio" id="needqrcode" name="needqrcode" value="0" />
			<br />
			<b>活动规则</b> &nbsp;<input  id="ruledesc" type="text" name="ruledesc" value="" size="25" placeholder="不超过256个字符(178个汉字)"  />  <!--输入框-->
	<!--		<textarea cols="30" rows="5">
			</textarea>
-->
			<br />
	<!--		<b>附件</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="阿拉伯数字"  />  存放地址？
			<br />
	-->
			<b>活动内容</b> &nbsp;<input  id="body" type="text" name="body" value="" size="25" placeholder="不超过256个字符(178个汉字)"  />  <!--输入框-->

			<br />
			<b>活动图片</b> &nbsp;<input  id="photo" type="text" name="photo" value="" size="25" placeholder="图片存放的地址，不超过50个字符(25个汉字)"  />  <!--存放地址-->
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="返回" />   
		  </div>	
		</form> 
	</div>
</body>
</html>