<!DOCTYPE html>
<html>
<head>
<title>管理平台 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/manage.css" rel="stylesheet" type="text/css" />
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
<div class="main">
	<div class="header">
		<div class="header_ct">
			<a class="logo"></a> 
			<div class="nav_href">
				
				<a href="<?php echo base_url();?>manag/mainview" class="shouye">
					首页
				</a>
				<a class="headerinside">
					欢迎来到：活动信息 查询页面
				</a>
			</div>
			<?php  
				if (isset($_SESSION['managelogin']) && $_SESSION['managelogin'] == 'true')  
				{
					echo '<div class="hnl">';
					echo '<a href="pswmodify">修改密码</a>' . ' &nbsp; | &nbsp; ';
					echo '<a href="logout">退出</a>';
					echo '</div>';
				};
			?>  
		</div>
	</div>
	
<div class="actcontainer">		
		<div class="actinfowrap">
			<?php if(!empty($row)):?>
				<p>【活动名称】<?php echo $row->name?></p>
				<p>
					【活动时间】
		 			<?php
						echo $row->start_time;
						if ($row->end_time != 0)
							echo ' - ' . $row->end_time;
						?>
		 		</p>
				<p>
					【活动地点】
		 			<?php
						echo $row->location;
						?>
		 		</p>

				<p>
					【活动类型】
		 			<?php
						echo $row->type;
						?> 
				</p>
				<p> 【活动标签】
					<?php echo $row->tag;?>
				</p>
				<p>
					【主办方】
		 			<?php
						if (empty ( $row->sourcelink ))
						{	echo("&nbsp;&nbsp;&nbsp;");
							echo $row->source;}
						else
						{	echo("&nbsp;&nbsp;&nbsp;");
							echo '<a target="_blank" href="' . $row->sourcelink . '">' . $row->source . '</a>';}
					?> 
		 		</p>
				<p>
		 		<?php 
					echo("【发起人】");
					echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;id：&nbsp;&nbsp;");
					echo($row->creatorid);
					echo("</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名：&nbsp;&nbsp;"); 
					$query = $this->db->get_where('user', array('userid' => $row->creatorid));
					foreach ($query->result() as $r)
					{	
						echo $r->username;
						echo("</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮箱：&nbsp;&nbsp;");
						echo $r->email;
						$q = $this->db->get_where('userrank', array('username' => $r->username));
						foreach ($q->result() as $rr)
						{
							echo("</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;jaccount账号：&nbsp;&nbsp;");
							echo $rr->jaccountname;
						}
					}	
				?>
				</p>
				<p>
					【发起时间】
		 			<?php
						echo $row->create_time;
					?>
		 		</p>
				<p>
		 			【报名信息】
				<?php if($row->ruledesc!=null):?>
		 		<?php echo($row->ruledesc)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				<p>
					【报名时间】
		 			<?php
						echo $row->sign_start_time;
						echo ' - ' . $row->end_time;
					?>
		 		</p>
				<p>	
					【人数限制】
					<?php if($row->max_member>0):?>
					<?php echo($row->max_member)?>人
					<?php else:?>无
					<?php endif;?>
				</p>
				
				<p>
		 			【参加人数】<?php echo($row->member_count)?>人
					<?php if($row->max_member===$row->member_count)echo("(报名人数已满)")?>
		 		</p>
				<p>
					【关注人数】
		 			<?php
						echo $row->sign_count;
					?>人
		 		</p>	
				<p>
					【标签数目】
		 			<?php
						echo $row->comment_count;
					?>个
		 		</p>
				<p>
					【修改次数】
		 			<?php echo $row->modify_count;?>次
		 		</p>
				<p>
					【浏览次数】
		 			<?php echo $row->view_count;?>次
		 		</p>
				<p>
		 			【活动规则】
				<?php if($row->ruledesc!=null):?>
		 		<?php echo($row->ruledesc)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				<p>
					【二维码】
		 			<?php if($row->needqrcode==1) {	echo("&nbsp;&nbsp;&nbsp;");echo("需要");} else echo("不需要");?>
		 		</p>
				<p>
		 			【附件】	
				<?php if (!empty($row->attachfiles)): ?>
				<?php $args = split ( ' ', $row->attachfiles );$num=count($args);
					echo("<br/><br/>");
					for($i=1;$i<$num;++$i){
						$j=$i;
						$result=$this->db->get_where ( 'attachfile', array ('attachfileid' => $args[$i]) )->row ();
						echo("<a style=\"cursor:pointer;text-decoration:underline\" href=\"/upload/files/".$result->realname."\">附件".$j.": ".$result->filename."</a><br/><br/>");
					}
				?>
				<?php else: ?>
				<?php echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"); ?>
				无
				<?php endif;?>
				</p>
				<hr>
				
				<p>
		 			【活动内容】
				</p>
				<p style="font-size: 14px; word-break: break-all;">
		 			<?php echo  $row->body;?>
		 		</p>
		 		<hr>
				<p>
		 			【活动图片】
				</p>
		 		<?php if ($row->photo !=""):?>
				<div class="act_photo">
					<img src="<?php echo base_url().'upload/photos/'.$row->photo;?>" />
				</div>
		 		<?php endif;?> 
			<?php endif;?>	
		</div>
		 
 	
		<form  class="dialog_id" action="viewall" method="post">  
			<?php if (!empty($error)) echo '<span style="color:red; margin-left: 50px;">' . $error . '</span><br />' ?><br />
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="阿拉伯数字"  />  
			<br />
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="button" style="margin:20px 0 0 50px"  value="返回" />   
		  </div>	
		</form> 
	</div>
</div>
</body>
</html>
