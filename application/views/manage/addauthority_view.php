<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/manage.css" rel="stylesheet" type="text/css" /> 
<script src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
</head>
<script type="text/javascript">
$(document).ready(function () {
	function hide_allact()
	{
		$('.addright').children().each(function () 
		{   
					$(this).hide();
	    }); 
	}		
	function show_act(actid)
	{ 
		var disid = 'm' + actid; 
		hide_allact(); 
		$('#' + disid).show();
	}
	
	$('.lm-item').click(function () {
		$(this).parent().children().each(function () {
			$(this).attr('class','lm-item');
		});
		$(this).attr('class','lm-item-select');  	
		show_act($('.lm-item-select').attr('id') ); 
	});
	
	$('.lm-item-select').click(function () {	
		show_act($('.lm-item-select').attr('id') ); 	
	});
	
	show_act($('.lm-item-select').attr('id') ); 
});
</script>
<body>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div class="main">
	<div class="header">
			<a class="logo"></a> 
			<div class="nav_href">
				<a href="http://tongqu.me/" class="shouye">
					首页
				</a>
				<a class="headerinside">
					欢迎来到：同去网 管理平台
				</a>
			</div>
			<?php  
				if (isset($_SESSION['managelogin']) && $_SESSION['managelogin'] == 'true')  
				{
					echo '<div class="hnl">';
					echo '<a href="logout">退出</a>';
					echo '</div>';
				};
			?>  
	</div><br />
	<div class="leftmenu" id="leftmenu">
		<?php if ($ttype=="0" || empty($ttype)):?>
			<p id="0" class="lm-item-select">发活动权限 添加</p> 
		<?php else :?>
			<p id="0" class="lm-item">发活动权限 添加</p> 
		<?php endif?>
			<br />
			
		<?php if ($ttype=="1"):?>
			<p id="1" class="lm-item-select">发活动权限 删除</p> 
		<?php else :?>
			<p id="1" class="lm-item">发活动权限 删除</p> <?php endif?>
			<br />
			
		<?php if ($ttype=="2"):?>
			<p id="2" class="lm-item-select">活动信息 删除</p>
		<?php else :?>
			<p id="2" class="lm-item">活动信息 删除</p><?php endif?>
			<br />
			
		<?php if ($ttype=="3"):?>
			<p id="3" class="lm-item-select">活动信息 查看</p>	
		<?php else :?>
			<p id="3" class="lm-item">活动信息 查看</p><?php endif?>
			<br />
			
		<?php if ($ttype=="4"):?>
			<p id="4" class="lm-item-select">活动信息 修改</p>
		<?php else :?>
			<p id="4" class="lm-item">活动信息 修改</p><?php endif?>
			<br />
			
		<?php if ($ttype=="5"):?>
			<p id="5" class="lm-item-select">报名历史 查看</p>
		<?php else :?>
			<p id="5" class="lm-item">报名历史 查看</p><?php endif?>
			<br />
			
		<?php if ($ttype=="6"):?>
			<p id="6" class="lm-item-select">学生信息 查看</p>
		<?php else :?>
			<p id="6" class="lm-item">学生信息 查看</p><?php endif?>
			<br />
			
		<?php if ($ttype=="7"):?>
			<p id="7" class="lm-item-select">学生参与的活动</p>
		<?php else :?>
			<p id="7" class="lm-item">学生参与的活动</p><?php endif?>
			<br /><br />
		
		<?php if ($ttype=="8"):?>
			<p id="8" class="lm-item-select" style="color:red;font-weight:bold">修改我的密码</p>
		<?php else :?>
			<p id="8" class="lm-item" style="color:red;font-weight:bold">修改我的密码</p><?php endif?>
	</div>
	
<div class="addright">
	<div id="m0" class="pos_center3"> 
		<form  action="addauthority" method="post">  
			<?php if (!empty($addsuccess)) echo '<span style="color:red; margin-left: 100px;">' . $addsuccess . '</span><br /><br />' ?>
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 100px;">' . $error . '</span><br /><br />' ?>
			<div class="set_input">
			<b>用户名</b>   &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="username" type="text" name="username" value="" size="30" placeholder="最好为真实姓名" />
			<br />
			<b>jaccount账号</b> &nbsp;<input  id="jaccountname" type="text" name="jaccountname" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			</div>
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>		
		</form> 
	</div>
</div>
</div>
</body>
</html>