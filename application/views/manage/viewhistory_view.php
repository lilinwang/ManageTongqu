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
		$('#cancel').click(function() {
			window.location.href = '<?php echo base_url()?>manag/mainview';
		});
	});
</script>
<body>
<!--返回button还有问题-->
	<div><h1>Welcome to：活动参与人员 查询页面</h1></div>
	<a href="logout">退出</a>
 	<div id="dialog_reg"  class="pos_center2"> 
		<form  id="addauthor_form" action="viewhistory" method="post">  
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br />' ?><br />
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="阿拉伯数字"  />  
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="返回" />   
		  </div>	
		</form> 
		<br /><?php if (empty($error)) echo '参与了该活动的人员列表如左' ?><br />
	</div>
	<table width"1000" border="1">
	<tr><th>编号No</th><th>姓名</th><th>email</th><th>状态</th></tr>
			<?php			
				for ($number=1;$number<=$num;$number++)
				{
					$status=null;
					printf("<tr>");
					printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td>",$number,$row[$number]['username'],$row[$number]['email'],$row[$number]['status']);
					printf("</tr>");
				}
			?>
	</table>				
</body>
</html>