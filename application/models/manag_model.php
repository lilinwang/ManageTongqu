<?php
class Manag_Model extends CI_Model {
	function __construct() {
		parent::__construct ();
		session_start(); 
	}
	
/*登录验证*/
	private function login_error($str)
	{
		$data['error'] = $str;
		$this->load->view('managelogin_view',$data);
	}
	function login()
	{ 
		if (empty($_POST['managename'])) { $this->login_error('用户名为空,请重新输入'); }
		elseif (empty($_POST['managepassword'])) { $this->login_error('密码为空,请重新输入');  }
		else{
			$managepassword = trim($_POST['managepassword']);
			$managename = stripslashes(htmlspecialchars(strip_tags(trim($_POST['managename']))));
			if (strlen($managepassword) < 1 || strlen($managepassword) > 20)
				{ $this->login_error('密码格式不对');}
			elseif (strlen($managename) < 1 || strlen($managename) > 20)
				{ $this->login_error('用户名格式不对,请重新输入'); }
			else
			{
				$data['managepassword'] = sha1($managepassword);
				$data['managename'] = $managename;
				$query = $this->db->get_where('manage',$data);
				if ($query->num_rows() == 0) $this->login_error('用户名密码错误,请重新输入'); 
				else{
				
					$_SESSION['managelogin']='true';$_SESSION['managename']=$managename;
					$data['loginsuccess']="登录成功!欢迎来到管理员平台";
					$this->load->view('manag_view',$data); 
				}
			}
		} 
	}
	
	
	
	
/*为某人添加发活动权限*/
	private function insert_error($str)
	{$data['ttype']="0";
		$data['error'] = $str;
		
		$this->load->view('manag_view',$data);
	}
	function insert()
	{ 
		$isvalid = true;
		if (empty($_POST['username'])) { $this->insert_error('用户名为空,请重新输入'); $isvalid = false; }
		elseif (empty($_POST['jaccountname'])) { $this->insert_error('jaccount账号为空,请重新输入'); $isvalid = false; }
		else{
			$jaccountname = trim($_POST['jaccountname']);
			$username = stripslashes(htmlspecialchars(strip_tags(trim($_POST['username']))));
		
			if (strlen($jaccountname) < 1 || strlen($jaccountname) > 20)
				{ $this->insert_error('jaccount账号格式不对,请重新输入'); $isvalid = false; }
			elseif (mb_strlen($username) < 2 || mb_strlen($username) > 20)
				{ $this->insert_error('用户名格式不对,请重新输入'); $isvalid = false; }
			else{$this->db->where('jaccountname',$jaccountname);
				if ($this->db->get('userrank')->num_rows() > 0) { $this->insert_error('jaccount账号已存在,请重新输入'); $isvalid = false; } 
			}
		} 
		if ($isvalid)
		{
			$this->db->insert('userrank',array('username' => $username,'jaccountname' => $jaccountname,'rank'=>1,'otherinfo'=>null));
			$data['ttype']="0";
			$data['addsuccess']="成功添加了发活动权限!";
			
			$this->load->view('manag_view',$data); 
		}
	}
	
	
	
/*删除某人的发活动权限*/
	private function delete_error($str)
	{
		$data['deleteerror'] = $str;$data['ttype']="1";
		$this->load->view('manag_view',$data);
	}
	function delete()
	{ 
		$isvalid = true;
		if (empty($_POST['jaccountname'])) { $this->delete_error('jaccount账号为空,请重新输入'); $isvalid = false; }
		elseif (empty($_POST['jaccountname2'])) { $this->delete_error('再次输入的jaccount账号为空,请重新输入'); $isvalid = false; }
		else{
			$jaccountname = trim($_POST['jaccountname']);
			$jaccountname2 = trim($_POST['jaccountname2']);
			if (strlen($jaccountname) < 1 || strlen($jaccountname) > 20)
				{ $this->delete_error('jaccount账号格式不对,请重新输入'); $isvalid = false; }
			elseif (strlen($jaccountname2) < 1 || strlen($jaccountname2) > 20)
				{ $this->delete_error('再次输入的jaccount账号格式不对,请重新输入'); $isvalid = false; }
			elseif ($jaccountname!=$jaccountname2)
				{ $this->delete_error('两次输入的jaccount账号不符,请重新输入'); $isvalid = false; }
		} 
		if ($isvalid)
		{
			$this->db->delete('userrank', array('jaccountname' => $jaccountname)); 
			$data['deletesuccess']="成功删除了发活动权限!";$data['ttype']="1";
			$this->load->view('manag_view',$data); 
		}
	}






/*删除某活动*/	
	private function delete_act_error($str)
	{	$data['ttype']="2";
		$data['deleteacterror'] = $str;
		$this->load->view('manag_view',$data);
	}
	function delete_act()
	{ 
		$isvalid = true;
		if (empty($_POST['actid'])) { $this->delete_act_error('活动id为空,请重新输入'); $isvalid = false; }
		elseif (empty($_POST['actid2'])) { $this->delete_act_error('再次输入的活动id为空,请重新输入'); $isvalid = false; }
		else{
			$actid= trim($_POST['actid']);
			$actid2 = trim($_POST['actid2']);
			if (strlen($actid) < 1 || strlen($actid) > 20)
				{ $this->delete_act_error('活动id格式不对,请重新输入'); $isvalid = false; }
			elseif (strlen($actid2) < 1 || strlen($actid2) > 20)
				{ $this->delete_act_error('再次输入的活动id不对,请重新输入'); $isvalid = false; }
			elseif ($actid!=$actid2)
				{ $this->delete_act_error('两次输入的活动id不符,请重新输入'); $isvalid = false; }
			$data['actid']=$actid;
		} 
		if ($isvalid)
		{
			$data['status']='delete';
			$this->db->update('act', $data,array('actid' => $data['actid'])); 
			$data['ttype']="2";
			$data['deleteactsuccess']="成功删除了活动!";
			$this->load->view('manag_view',$data); 
		}
	}





/*查看某活动的全部信息*/	
	private function findact_error($str)
	{$data['ttype']="3";
		$data['acterror'] = $str;
		$this->load->view('manag_view',$data);
	}
	function findact()
	{ 
		$isvalid = true;
		if (empty($_POST['actid'])) { $this->findact_error('活动id为空,请重新输入'); $isvalid = false; }
		else{
			$actid = trim($_POST['actid']);
			if (strlen($actid) < 1 || strlen($actid) > 20)
				{ $this->findact_error('活动id格式不对,请重新输入'); $isvalid = false; }
			else{$this->db->where('actid',$actid);
				if ($this->db->get('act')->num_rows() <= 0) { $this->findact_error('该活动id不存在,请重新输入'); $isvalid = false; } 
			}
		} 
		if ($isvalid)
		{
			$query = $this->db->get_where('act', array('actid' => $actid));
			foreach ($query->result() as $row)
			{	$data['row']=$row;$data['ttype']="3";
				$this->load->view('manag_view',$data);
			}
		}
	}
	

	
/*修改某活动的信息*/	
	private function modify_error($str)
	{
		$data['ttype']="4";
		$data['modifyerror'] = $str;
		$this->load->view('manag_view',$data);
	}
	function isdatetime($str){
		if (!(strlen($str)==10 || strlen($str)==19||strlen($str)==8)) return false;
		switch (strlen($str)){
			case 10:
				if ($str[4]!='-') return false;if ($str[7]!='-') return false;
				break;
			case 19:
				if ($str[4]!='-') return false;if ($str[7]!='-') return false;
				if ($str[10]!=' ') return false;if ($str[13]!=':') return false;if ($str[16]!=':') return false;
				break;
			case 8:
				if ($str[2]!=':') return false;if ($str[5]!=':') return false;
				break;
		}
		return true;
	}
	
