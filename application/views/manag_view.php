<!DOCTYPE html>
<html>
<head>
<title>管理平台 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url();?>css/manage.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>js/plugins/jquery.cookie.js"></script> 
<script src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>  

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
		$(this).parent().children().each(function () {
			$(this).attr('class','lm-item');
		}); 
		$(this).attr('class','lm-item-select');  	
		show_act($('.lm-item-select').attr('id') ); 	
	});
	
	show_act($('.lm-item-select').attr('id') ); 
});
</script>
</head>

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
	
	
	<div id="m1"  class="pos_center3"> 
		<form  action="deleteauthority" method="post">  
			<?php if (!empty($deleteerror)) echo '<span style="color:red; margin-left: 100px;">' . $deleteerror . '</span><br /><br />' ?>
			<?php if (!empty($deletesuccess)) echo '<span style="color:red; margin-left: 100px;">' . $deletesuccess . '</span><br /><br />' ?>
			<div class="set_input">
			<b>jaccount账号</b> &nbsp;<input  id="jaccountname" type="text" name="jaccountname" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			<b>确认</b> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="jaccountname2" type="text" name="jaccountname2" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			</div>
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>
		</form> 
	</div>
	
	<div id="m2"  class="pos_center3"> 
		<form  action="deleteact" method="post">  
			<?php if (!empty($deleteacterror)) echo '<span style="color:red; margin-left: 100px;">' . $deleteacterror . '</span><br /><br />' ?>
			<?php if (!empty($deleteactsuccess)) echo '<span style="color:red; margin-left: 100px;">' . $deleteactsuccess . '</span><br /><br />' ?>
			<div class="set_input">
			<b>活动id</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="actid" type="text" name="actid" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			<b>确认</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="actid2" type="text" name="actid2" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			</div>
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>	
		</form> 
	</div>
	
	<div id="m3"> 
		<div class="actinfowrap">
				<p>【活动名称】<?php echo $row->name?></p>
				<p>【活动时间】
		 			<?php
						echo $row->start_time;
						if ($row->end_time != 0)
							echo ' - ' . $row->end_time;
					?>
		 		</p>
				<p>【活动地点】
		 			<?php	echo $row->location;?>
		 		</p>

				<p>【活动类型】
		 			<?php	echo $row->type;?>
				</p>
				<p>【活动标签】
					<?php echo $row->tag;?>
				</p>
				<p>【主办方】
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
					echo("<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名：&nbsp;&nbsp;"); 
					$query = $this->db->get_where('user', array('userid' => $row->creatorid));
					foreach ($query->result() as $r)
					{	
						echo $r->username;
						echo("<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮箱：&nbsp;&nbsp;");
						echo $r->email;
						$q = $this->db->get_where('userrank', array('username' => $r->username));
						foreach ($q->result() as $rr)
						{
							echo("<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;jaccount账号：&nbsp;&nbsp;");
							echo $rr->jaccountname;
						}
					}	
				?>
				</p>
				<p>【发起时间】
		 			<?php echo $row->create_time;?>
		 		</p>
				<p>【报名信息】
				<?php if($row->ruledesc!=null):?>
		 		<?php echo($row->ruledesc)?>
				<?php else :?>无
		 		<?php endif;?>
				</p>
				<p>【报名时间】
		 			<?php
						echo $row->sign_start_time;
						echo ' - ' . $row->end_time;
					?>
		 		</p>
				<p>	【人数限制】
					<?php if($row->max_member>0):?>
					<?php echo($row->max_member)?>人
					<?php else:?>无
					<?php endif;?>
				</p>
				
				<p>【参加人数】
					<?php echo($row->member_count)?>人
					<?php if($row->max_member===$row->member_count)echo("(报名人数已满)")?>
		 		</p>
				<p>【关注人数】
		 			<?php	echo $row->sign_count;?>人
		 		</p>	
				<p>【标签数目】
		 			<?php	echo $row->comment_count;?>个
		 		</p>
				<p>【修改次数】
		 			<?php echo $row->modify_count;?>次
		 		</p>
				<p>【浏览次数】
		 			<?php echo $row->view_count;?>次
		 		</p>
				<p>【活动规则】
				<?php if($row->ruledesc!=null):?>
		 		<?php echo($row->ruledesc)?>
				<?php else :?>
				无
		 		<?php endif;?>
				</p>
				<p>【二维码】
		 			<?php if($row->needqrcode==1) {	echo("&nbsp;&nbsp;&nbsp;");echo("需要");} else echo("不需要");?>
		 		</p>
				<p>【附件】	
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
				<?php echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"); ?>无
				<?php endif;?>
				</p>
				<hr>
				<p>	【活动内容】</p>
				<p style="font-size: 14px; word-break: break-all;">
		 			<?php echo  $row->body;?>
		 		</p>
		 		<hr>
				<p>【活动图片】</p>
		 		<?php if ($row->photo !=""):?>
				<div class="act_photo">
					<img src="<?php echo base_url().'upload/photos/'.$row->photo;?>" />
				</div>
		 		<?php endif;?> 
		</div>
		<div class="showright"> 
			<?php if (!empty($acterror)) echo '<span style="color:red; margin-left: 50px;">' . $acterror . '</span><br />' ?><br />
			<b>请输入需查询的活动id：</b>
		</div>
		<form  class="dialog_id" action="viewall" method="post">  
			<div class="set_input">
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="阿拉伯数字"  />  
			<br />
			</DIV>
		  <div class="yellowbtn ssbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>	
		</form> 
	</div>
	
	<div id="m4"> 
		<div class="modify">
		<b>不修改的信息置为空！</b><br />
			<?php if (!empty($modifyerror)) echo '<span style="color:red;">' . $modifyerror . '</span>' ?><br />
			<?php if (!empty($modifysuccess)) echo '<span style="color:red;">' . $modifysuccess . '</span>' ?><br />
		</div>
		<form  action="modifyact" method="post">  
			<div class=set_input3>
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="35" placeholder="不超过11位"  /><br />
			<b>活动名称</b> &nbsp;<input  id="name" type="text" name="name" value="" size="35" placeholder="不超过100个字符(50个汉字)"  />  <br />
			<b>活动开始时间</b> &nbsp;<input  id="start_time" type="text" name="start_time" value="" size="35" placeholder="0000-00-00 00:00:00"  />  <br />
			<b>活动结束时间</b> &nbsp;<input  id="end_time" type="text" name="end_time" value="" size="35" placeholder="0000-00-00 00:00:00"  />  <br />
			<b>地点</b> &nbsp;<input  id="location" type="text" name="location" value="" size="35" placeholder="不超过50个字符(25个汉字)"  />  <br />
			<b>活动类型</b> &nbsp;<select id="type" name="type">
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
			<b>活动标签</b> &nbsp;<input  id="tag" type="text" name="tag" value="" size="35" placeholder="不超过256个字符(178个汉字)"  />  <br />
			<b>主办方</b> &nbsp;<input  id="source" type="text" name="source" value="" size="35" placeholder="不超过50个字符(25个汉字)"  />  <br />
			<b>衔接</b> &nbsp;<input  id="sourcelink" type="text" name="sourcelink" value="" size="35" placeholder="不超过200个字符(100个汉字)"  />  <br />
			<b>发起人id</b> &nbsp;<input  id="creatorid" type="text" name="creatorid" value="" size="35" placeholder="不超过11位"  />  <br />
			<b>发起时间</b> &nbsp;<input  id="create_time" type="text" name="create_time" value="" size="35" placeholder="0000-00-00 00:00:00"  />  <br />
			<b>报名信息</b> &nbsp;<input  id="sign_info" type="text" name="sign_info" value="" size="35" placeholder="不超过256个字符(178个汉字)"  />  <br />
			<b>报名开始时间</b> &nbsp;<input  id="sign_start_time" type="text" name="sign_start_time" value="" size="35" placeholder="0000-00-00 00:00:00"  />  <br />
			<b>报名结束时间</b> &nbsp;<input  id="sign_end_time" type="text" name="sign_end_time" value="" size="35" placeholder="0000-00-00 00:00:00"  />  <br />
			<b>人数限制</b> &nbsp;<input  id="max_member" type="text" name="max_member" value="" size="35" placeholder="不超过11位"  />  <br />
			<b>二维码</b> &nbsp;<!--<input  id="needqrcode" type="text" name="needqrcode" value="" size="25" placeholder="1或0"  />  -->
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>需要</b>
			 <input type="radio" checked="checked" id="needqrcode" name="needqrcode" value="1" />
			 &nbsp; &nbsp; &nbsp;<b>不需要</b>
			 <input type="radio" id="needqrcode" name="needqrcode" value="0" /><br />
			<b>活动规则</b> &nbsp;<input  id="ruledesc" type="text" name="ruledesc" value="" size="35" placeholder="不超过256个字符(178个汉字)"  />  <!--输入框--><br />
			<b>活动内容</b> &nbsp;<input  id="body" type="text" name="body" value="" size="35" placeholder="不超过256个字符(178个汉字)"  />  <!--输入框--><br />
			<b>活动图片</b> &nbsp;<input  id="photo" type="text" name="photo" value="" size="35" placeholder="图片存放的地址，不超过50个字符(25个汉字)"  />  <!--存放地址--><br />
		  </div>
		  <div class="yellowbtn smallbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>			  
		</form> 
	</div>
	
	<div id="m5">
		<div class="showright">
			<?php if (!empty($historyerror)) echo '<span style="color:red; margin-left: 50px;">' . $historyerror . '</span><br />' ?><br />
			<b>请输入需查询的活动id：</b>
		</div>
		<form  class="dialog_id" action="viewhistory" method="post">  
			<div class="set_input">
			<b>活动id</b> &nbsp;<input  id="actid" type="text" name="actid" value="" size="25" placeholder="阿拉伯数字"  />  
			<br />
			</div>
		  <div class="yellowbtn ssbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>	
		</form> 
		
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
	</div>
	
	<div id="m6">
		<div>
		<br />
			<?php			
				printf("<p>共有%s位用户符合查询要求</p>",$num);
				printf("<br />");
				for ($number=1;$number<=$num;$number++)
				{   
					printf("<p>第%s位用户信息如下：</p>",$number);
					printf("<p>【用户名】：%s</p>",$row[$number]['username']);
						$q = $this->db->get_where('userrank', array('username' => $row[$number]['username']));
						if (count($q->result())<=0) {$ans='无';}else {
							foreach ($q->result() as $r)
							{
								$ans=$r->jaccountname;
							}
						}
					printf("<p>【jaccount账号】：%s</p>",$ans);
					printf("<p>【邮箱】：%s</p>",$row[$number]['email']);
					if($row[$number]['phone']!=null) {$ansp=$row[$number]['phone'];} else {$ansp='无';};
					printf("<p>【电话】：%s</p>",$ansp);
					$anspp=base_url().'upload/photos/'.$row[$number]['photo'];
					if($row[$number]['photo']!=null){printf("<div class=\"person_photo\"><img src=%s /></div>",$anspp);}
					else {printf("<p>【图片】：无",$ansp);};
					if($row[$number]['type']!=null) {$anst=$row[$number]['type'];} else {$anst='无';};
					printf("<p>【用户类型】：%s</p>",$anst);
					if($row[$number]['renren_expires_in']!=null) {$ansr=$row[$number]['renren_expires_in'];} else {$ansr='无';};
					printf("<p>【renren_expires_in】：%s</p>",$ansr);
					printf("<br />");
				}
			?>
		</div>	
	
		<div class="showright">
			<?php if (!empty($personerror)) echo '<span style="color:red; margin-left: 50px;">' . $personerror . '</span><br />' ?><br />
			<b>请输入用户名或邮箱：</b>
		</div>
		<form  class="dialog_person" action="viewperson" method="post">  
			<div class="set_input">
			<b>用户名</b> &nbsp;<input  id="username" type="text" name="username" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<b>邮箱</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="email" type="text" name="email" value="" size="25" placeholder="长度大于6，小于50"  />  
			<br /></div>
		  <div class="yellowbtn ssbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>	
		</form> 
	</div>
	
	
	
	<div id="m7">
		<div class="showright">
			<?php if (!empty($personacterror)) echo '<span style="color:red; margin-left: 50px;">' . $personacterror . '</span><br />' ?><br />
			<b>请输入用户名或邮箱：</b>
		</div>
		<form  class="dialog_person" action="viewact" method="post">  
			<div class="set_input">
			<b>用户名</b> &nbsp;<input  id="username" type="text" name="username" value="" size="25" placeholder="长度大于1，小于20"  />  
			<br />
			<b>邮箱</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  id="email" type="text" name="email" value="" size="25" placeholder="长度大于6，小于50"  />  
			<br /></div>
		  <div class="yellowbtn ssbtn">
			<input  id="conform" type="submit" style="margin:20px 0 0 50px"  value="确定" />   
			<input  id="cancel" type="reset" style="margin:20px 0 0 50px"  value="重置" />   
		  </div>
		</form> 
	<b>查询结果如下：</b><br />
	<b>该用户id：<?php echo $row2->userid;?></b>
	<table width"1000" border="1">
	<tr><th>编号No</th><th>活动id</th><th>活动名称</th></tr>
			<?php
				$q=$this->db->get_where('actmember', array('userid' => $row2->userid));
				$number=0;
				foreach ($q->result() as $r)
				{
					$number++;
					printf("<tr>");
					printf("<td>%s</td><td>%s</td>",$number,$r->actid);										
					$query=$this->db->get_where('act', array('actid' => $r->actid));
					foreach ($query->result() as $rr)
					{
						printf("<td>%s</td>",$rr->name);
					}
					printf("</tr>");
				}
			?>
	</table>	
	<?php	for ($number=1;$number<=$num;$number++) $status=null;?>
	</div>
	
	<div id="m8" class="pos_center3"> 
		<form  action="pwdmodify" method="post">  
			<?php if (!empty($pwdsuccess)) echo '<span style="color:red; margin-left: 100px;">' . $pwdsuccess . '</span><br /><br />' ?>
			<?php if (!empty($pwderror)) echo '<span style="color:red; margin-left: 100px;">' . $pwderror . '</span><br /><br />' ?>
			<div class="set_input">
			<b>旧密码</b>   &nbsp;<input id="managepassword" type="password" name="managepassword" value="" size="30" placeholder="长度大于1，小于20" />
			<br />
			<b>新密码</b> &nbsp;<input  id="new" type="password" name="new" value="" size="30" placeholder="长度大于1，小于20"  />  
			<br />
			<b>确认</b> &nbsp; &nbsp; <input  id="new2" type="password" name="new2" value="" size="30" placeholder="长度大于1，小于20"  />  
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
 