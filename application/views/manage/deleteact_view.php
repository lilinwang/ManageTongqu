<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/dialog.css" rel="stylesheet" type="text/css" /> 
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
<h1>Welcome to：活动删除页面</h1>
<a href="logout">退出</a>
 	<div id="dialog_reg"  class="pos_center2"> 
		<form  id="addauthor_form" action="deleteact" method="post">  
			<img src="<?=base_url()?>images/logo.png" class="dlogo">
			<br/>
			<p>请输入需要删除的活动id：</p>
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br /><br />' ?>
			<br />
			<b>活动id</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<br />
			<b>再次输入活动id</b><input  id="actid2" type="text" name="actid2" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<br /> 
			
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="取消" />   
		  </div>
			
		</form> 
	</div>
</body>
</html>