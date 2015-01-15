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
<h1>Welcome to：个人信息 查询页面</h1>
<a href="logout">退出</a>
 	<div id="dialog_reg"  class="pos_center2"> 
		<p>请输入用户名或邮箱：</p>
		<form  id="addauthor_form" action="viewperson" method="post">  
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br />' ?><br />
			<b>用户名</b> &nbsp;<input  id="username" type="text" name="username" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<b>邮箱</b> &nbsp;<input  id="email" type="text" name="email" value="" size="25" placeholder="长度大于6，小于50"  />  
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="返回" />   
		  </div>	
		</form> 
	</div>
	
	<div class="viewperson">
				<p>【用户名】：<?php echo $row->username?></p>
				<p>
					【邮箱】：
		 			<?php
						echo $row->email;
						?>
		 		</p>
				<p>【jaccount账号】：
		 		<?php 
						$q = $this->db->get_where('userrank', array('username' => $row->username));
						if (count($q->result())<=0) {echo '无'; }else {
						foreach ($q->result() as $r)
						{
							echo $r->jaccountname;
						}
						}
				?>
				</p>
				<p>
		 			【电话】：
				<?php if($row->phone!=null):?>
		 		<?php echo($row->phone)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				
				<p>
		 			【图片】：				
		 		<?php if ($row->photo !=null):?>
				<div class="person_photo">
					<img src="<?php echo base_url().'upload/photos/'.$row->photo;?>" />
				</div>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				
				<p>
		 			【用户类型】：
				<?php if($row->type!=null):?>
		 		<?php echo($row->type)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				<p>
		 			【renren_expires_in】：
				<?php if($row->renren_expires_in!=0):?>
		 		<?php echo($row->renren_expires_in)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>				
	</div>
</body>
</html>
<div class="actinfowrap">
				<p>【用户名】：<?php echo $row->username?></p>
				<p>
					【邮箱】：
		 			<?php
						echo $row->email;
						?>
		 		</p>
				<p>【jaccount账号】：
		 		<?php 
						$q = $this->db->get_where('userrank', array('username' => $row->username));
						if (count($q->result())<=0) {echo '无'; }else {
						foreach ($q->result() as $r)
						{
							echo $r->jaccountname;
						}
						}
				?>
				</p>
				<p>
		 			【电话】：
				<?php if($row->phone!=null):?>
		 		<?php echo($row->phone)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				
				<p>
		 			【图片】：				
		 		<?php if ($row->photo !=null):?>
				<div class="person_photo">
					<img src="<?php echo base_url().'upload/photos/'.$row->photo;?>" />
				</div>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				
				<p>
		 			【用户类型】：
				<?php if($row->type!=null):?>
		 		<?php echo($row->type)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				<p>
		 			【renren_expires_in】：
				<?php if($row->renren_expires_in!=0):?>
		 		<?php echo($row->renren_expires_in)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>				
		</div>	
<div class="showright">
		<?php if (!empty($personerror)) echo '<span style="color:red; margin-left: 50px;">' . $personerror . '</span><br />' ?><br />
		<p>请输入用户名或邮箱：</p>
		</div>
		<form  id="dialog_person" action="viewperson" method="post">  
			<div class="set_input">
			<b>用户名</b> &nbsp;<input  id="username" type="text" name="username" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<b>邮箱</b> &nbsp;<input  id="email" type="text" name="email" value="" size="25" placeholder="长度大于6，小于50"  />  
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="返回" />   
		  </div>	
		  </div>
		</form> 