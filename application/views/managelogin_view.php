<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/manage.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
</head>
<body>
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
	</div>
	<br />
	
 	<div  class="pos_center2"> 
		<form action="http://localhost/tongqu/index.php/manag/managelogin" method="post">  
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br /><br />' ?>
			<div class=set_input2>
			<br>
			<b>用户名</b>   &nbsp;<input id="managename" type="text" name="managename" value="" size="35" placeholder="长度大于1，小于20" />
			<br />
			<br>
			<b>密码</b>   &nbsp; &nbsp;&nbsp;<input id="managepassword" type="password" name="managepassword" value="" size="35" placeholder="长度大于1，小于20" />
			<br />
			<br /> 
			</div>
		  <div class="yellowbtn logbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="登录" />   
			<input  id="reset" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div></div>
		</form> 
	</div>
</div>
</body>
</html>