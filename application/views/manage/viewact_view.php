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
	<h1>Welcome to：用户参与的活动 查询页面</h1>
	<a href="logout">退出</a>
 	<div id="dialog_reg"  class="pos_center2"> 
		<p>请输入用户名或邮箱：</p>
		<form  id="addauthor_form" action="viewact" method="post">  
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
	<p>查询结果如下：</p>
	<p>该用户id：<?php echo $r->userid;?></p>
	<table width"1000" border="1">
	<tr><th>编号No</th><th>活动id</th><th>活动名称</th></tr>
			<?php
				$q=$this->db->get_where('actmember', array('userid' => $row->userid));
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
	<table width"1000" border="1">	
			<?php			
				for ($number=1;$number<=$num;$number++)
				{
					$status=null;
					
				}
			?>
	</table>
</body>
</html>