	function modify()
	{ 
		$isvalid = true;
		//检验id
		if (empty($_POST['actid'])) { $this->modify_error('活动id为空,请重新输入'); $isvalid = false; }
		else
		{
			$actid = trim($_POST['actid']);
			if (strlen($actid) < 1 || strlen($actid) > 20)
				{ $this->modify_error('活动id格式不对,请重新输入'); $isvalid = false; }
			else
			{
				$this->db->where('actid',$actid);
				if ($this->db->get('act')->num_rows() <= 0) { $this->modify_error('该活动id不存在,请重新输入'); $isvalid = false; } 
			}
		} 
		$data['actid']=$_POST['actid'];
		//检验其他输入的格式
		if (($isvalid)&&(!empty($_POST['start_time'])))
		{
			trim($_POST['start_time']);
			if (!$this->isdatetime($_POST['start_time']))
			{
				$this->modify_error('活动开始时间格式不对,请重新输入'); $isvalid = false;
			} else $data['start_time']=$_POST['start_time'];
		} 
		if (($isvalid)&&(!empty($_POST['end_time']))) 
		{
			trim($_POST['end_time']);
			if (!$this->isdatetime($_POST['end_time']))
			{
				$this->modify_error('活动结束时间格式不对,请重新输入'); $isvalid = false;
			} else $data['end_time']=$_POST['end_time'];
		}
		if (($isvalid)&&(!empty($_POST['create_time']))) 
		{
			trim($_POST['create_time']);
			if (!$this->isdatetime($_POST['create_time']))
			{
				$this->modify_error('活动发起时间格式不对,请重新输入'); $isvalid = false;
			} else $data['create_time']=$_POST['create_time'];
		}
		if (($isvalid)&&(!empty($_POST['sign_start_time']))) 
		{
			trim($_POST['sign_start_time']);
			if (!$this->isdatetime($_POST['sign_start_time']))
			{
				$this->modify_error('报名开始时间格式不对'); $isvalid = false;
			} else $data['sign_start_time']=$_POST['sign_start_time'];
		}
		if (($isvalid)&&(!empty($_POST['sign_end_time']))) 
		{
			trim($_POST['sign_end_time']);
			if (!$this->isdatetime($_POST['sign_end_time']))
			{
				$this->modify_error('报名结束时间格式不对'); $isvalid = false;
			} else $data['sign_end_time']=$_POST['sign_end_time'];
		}
		if (($isvalid)&&(!empty($_POST['location'])))
		{
			trim($_POST['location']);
			if (strlen($actid) < 1 || strlen($actid) > 50){$this->modify_error('活动地点格式不对,请重新输入'); $isvalid = false;}
			else $data['location']=$_POST['location'];
		}
		if (($isvalid)&&(!empty($_POST['name'])))
		{
			trim($_POST['name']);
			if (strlen($actid) < 1 || strlen($actid) > 50){$this->modify_error('活动名称格式不对,请重新输入'); $isvalid = false;}
			else $data['name']=$_POST['name'];
		}
		if (($isvalid)&&(!empty($_POST['type']))) 
		{
			trim($_POST['type']);
			if (strlen($actid) < 1 || strlen($actid) > 20){$this->modify_error('活动类型格式不对,请重新输入'); $isvalid = false;}
			else $data['type']=$_POST['type'];
		}
		if (($isvalid)&&(!empty($_POST['tag']))) 
		{
			trim($_POST['tag']);
			if (strlen($_POST['tag']) < 1 || strlen($_POST['tag']) > 256){$this->modify_error('活动标签格式不对,请重新输入'); $isvalid = false;}
			else $data['tag']=$_POST['tag'];
		}
		if (($isvalid)&&(!empty($_POST['source'])))	
		{
			trim($_POST['source']);
			if (strlen($_POST['source']) < 1 || strlen($_POST['source']) > 50){$this->modify_error('主办方格式不对,请重新输入'); $isvalid = false;}
			else $data['source']=$_POST['source'];
		}
		if (($isvalid)&&(!empty($_POST['sourcelink']))) {
			trim($_POST['sourcelink']);
			if (strlen($_POST['sourcelink']) < 1 || strlen($_POST['sourcelink']) > 200){$this->modify_error('衔接格式不对,请重新输入'); $isvalid = false;}
			else $data['sourcelink']=$_POST['sourcelink'];
		}
		if (($isvalid)&&(!empty($_POST['creatorid']))) {
			trim($_POST['creatorid']);
			if (strlen($_POST['creatorid']) < 1 || strlen($_POST['creatorid']) > 11){$this->modify_error('发起人id格式不对,请重新输入'); $isvalid = false;}
			else $data['creatorid']=$_POST['creatorid'];
		}
		if (($isvalid)&&(!empty($_POST['sign_info']))) {
			trim($_POST['sign_info']);
			if (strlen($_POST['sign_info']) < 1 || strlen($_POST['sign_info']) > 256){$this->modify_error('报名信息格式不对,请重新输入'); $isvalid = false;}
			else $data['sign_info']=$_POST['sign_info'];
		}
		if (($isvalid)&&(!empty($_POST['max_member']))) {
			trim($_POST['max_member']);
			if (strlen($_POST['max_member']) < 1 || strlen($_POST['max_member']) > 11){$this->modify_error('人数限制格式不对,请重新输入'); $isvalid = false;}
			else $data['max_member']=$_POST['max_member'];
		}
		if (($isvalid)&&(!empty($_POST['needqrcode']))) {
			trim($_POST['needqrcode']);
			if ($_POST['needqrcode']!= 1 && $_POST['needqrcode']!=0){$this->modify_error('是否需要二维码格式不对,请重新输入'); $isvalid = false;}
			else $data['needqrcode']=$_POST['needqrcode'];
		}
		if (($isvalid)&&(!empty($_POST['ruledesc']))) {
			trim($_POST['ruledesc']);
			if (strlen($_POST['ruledesc']) < 1 || strlen($_POST['ruledesc']) > 256){$this->modify_error('活动规则格式不对,请重新输入'); $isvalid = false;}
			else $data['ruledesc']=$_POST['ruledesc'];
		}
		if (($isvalid)&&(!empty($_POST['body']))) {
			trim($_POST['body']);
			if (strlen($_POST['body']) < 1 || strlen($_POST['body']) >256){$this->modify_error('活动内容格式不对,请重新输入'); $isvalid = false;}
			else $data['body']=$_POST['body'];
		}
		if (($isvalid)&&(!empty($_POST['photo']))) {
			trim($_POST['photo']);
			if (strlen($_POST['photo']) < 1 || strlen($_POST['photo']) > 50){$this->modify_error('活动图片格式不对,请重新输入'); $isvalid = false;}
			else $data['photo']=$_POST['photo'];
		}
		if ($isvalid)
		{
			//print_r($data);
			$this->db->update('act', $data,array('actid' => $data['actid'])); 
			$data['ttype']="4";
			$data['modifysuccess']="成功修改了活动!";
			$this->load->view('manag_view',$data); 
		}
	}
	
	
	
/*查看某活动有哪些人报名*/
	private function findhistory_error($str)
	{$data['ttype']="5";
		$data['historyerror'] = $str;
		$this->load->view('manag_view',$data);
	}
	function findhistory()
	{ 
		$isvalid = true;
		if (empty($_POST['actid'])) {$this->findhistory_error('活动id为空,请重新输入'); $isvalid = false; }
		else{
			$actid = trim($_POST['actid']);
			if (strlen($actid) < 1 || strlen($actid) > 20)
				{ $this->findhistory_error('活动id格式不对,请重新输入'); $isvalid = false; }
			else{$this->db->where('actid',$actid);
				if ($this->db->get('act')->num_rows() <= 0) { $this->findhistory_error('该活动id不存在,请重新输入'); $isvalid = false; } 
			}
		} 
		if ($isvalid)
		{
			$query = $this->db->get_where('actmember', array('actid' => $actid));
			if($query->num_rows() <= 0){
				$data['historyerror'] = '该活动无人参加';$data['ttype']="5";
				$this->load->view('manag_view',$data);
			}
			else {
				$number=0;
				foreach ($query->result() as $row)
				{	
							$q= $this->db->get_where('user', array('userid' => $row->userid));
							foreach ($q->result() as $r)
							{
								$number++;$rowagain[$number]['status']=null;
								$rowagain[$number]['username']=$r->username;$rowagain[$number]['email']=$r->email;
								if ($row->type==delete){$rowagain[$number]['status']="已删除";}
							}
				
				}
				$data['row']=$rowagain;
				$data['num']=$number;$data['ttype']="5";
				$this->load->view('manag_view',$data);
			}
		}
	}
	
	
	
/*查看某人的个人信息*/	
	private function findperson_error($str)
	{
		$data['personerror'] = $str;$data['ttype']="6";
		$this->load->view('manag_view',$data);
	}
	function findperson()
	{ 
		$isvalid = true;
		if (empty($_POST['username']) && empty($_POST['email'])) { $this->findperson_error('用户名和邮箱不能都为空,请重新输入'); $isvalid = false; }
		else{
			if (empty($_POST['username']))
			{
				$email = trim($_POST['email']);
				if (mb_strlen($email) < 6 || mb_strlen($email) > 50 || !filter_var($email,FILTER_VALIDATE_EMAIL))
		        { $this->findperson_error('邮箱格式错误,请重新输入'); $isvalid = false;}
				else
				{
					$this->db->where('email',$email);
					if ($this->db->get('user')->num_rows() <= 0) { $this->findperson_error('该email不存在,请重新输入'); $isvalid = false; } 
				}
				if ($isvalid)
				{
					$query = $this->db->get_where('user', array('email' => $email));
					$number=0;
					foreach ($query->result() as $r)
					{	
						$number++;
						$rowagain[$number]['username']=$r->username;$rowagain[$number]['email']=$r->email;
						$rowagain[$number]['jaccountname']=$r->jaccountname;$rowagain[$number]['photo']=$r->photo;
						$rowagain[$number]['type']=$r->type;$rowagain[$number]['renren_expires_in']=$r->renren_expires_in;
					}
					$data['row']=$rowagain;$data['num']=$number;$data['ttype']="6";
					$this->load->view('manag_view',$data);
				}
			}
			else
			{
				$username = trim($_POST['username']);
				if (mb_strlen($username) < 2 || mb_strlen($username) > 19)
		        { $this->findperson_error('用户名格式错误,请重新输入'); $isvalid = false;}
				else
				{
					$this->db->where('username',$username);
					if ($this->db->get('user')->num_rows() <= 0) { $this->findperson_error('该用户名不存在,请重新输入'); $isvalid = false; } 
				}
				if ($isvalid)
				{
					$query = $this->db->get_where('user', array('username' => $username));
					$number=0;
					foreach ($query->result() as $r)
					{	
						$number++;
						$rowagain[$number]['username']=$r->username;$rowagain[$number]['email']=$r->email;
						$rowagain[$number]['jaccountname']=$r->jaccountname;$rowagain[$number]['photo']=$r->photo;
						$rowagain[$number]['type']=$r->type;$rowagain[$number]['renren_expires_in']=$r->renren_expires_in;
					}
					$data['row']=$rowagain;$data['num']=$number;$data['ttype']="6";
					$this->load->view('manag_view',$data);
				}
			}
		} 
	}
	
	
	
	
/*查看某人参加了哪些活动*/	
	private function findpersonact_error($str)
	{
		$data['personacterror'] = $str;$data['ttype']="7";
		$this->load->view('manag_view',$data);
	}
	function findpersonact()
	{ 
		$isvalid = true;
		if (empty($_POST['username']) && empty($_POST['email'])) { $this->findpersonact_error('用户名和邮箱不能都为空'); $isvalid = false; }
		else{
			if (empty($_POST['username'])){
				$email = trim($_POST['email']);
				if (mb_strlen($email) < 6 || mb_strlen($email) > 50 || !filter_var($email,FILTER_VALIDATE_EMAIL))
		        { $this->findpersonact_error('邮箱格式错误,请重新输入'); $isvalid = false;}
				else
				{
					$this->db->where('email',$email);
					if ($this->db->get('user')->num_rows() <= 0) { $this->findpersonact_error('该email不存在,请重新输入'); $isvalid = false; } 
				}
				if ($isvalid)
				{
					$query = $this->db->get_where('user', array('email' => $email));
					foreach ($query->result() as $row){
						$data['row2']=$row;$data['ttype']="7";
						$this->load->view('manag_view',$data);
					}
					if($query->num_rows() <= 0)
						{
							$data['error'] = '该用户没有参加任何活动';$data['ttype']="7";
							$this->load->view('manag_view',$data);
						}
				}
			}
			else
			{
				$username = trim($_POST['username']);
				if (mb_strlen($username) < 2 || mb_strlen($username) > 19)
		        { $this->findpersonact_error('用户名格式错误,请重新输入'); $isvalid = false;}
				else
				{
					$this->db->where('username',$username);
					if ($this->db->get('user')->num_rows() <= 0) { $this->findpersonact_error('该用户不存在,请重新输入'); $isvalid = false; } 
				}
				if ($isvalid)
				{
					$query = $this->db->get_where('user', array('username' => $username));
					if($query->num_rows() <= 0)
						{
							$data['error'] = '该用户没有参加任何活动';$data['ttype']="7";
							$this->load->view('manag_view',$data);
						}
					foreach ($query->result() as $row){
						$data['row2']=$row;$data['ttype']="7";
						$this->load->view('manag_view',$data);
					}
				}
			}
			
		}
	}
	
	
/*修改密码*/	
	private function pwd_error($str)
	{
		$data['pwderror'] = $str;$data['ttype']="8";
		$this->load->view('manag_view',$data);
	}
	function pwd()
	{ 
		$isvalid = true;
		if (empty($_POST['managepassword'])) { $this->pwd_error('请输入旧密码'); $isvalid = false; }
		elseif (empty($_POST['new'])) { $this->pwd_error('新密码为空，请重新输入'); $isvalid = false; }
		elseif (empty($_POST['new2'])) { $this->pwd_error('需要输入两次新密码'); $isvalid = false; }
		else{
			$new = trim($_POST['new']);
			$new2 = trim($_POST['new2']);$managename=$_SESSION['managename'];
			$managepassword=trim($_POST['managepassword']);
			if (strlen($new) < 1 || strlen($new) > 20|| strlen($new2) < 1 || strlen($new2) > 20)
				{ $this->pwd_error('新密码格式不对,请重新输入'); $isvalid = false; }
			elseif ($new!=$new2)
				{ $this->pwd_error('两次输入的新密码不符,请重新输入'); $isvalid = false; }
		} 
		if ($isvalid)
		{
			$managepassword=sha1($managepassword);
			$query=$this->db->get_where('manage', array('managepassword' => $managepassword,'managename'=>$managename));			
			if ($query->num_rows()<=0) {
				$data['pwderror']="旧密码与用户名不符，请重新输入";$data['ttype']="8";
				$this->load->view('manag_view',$data); 
			}else {
				$data['managepassword']=sha1($new);
				$this->db->update('manage',$data, array('managename'=>$managename));	
				$data['managepassword']=null;
				$data['pwdsuccess']="成功修改了密码!";$data['ttype']="8";
				$this->load->view('manag_view',$data); 
			}
		}
	}
}
?>	