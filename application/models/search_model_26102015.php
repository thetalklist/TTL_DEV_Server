<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends TL_Model{

	public function __construct(){
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		if(!$this->useCached){
			$this->cacheTime = 1;
		}
	}
	protected $useCached = true;
	protected $cacheTime = 3000000;
	protected function mkKey($searchData){
		ksort($searchData);
		$str = '';
		$keys = array('langs','hRateStart','hRateEnd','availableTobook','online','gender','country','province','keyword','rating','school');
		foreach($searchData as $k=>$v){
			if(!in_array($k,$keys)){
				continue;
			}
			$str .= $k.'_|_'.$v; 
		}
		return md5($str);
	}
	public function getResult($searchData){
	//echo "<pre>";print_r($searchData);die();
	 
		$ssid=$this->session->userdata['uid'];
		if($ssid=='')
		{
				//$this->session->set_userdata('free_session','y');
				$searchData['freeSes']='y';
				$searchData['freeSesUser']='y';
		}
		$RollId=$this->session->userdata['roleId'];
		if($RollId >0)
		{
				$this->session->set_userdata('free_session','n');
				/*$searchData['freeSes']='n';*/
				$searchData['freeSesUser']='n';
		}
		$cacheKey  = $this->mkKey($searchData);

		$results = $this->cache->get($cacheKey);
		if($results && count($results)>1){
			return $results;
		}
		$whereField = array();
		$gen = array();
		$teachers = $this->getTeachers();
		if($searchData['online'] != 'false'){
			$inUser = $this->getOnlineTeacher();
			if($inUser == ''){
				//$whereField[] = '`uid` in ("")';
				$whereField[] = '`profile`.`uid` in ("")';
			}else{
				//$whereField[] = '`uid` in ('.implode(',',$inUser).')';
				$whereField[] = '`profile`.`uid` in ('.implode(',',$inUser).')';
			}
		}else{
			$inUser = $teachers;
			//$whereField[] = '`uid` in ('.implode(',',$inUser['id']).')';
			//$whereField[] = '`profile`.`uid` in ('.implode(',',$inUser['id']).')';
			$whereField[] = '1=1';
		}
		if($searchData['langInput1'] != '' || $searchData['langInput2'] != ''){
			$lsearch = '';
			$lsearch1 = '';
			$where = '';
			if($searchData['langInput1'] != ''){
				$lsearch = $searchData['langInput1'];
			}
			if($searchData['langInput2'] != ''){
				if($searchData['langInput2'] != 'English' AND $searchData['langInput2'] != '0'){
					$lsearch1 = $searchData['langInput2'];
				}
			}
			//$where .= " (`nativeLanguage` LIKE '%{$lsearch}%' AND `otherLanguage` LIKE '%{$lsearch1}%') OR (`nativeLanguage` LIKE '%{$lsearch1}%' AND `otherLanguage` LIKE '%{$lsearch}%')";
			$where .= "`profile`.`nativeLanguage` LIKE '%{$lsearch}%' AND `profile`.`otherLanguage` LIKE '%{$lsearch1}%' ";
			//$where .= "`profile`.`nativeLanguage` LIKE '%{$lsearch}%' AND `profile`.`otherLanguage` LIKE '%{$lsearch1}%' and user.`hiddenRole` = 0 and `profile`.`pic_upload` = 1 AND `profile`.`vid_upload` =1 and profile.`BioGraphy` = 1 and profile.`Cal_open` = 1";
			//$where .= "`profile`.`nativeLanguage` LIKE '%{$lsearch}%' AND `profile`.`otherLanguage` LIKE '%{$lsearch1}%' and user.`hiddenRole` = 0 and `profile`.`pic_upload` = 1 AND profile.`BioGraphy` = 1";
			//$where .= "`profile`.`nativeLanguage` LIKE '%{$lsearch}%' AND `profile`.`otherLanguage` LIKE '%{$lsearch1}%' and user.`hiddenRole` = 0 AND `profile`.`pic_upload` = 1";
			$whereField[] = "({$where})";
			$gen[] = "({$where})";
		}
		
		
		/* Added by Ilyas */
		
		/*end*/
		
		$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1";
		//$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1 and roleid=0";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0) 
		{
				$whereField[] = "user.`free_session` = 'y'";	
		}
		/*if($searchData['fltr_business'] == 'true'){
			$whereField[] = " `skill` like '%business%'";
		}
		if($searchData['fltr_medical'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' medical';
			$whereField[] = " `skill` like '%medical%'";
		}
		if($searchData['fltr_finance'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' finance';
			$whereField[] = " `skill` like '%finance%'";
		}
		if($searchData['fltr_software'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' software';
			$whereField[] = " `skill` like '%software%'";
		}*/
		
		if($searchData['keyword'] != ''){
			$keyword = explode(',',$searchData['keyword']);
			$keyword = explode(' ',trim($searchData['keyword']));
			$where = '';
			foreach($keyword as $k=>$v){
				if($v==''){
					continue;
				}
				$v = str_replace("'","",$v);
				$sqlSkill 			="SELECT * FROM profile WHERE `academic` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`academic` LIKE '%{$v}%' OR  ";}
				
				$sqlSkill 			="SELECT * FROM profile WHERE `professional` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`professional` LIKE '%{$v}%' OR  ";}
				
				$sqlSkill 			="SELECT * FROM profile WHERE `personal` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`personal` LIKE '%{$v}%' OR  ";}
				
				$sqlFirstname 		="SELECT * FROM profile WHERE `firstName` LIKE '%{$v}%'";
				$queryFirstname 	= $this->db->query($sqlFirstname);
				if ($queryFirstname->num_rows() > 0) { $where .= " `profile`.`firstName` LIKE '%{$v}%' OR  ";}
				
				$sqlLastname 		="SELECT * FROM profile WHERE `lastName` LIKE '%{$v}%'";
				$queryLastname 		= $this->db->query($sqlLastname);
				if ($queryLastname->num_rows() > 0) { $where .= " `profile`.`lastName` LIKE '%{$v}%' OR ";}

				$sqlUsername 		="SELECT * FROM user WHERE `username` = '{$v}'";
				$queryUsername 		= $this->db->query($sqlUsername);
				if ($queryUsername->num_rows() > 0) { $where .= " `user`.`username` = '{$v}' OR  ";}
				
				$sqlEmail 			="SELECT * FROM user WHERE `email` = '{$v}'";
				$queryEmail 		= $this->db->query($sqlEmail);
				if ($queryEmail->num_rows() > 0) { $where .= " `user`.`email` = '{$v}' OR  ";}


				$where .= " `profile`.`city` LIKE '{$v}' OR";
				//--R&D_DEC_23_2013
			}
			$where = substr($where,0,-3);
			$whereField[] = "({$where})";
		}
		/*
		if($searchData['keyword'] != ''){
			$keyword = explode(',',$searchData['keyword']);
			$keyword = explode(' ',trim($searchData['keyword']));
			$where = '';
			foreach($keyword as $k=>$v){
				if($v==''){
					continue;
				}
				//--R&D_DEC_23_2013
				$v = str_replace("'","",$v);

				$sqlSkill 			="SELECT * FROM profile WHERE `academic` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`academic` LIKE '%{$v}%' OR  ";}
				
				$sqlSkill 			="SELECT * FROM profile WHERE `professional` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`professional` LIKE '%{$v}%' OR  ";}
				
				$sqlSkill 			="SELECT * FROM profile WHERE `personal` LIKE '%{$v}%'";
				$querySkill 		= $this->db->query($sqlSkill);
				if ($querySkill->num_rows() > 0) { $where .= " `profile`.`personal` LIKE '%{$v}%' OR  ";}
				
				$sqlFirstname 		="SELECT * FROM profile WHERE `firstName` LIKE '{$v}%'";
				$queryFirstname 	= $this->db->query($sqlFirstname);
				if ($queryFirstname->num_rows() > 0) { $where .= " `profile`.`firstName` LIKE '{$v}%' OR  ";}
				
				$sqlLastname 		="SELECT * FROM profile WHERE `lastName` LIKE '%{$v}'";
				$queryLastname 		= $this->db->query($sqlLastname);
				if ($queryLastname->num_rows() > 0) { $where .= " `profile`.`lastName` LIKE '%{$v}' OR ";}

				$sqlUsername 		="SELECT * FROM user WHERE `username` = '{$v}'";
				$queryUsername 		= $this->db->query($sqlUsername);
				if ($queryUsername->num_rows() > 0) { $where .= " `user`.`username` = '{$v}' OR  ";}
				
				$sqlEmail 			="SELECT * FROM user WHERE `email` = '{$v}'";
				$queryEmail 		= $this->db->query($sqlEmail);
				if ($queryEmail->num_rows() > 0) { $where .= " `user`.`email` = '{$v}' OR  ";}


				$where .= " `profile`.`city` LIKE '%{$v}%' OR";
				//--R&D_DEC_23_2013
			}
			$where = substr($where,0,-3);
			$whereField[] = "({$where})";
		} */
		if($searchData['school'] != ''){
		
		//$sid=$searchData['sch'];
		//$whereField[] = "`firstName` LIKE '%{$searchData['school']}%' or `lastName` LIKE '%{$searchData['school']}%' And school_id > 0";
		$whereField[] = "`profile`.`school_id` = {$searchData['sch']}";
		}
		
		//print_r($searchData);die;
			
			
		if(isset($searchData['gender']) && $searchData['gender'] != 'all'){
		    
			$whereField[] = "`profile`.`gender` = {$searchData['gender']}";
			$gen[] = "`gender` = {$searchData['gender']}";
			 
		}
		if(isset($searchData['langInput1']) && ($searchData['langInput1'] != '' || $searchData['langInput2'])){
			// $whereField[] = "`nativeLanguage` LIKE %{$searchData['langInput1']}%";
			// $gen[] = "`nativeLanguage` LIKE %{$searchData['langInput1']}%";
			//$gen[] = "({$where})";
		}
		if(isset($searchData['langInput2']) && $searchData['langInput2'] != ''){
			// $whereField[] = "`otherLanguage` LIKE %{$searchData['langInput2']}%";
			// $gen[] = "`otherLanguage` LIKE %{$searchData['langInput2']}%";
			//$gen[] = "({$where})";
		}
		if($searchData['country'] != 0 && $searchData['country'] != '' && $searchData['country'] != 'null'){
			$whereField[] = "profile.`country` = {$searchData['country']}";
			$gen[] = "profile.`country` = {$searchData['country']}";
		}
		if($searchData['province'] != 0 && $searchData['province'] != '' && $searchData['province'] != 'null'){
			$whereField[] = "profile.`province` = {$searchData['province']}";
			$gen[] = "profile.`province` = {$searchData['province']}";
		}
		if($searchData['hRateStart'] != '' && $searchData['hRateEnd']){
			$config = $this->getConfig();
			$searchData['hRateStart'] = round($searchData['hRateStart'] / (1+$config['VEE_PRICE_PERCENT']['value']) *100) /100;
			$searchData['hRateEnd'] = round($searchData['hRateEnd'] / (1+$config['VEE_PRICE_PERCENT']['value']) *100) /100;
			$whereField[] = "profile.`hRate` <= {$searchData['hRateEnd']}";
		}
		if(strlen($searchData['freeSes'] )> 0 && $searchData['keyword'] ==''){
			$whereField[] = "profile.`free_session` = '{$searchData['freeSes']}'";
		}		
		// SKVIRJA filter for hidden accounts
		if($searchData['searchBy'] == 'email'){
			//$whereField[] = "user.`hiddenRole` = 1";
		}else{
			//$whereField[] = "user.`hiddenRole` = 0";
			$whereField[] = "1 = 1";
		}
		//$whereField[] = "user.`quarantine`!= 1";
		$whereField[] = "1 = 1";
		//skvirja filter for ready to talk now
		if($searchData['readytotalk'] == 'true'){
			//$whereField[] = "user.`readytotalk` = 1";
			$whereField[] = "1 = 1";
		}
		$whereField[] = "`profile`.`pic` != ''";
		// filter for LMS control
		//$whereField[] = "profile.`lms_complete` = 1";
		 // print_r( $searchData['keyword']);echo "ol";die();
		 
		if($whereField)
		{
			if($searchData['school'] != '' && $searchData['sch'] != '')
			{
				$sql ="SELECT profile.uid, profile.firstName, profile.lastName, profile.hRate AS hsrate, profile.school_id, profile.pic, profile.Lat, profile.Lng, countries.country, provices.provice, profile.city, pr.pic AS pimage,pr.s_disc,pr.tutor_markup as srate
				FROM profile
				LEFT JOIN profile pr ON profile.school_id = pr.uid
				LEFT JOIN user ON user.id = profile.uid
				LEFT JOIN countries ON profile.country = countries.id
				LEFT JOIN provices ON profile.province = provices.id
				WHERE profile.school_id ={$searchData['sch']}";
				
				if($whereField[1])
				{
					
					$sql .=" and {$whereField[1]}";
				
				}

				if($whereField[3])
				{
					$sql .=" and {$whereField[3]}";
				}
				
				if($whereField[9])
				{
					$sql .=" and {$whereField[9]}";
				}
				
				if($whereField[7])
				{
					$sql .=" and {$whereField[7]}";
				}
				
				if($whereField[4])
				{
					if($whereField[4]=="`gender` = 0" || $whereField[4]=="`gender` = 1")
					{   						
					$sql .=" and  profile.{$whereField[4]}";
					}
					else
					{
						$sql .=" and {$whereField[4]}";
					}
				}
				if($searchData['keyword'] != '')
				{
				  $sql .="  and profile.firstName like '%{$searchData['keyword']}%' || profile.lastName like '%{$searchData['keyword']}%' || profile.email like '%{$searchData['keyword']}%'"; 
				}
			}
			else
			{
				if($searchData['datetime'] != 'false')
				{
						//echo "here";die();
						$today = $searchData['today'];
						$fromTime = $searchData['fromTime'];
						$toTime = $searchData['toTime'];
						$startdtfrm = $today.' '.$fromTime;
						$enddtfrm = $today.' '.$toTime;
						$start = date('Y-m-d H:i:s',strtotime($startdtfrm));
						$end = date('Y-m-d H:i:s',strtotime($enddtfrm));
						$start = date('Y-m-d H:i:s',$this->inTime($start));
						$end = date('Y-m-d H:i:s',$this->inTime($end));
						$sql = "SELECT distinct timeSlot.uid,profile.*,user.* FROM timeSlot left join profile on profile.uid=timeSlot.uid  left join user on user.id=timeSlot.uid  WHERE  startTime>='{$start}' AND endTime <='{$end}' and ".implode(" AND ",$whereField);
						$query = $this->db->query($sql);
						if ($query->num_rows() > 0) {
							//$resultAvailable = $query->result_array();
							$resultTeacher=array();
							$resultTeacher = $query->result_array();
							//$resultTeacherTemp = $resultTeacher;
							//$resultTeacher = array();
							$nowTids = array();// set the result of teacher's id  
							for($i=0;$i<count($resultTeacher);$i++)
							{
								$resultTeacher[$i]['readytotalk']=$this->checkreadytalk($resultTeacher[$i]['uid']);
								$chkfreesession = $this->chkfreesession($resultTeacher[$i]['uid']);
								$resultTeacher[$i]['chkfreesession'] = $chkfreesession;
								$personalprofile = $this->checkpersonalprofile($resultTeacher[$i]['uid']);
								$resultTeacher[$i]['personal'] = $personalprofile;
							}
							 
						}else{
							$resultTeacher = array();
							$nowTids = array();
						}
						
						return $resultTeacher;
				}

				if($searchData['keyword'] != '')
				{
					$sql = "SELECT uid,firstName,lastName,hRate,school_id,pic,Lat,Lng,user.username,city FROM profile 
					  LEFT JOIN user ON user.id = profile.uid					  
					  where ".implode(" AND ",$whereField)."";

				
				}
				else 
				{
					if($whereField[5])
					{
						if($whereField[6])
						{
							$sql = "SELECT uid,firstName,lastName,hRate,school_id,pic,Lat,Lng,city FROM profile 
							LEFT JOIN user ON user.id = profile.uid 
							where (user.roleId = 1 or user.roleId = 2 or user.roleId = 3) AND ".implode(" AND ",$whereField) ." order by user.roleid desc" ; // ---- comment on 19092015

							//$sql = "SELECT uid,firstName,lastName,hRate,school_id,pic,Lat,Lng,city FROM profile LEFT JOIN user ON user.id = profile.uid order by user.roleid desc" ;
						}
						else
						{
							if($whereField[5]=="user.`readytotalk` = 1")
							{
								$sql = "SELECT uid,firstName,lastName,hRate,school_id,pic,Lat,Lng,city FROM profile 
								LEFT JOIN user ON user.id = profile.uid 								
								where (user.roleId = 1 or user.roleId = 2 or user.roleId = 3) AND ".implode(" AND ",$whereField) ." order by user.roleid desc" ;
							}
							else
							{  //added by haren new scope							
								$resultTeacher =  $this->getFetureTeacherLessonsearch($gen);
								$currenttime = date('Y-m-d h:i:s');
								$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1";
								//$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1 and roleid=0";
								$query = $this->db->query($q);
								if ($query->num_rows() > 0) 
								{
									foreach($resultTeacher as $k=>$v){
										if($resultTeacher[$v['uid']]['free_session'] == 'y'){
											$resultTeacher[$v['uid']]['hRate']='0.00';
											$resultTeacher[$v['uid']]['chkfreesession'] = 'Yes';
										}
									}
								}
								/*	if($resultTeacher[$v['uid']]['school_id'] > 0 &&  $resultTeacher[$v['uid']]['hRate'] >=1)
									{
									
									$sql="select tutor_markup from profile where uid={$resultTeacher[$v['uid']]['school_id']}";
									$query = $this->db->query($sql);
									$result = $query->result_array();
									$resultTeacher[$v['uid']]['tutor_markup']=($resultTeacher[$v['uid']]['hRate']+$result[0]['tutor_markup'])*(1+33/100);
									
									}		
								}*/
								 
								return $resultTeacher;
							}
						}
					}
					else
					{ 
					 
						$resultTeacher =  $this->getFetureTeacherLessonsearch($gen);
					
						/*foreach($resultTeacher as $k=>$v){
								if($resultTeacher[$v['uid']]['school_id'] > 0 &&  $resultTeacher[$v['uid']]['hRate'] >=1)
								{
								
								$sql="select tutor_markup from profile where uid={$resultTeacher[$v['uid']]['school_id']}";
								$query = $this->db->query($sql);
								$result = $query->result_array();
								$resultTeacher[$v['uid']]['tutor_markup']=($resultTeacher[$v['uid']]['hRate']+$result[0]['tutor_markup'])*(1+33/100);
								
								}		
							}*/
								/*foreach($resultTeacher as $k=>$v){
									$resultTeacher[$v['uid']]['tutor_markup']=$this->CheckMarkup($v['uid'],$v['school_id'],$v['tutor_markup']);
									}*/
								
								return $resultTeacher;
					}
						 
				}
			}	
		}
		else 
		{
			 $sql = "SELECT uid,firstName,lastName,hRate,pic,Lat,Lng,countries.country,provices.provice,city  LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id FROM profile ";
		
		}
		
		$query = $this->db->query($sql);
		
		//$resultTeachers = array();
		if ($query->num_rows() > 0) {
			$resultTeachers = $query->result_array();
		}
		
		//print_r($resultTeachers);die();
		
		$nowTids = array();// set the result of teacher's id 
		$resultTeacher = array();
		foreach($resultTeachers as $k=>$v){
			$resultTeacher[$v['uid']] = $v;
			$resultTeacher[$v['uid']]['roleId'] = $teachers['roleId'][$v['uid']];
			$resultTeacher[$v['uid']]['lesson_name'] = '';
			$resultTeacher[$v['uid']]['lesson_desc'] = '';
			
			$currenttime = date('Y-m-d h:i:s');
			$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1";
			//$q= "SELECT exp_session,is_eligible from user where  user.id='{$ssid}' AND user.exp_session >='{$currenttime}' AND is_eligible=1 AND roleid=0";
			$query = $this->db->query($q);
			if ($query->num_rows() > 0) 
			{
				$resultTeacher[$v['uid']]['hRate'] = '0.00';
				$resultTeacher[$v['uid']]['chkfreesession'] = 'Yes';
			}
			if($v['pic'] != ''){
				$imgUrl = base_url().'uploads/images/'.$v['pic'];
				if(@GetImageSize($imgUrl)){
					//image exists!
				}else{
					//set default image url
					$resultTeacher[$v['uid']]['pic'] = '';
				}
			}
			
			//$resultTeacher[$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
			$nowTids[] = $v['uid'];
			//skvirja checks for online users
			//$online = $this->checkOnline($v['uid']);
			$resultTeacher[$v['uid']]['online'] = $online;
			//checks for have session
			/*$hasSession = $this->hasSession($v['uid']);
			$resultTeacher[$v['uid']]['hasSession'] = $hasSession;*/
			/*$resultTeacher[$v['uid']]['readytotalk'] = $this->checkreadytalk($v['uid']);*/
			//$resultTeacher[$v['uid']]['tutor_markup'] = $this->chectutormarkup($v['school_id']);
			//$chkfreesession = $this->chkfreesession($v['uid']);
		   // $resultTeacher[$v['uid']]['chkfreesession'] = $chkfreesession;
			
/*			
			$personalprofile = $this->checkpersonalprofile($v['uid']);
			 $resultTeacher[$v['uid']]['personal'] = $personalprofile;*/
		}
		
	 // print_r($resultTeacher);die();
		
		if(!$resultTeacher){
			return array();
		}
		if($searchData['availableTobook'] != 'false'){
			$start = date('Y-m-d H:i:s');
			$sql = "SELECT uid FROM timeSlot WHERE  startTime<='{$start}' AND endTime >='{$start}' AND uid IN (".implode(',',$nowTids).")";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$resultAvailable = $query->result_array();
				$resultTeacherTemp = $resultTeacher;
				$resultTeacher = array();
				$nowTids = array();// set the result of teacher's id  
				foreach($resultAvailable as $k=>$v){
					$resultTeacher[$v['uid']] = $resultTeacherTemp[$v['uid']];
					$nowTids[] = $v['uid'];
				}
				unset($resultTeacherTemp);
			}
		}
		
		//skvirja filter for date availibility
		if($searchData['datetime'] != 'false'){
			$today = $searchData['today'];
			$fromTime = $searchData['fromTime'];
			$toTime = $searchData['toTime'];
			$startdtfrm = $today.' '.$fromTime;
			$enddtfrm = $today.' '.$toTime;
			$start = date('Y-m-d H:i:s',strtotime($startdtfrm));
			$end = date('Y-m-d H:i:s',strtotime($enddtfrm));
			$start = date('Y-m-d H:i:s',$this->inTime($start));
			$end = date('Y-m-d H:i:s',$this->inTime($end));
			$sql = "SELECT uid FROM timeSlot WHERE  startTime>='{$start}' AND endTime <='{$end}' AND uid IN (".implode(',',$nowTids).")";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$resultAvailable = $query->result_array();
				$resultTeacherTemp = $resultTeacher;
				$resultTeacher = array();
				$nowTids = array();// set the result of teacher's id  
				foreach($resultAvailable as $k=>$v){
					$resultTeacher[$v['uid']] = $resultTeacherTemp[$v['uid']];
					$nowTids[] = $v['uid'];
				}
				unset($resultTeacherTemp);
			}else{
				$resultTeacher = array();
				$nowTids = array();
			}
		}
		// remove users if his session is started - READY TO TALK NOW
		/*if($searchData['readytotalk'] == 'true'){
			$tutorsIds =  $this->getCurrentActiveClassTutors();
			$resultTeacherTemp = $resultTeacher;
			if(count($tutorsIds)>0){
				foreach($tutorsIds as $tid){
					unset($resultTeacher[$tid]);
				}
			}
			unset($resultTeacherTemp);
		}*/
		if(!$nowTids){
			return array();
		}
		
		$sql = "SELECT `uid`,`name`,`desc` FROM lessons WHERE uid IN (".implode(',',$nowTids).") and name!='' GROUP BY uid";
		$query = $this->db->query($sql);
		$resultLesson = array();
		/*if ($query->num_rows() > 0) {
			$resultLesson = $query->result_array();			
		}*/
		$resultTeacherTemp = $resultTeacher;
		$resultTeachers = $resultTeacher;
		$resultTeacher = array();			
		foreach($resultLesson as $k=>$v){
			$resultTeacherTemp[$v['uid']]['lesson_name'] = $v['name'];
			$resultTeacherTemp[$v['uid']]['lesson_desc'] = $v['desc'];
			$resultTeacher[] = $resultTeacherTemp[$v['uid']];
			$nowTids[] = $v['uid'];
			if(isset( $resultTeachers[ $v['uid'] ]) ){
				unset( $resultTeachers[ $v['uid'] ] );
			}
		}
		$resultTeacher = array_merge($resultTeacher,$resultTeachers);
		unset($resultTeacherTemp);
		$this->cache->save($cacheKey , $results, $this->cacheTime);
		if($searchData['school'] != '' && $searchData['sch'] != '')
		{
			 //echo "<pre>";print_r($resultTeacher);die();
			for($i=0;$i<count($resultTeacher);$i++)
			{
		
			  if($resultTeacher[$i]['hsrate'] >0)
			  {
			   $new = $resultTeacher[$i]['hsrate'];
			   $resultTeacher[$i]['hsrate']=$resultTeacher[$i]['hsrate']+($resultTeacher[$i]['hsrate']*33/100);
			   $resultTeacher[$i]['hsrate']=number_format((float)$resultTeacher[$i]['hsrate'], 2, '.', ''); 
			   $resultTeacher[$i]['srate']= ($new+$resultTeacher[$i]['srate'])*(1+33/100);
			   $resultTeacher[$i]['tutor_markup'][0]['tutor_markup']=$this->CheckMarkup($resultTeacher[$i]['uid'],$resultTeacher[$i]['school_id'],$resultTeacher[$i]['tutor_markup'][0]['tutor_markup']);
			   //echo $resultTeacher[$i]['tutor_markup'];
				//die();			   
				//$resultTeacher[$i]['srate']=$this->CheckMarkup($resultTeacher[$i]['uid'],$resultTeacher[$i]['school_id'],$resultTeacher[$i]['srate']);
			   //echo $resultTeacher[$i]['tutor_markup'];die();
			  }
			   else
			   {
				$resultTeacher[$i]['hsrate']=0.00;
				$resultTeacher[$i]['srate']=0.00;
				$resultTeacher[$i]['tutor_markup']=0;
			   }
			}
		}	
		/*for($i=0;$i<count($resultTeacher);$i++)
		{

			if($resultTeacher[$i]['school_id'] > 0 && $resultTeacher[$i]['hRate'] > 0)
			{
		
				$sql="select tutor_markup from profile where uid={$resultTeacher[$i]['school_id']}";
				$query = $this->db->query($sql);
				$result = $query->result_array();
				//print_r($result);
				$resultTeacher[$i]['tutor_markup']=($resultTeacher[$i]['hRate']+$result[0]['tutor_markup'])*(1+33/100);
				//echo $resultTeacher[$i]['hRate']."<br>"; 
				//echo $resultTeacher[$i]['tutor_markup'];
			}
		}*/
		/*foreach($resultTeacher as $k=>$v){
									if($resultTeacher[$v['uid']]['school_id'] > 0)
									{
									
									$sql="select tutor_markup from profile where uid={$resultTeacher[$v['uid']]['school_id']}";
									$query = $this->db->query($sql);
									$result = $query->result_array();
									$resultTeacher[$v['uid']]['tutor_markup']=($resultTeacher[$v['uid']]['hRate']+$result[0]['tutor_markup'])*(1+33/100);
									echo $resultTeacher[$v['uid']]['tutor_markup'];
									}		
								}
		die();*/
		      /*if($this->session->usedata['uid']=='')
			   {
				$resultTeacher =  $this->getFetureTeacherLessonsearch($gen);
				foreach($resultTeacher as $k=>$v)
					{
						if($resultTeacher[$v['uid']]['free_session'] == 'y')
						{
							$resultTeacher[$v['uid']]['hRate']='0.00';
							$resultTeacher[$v['uid']]['chkfreesession'] = 'Yes';
						}
					}	
					return $resultTeacher;
				}*/				
	 
		return $resultTeacher;
		
	}
	public function getTeachers(){
		//$sql = "SELECT * FROM user WHERE roleId=2 OR roleId=1 OR roleId=3 ";
		$sql = "SELECT * FROM user WHERE roleId=2";
		$query = $this->db->query($sql);
		$results = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $k=>$v){
				$results['id'][] = $v['id'];
				$results['roleId'][$v['id']] = $v['roleId'];
			}
		}
		return $results;
	}
	public function getOnlineTeacher(){
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		$teachers = $this->getTeachers();
		$sql = "select uid from ci_sessions where uid in (".implode(',',$teachers['id']).")";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $k=>$v){
				$results[] = $v['uid'];
			}
		}
		$this->cache->save('onlineTeacher', $results, $this->cacheTime);
		return $results;
	}
	public function CheckMarkup($tid,$sid,$markup)
	{
			//echo $markup;die();
		$stuid=$this->session->userdata['uid'];
		if($stuid > 0)
		{
		$sql="select refid from user where id={$stuid}";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			$result = $query->row_array();
		}
		$refid=$result['refid'];
		if($refid > 0)
		{
			$sql="select uid from profile where uid={$refid} and pbalance > 0";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) 
			{
				$result = $query->row_array();
			}
			$schid=$result['uid'];
			if($sid == $schid)
			{
				return $result='0';
			}	
			else
			{
				return $result=$markup;
			}
			  
		}
		else
		{
			return $result=$markup;
			
		}
		}
	}
	public function getOnlineUser(){
		if (  !$results = $this->cache->get('onlineUser') ) {
			$sql = "select uid from ci_sessions where uid!=''";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				foreach($result as $k=>$v){
					$results[] = $v['uid'];
				}
			}
			$this->cache->save('onlineUser', $results, $this->cacheTime);
			return $results;
		}
		else {
			return $results;
		}
	}
	public function getFetureTeachers(){
		//$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , provices.provice ,profile.city,user.roleId,profile.hRate,profile.school_id FROM profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id WHERE user.roleId = 2 AND user.`quarantine`!= 1 AND user.`hiddenRole` = 0  order by RAND()";
		$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , provices.provice ,profile.city,user.roleId,profile.hRate,profile.school_id FROM profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id LEFT JOIN newtutors ON newtutors.uid = profile.uid  WHERE (newtutors.uid = profile.uid OR user.roleId = 3 )   AND user.`hiddenRole` = 0  AND user.`quarantine` =0 order by RAND()";
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $k=>$v){
				$results['uid'][] = $v['uid'];
				$results['result'][$v['uid']] = $v;
				$results['result'][$v['uid']]['lesson_name'] = '';
				$results['result'][$v['uid']]['lesson_desc'] = '';
				$results['result'][$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
				$results['result'][$v['uid']]['online'] = $this->checkOnline($v['uid']);
				
				$suid=$this->session->userdata['uid'];
				if($suid=='')
				{
				$results['result'][$v['uid']]['chkfreesession']= $this->chkfreesessionhome_search($v['uid']);
			    }
				
			}
		}
		$this->cache->save('fetureTeachers', $results, 300);
		return $results;
	}
	// free session feature teachers start
	public function getFreeFetureTeachers(){
		//$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , provices.provice ,profile.city,user.roleId,profile.hRate,profile.school_id FROM profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id WHERE profile.free_session = 'y' AND user.roleId = 2 AND user.`quarantine`!= 1 AND user.`hiddenRole` = 0 order by RAND()";
		$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , provices.provice ,profile.city,profile.school_id,user.roleId,profile.hRate FROM profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id  LEFT JOIN newtutors ON newtutors.uid = profile.uid WHERE (newtutors.uid = profile.uid OR user.roleId = 3 ) AND profile.free_session = 'y' AND user.roleId = 2 AND user.`hiddenRole` = 0 order by RAND()";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $k=>$v){
				$results['uid'][] = $v['uid'];
				$results['result'][$v['uid']] = $v;
				$results['result'][$v['uid']]['lesson_name'] = '';
				$results['result'][$v['uid']]['lesson_desc'] = '';
				$results['result'][$v['uid']]['hRate'] = '0.00';
				$results['result'][$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
			
			
			}
		}
		$this->cache->save('freeFetureTeachers', $results, $this->cacheTime);
		return $results;
	}
	public function getAvgRating($id) {
		if (  !$results = $this->cache->get('getAvgRating'.$id) ) {
			$sql = "select * from feedback where callerId={$id} AND status = 1";
			$query = $this->db->query($sql);
			$result = array();
			if ($query->num_rows() > 0){
	            $result = $query->result_array();
	        }
			$rateTotal = 0;
			foreach($result as $k=>$v){
				$rateTotal += $v['onTime'] + $v['clearReception'];
			}
			$total = count($result);
			if($total == 0){
				$avgRate =  0;
			}else{
				$avgRate =  round($rateTotal/($total*2)) ;
			}
			$this->cache->save('getAvgRating'.$id, $avgRate, $this->cacheTime);
			return $avgRate;
	    }else {
			return $results;
		}
	}
	public function getFetureTeacherLessons(){
		$teachers = $this->getFetureTeachers();
		if(!$teachers['uid']){
			return array();
		
		}
		//print_r($teachers);die();
		$sql = "SELECT `uid`,`name`,`desc` FROM lessons WHERE uid IN (".implode(',',$teachers['uid']).")  ";
		$query = $this->db->query($sql);
		$resultLesson = array();
		/*if ($query->num_rows() > 0) {
			$resultLesson = $query->result_array();				
		}*/
		$resultTeacherTemp = $teachers['result'];
		$resultTeacher  = $teachers['result'];			
		foreach($resultLesson as $k=>$v){
			$resultTeacherTemp[$v['uid']]['lesson_name'] = $v['name'];
			$resultTeacherTemp[$v['uid']]['lesson_desc'] = $v['desc'];
			if(isset( $resultTeacher[ $v['uid'] ]) ){
				unset( $resultTeacher[ $v['uid'] ] );
			}
			//skvirja checks for online users
			$online = $this->checkOnline($v['uid']);
			$resultTeacherTemp[$v['uid']]['online'] = $online;
			
			$personalprofile = $this->checkpersonalprofile($v['uid']);
			$resultTeacherTemp[$v['uid']]['personal'] = $personalprofile;
			
			
			
			$resultTeacher[] = $resultTeacherTemp[$v['uid']];
		}
		//checks for have session
		if(count($resultTeacher)>0){
			foreach($resultTeacher as $rt)
			{
				/*$hasSession = $this->hasSession($rt['uid']);
				$resultTeacher[$rt['uid']]['hasSession'] = $hasSession;*/
				$resultTeacher[$rt['uid']]['readytotalk'] = $this->checkreadytalk($rt['uid']);
				
				
				   
			    
			   $resultTeacher[$rt['uid']]['personal'] = $this->checkpersonalprofile($rt['uid']);
				
			}
		}
		$results = $resultTeacher;
		unset($resultTeacherTemp);
		$this->cache->save('fetureTeacherLessons', $results, $this->cacheTime);
		return $results;
	}
	public function getFreeFetureTeacherLessons(){
		$teachers = $this->getFreeFetureTeachers();
		if(!$teachers['uid']){
			return array();
		}
		$sql = "SELECT `uid`,`name`,`desc` FROM lessons WHERE uid IN (".implode(',',$teachers['uid']).")";
		$query = $this->db->query($sql);
		$resultLesson = array();
		/*if ($query->num_rows() > 0) {
			$resultLesson = $query->result_array();				
		}*/
		$resultTeacherTemp = $teachers['result'];
		$resultTeacher  = $teachers['result'];			
		foreach($resultLesson as $k=>$v){
			$resultTeacherTemp[$v['uid']]['lesson_name'] = $v['name'];
			$resultTeacherTemp[$v['uid']]['lesson_desc'] = $v['desc'];
			if(isset( $resultTeacher[ $v['uid'] ]) ){
				unset( $resultTeacher[ $v['uid'] ] );
			}
			//skvirja checks for online users
			$online = $this->checkOnline($v['uid']);
			$resultTeacherTemp[$v['uid']]['online'] = $online;
			$resultTeacher[] = $resultTeacherTemp[$v['uid']];
		}
		//checks for have session
		if(count($resultTeacher)>0){
			foreach($resultTeacher as $rt)
			{
				/*$hasSession = $this->hasSession($rt['uid']);
				$resultTeacher[$rt['uid']]['hasSession'] = $hasSession;*/
				/////
				  $chkfreesession = $this->chkfreesession($rt['uid']);
				   $resultTeacher[$rt['uid']]['chkfreesession'] = 'Yes';
				   
				   ///
				  $resultTeacher[$rt['uid']]['readytotalk'] = $this->checkreadytalk($rt['uid']);
				  //echo $resultTeacher[$rt['uid']]['readytotalk'];
				  //die();
				  
				  $personalprofile = $this->checkpersonalprofile($rt['uid']);
				  $resultTeacher[$rt['uid']]['personal'] = $personalprofile;
			}
		}
		$results = $resultTeacher;
		unset($resultTeacherTemp);
		$this->cache->save('freeFetureTeacherLessons', $results, $this->cacheTime);
		//print_r($results);
		//die();
		return $results;
	}
	/**
	 * get user profile info
	 * @param $uid
	 */
	public function getProfile($uid){
		$result = array();
		$sql = "select * from profile where uid=? limit 1";
        $query = $this->db->query($sql,array($uid));
        if ($query->num_rows() > 0){
            $result = $query->row_array();
        }
        return $result;
	}
	public function getAllProfile(){
		$result = array();
		$sql = "select Lat,Lng from profile";
        $query = $this->db->query($sql);
		$result = $query->row_array();
        return $result;
	}
	public function getVideoResult1($searchData){
		//$select = "SELECT p.firstName,p.lastName,u.quarantine,p.pic,l.source,l.desc,l.price,l.uid FROM  lessons as l ,user as u, profile as p WHERE 1=1 AND ";
		$select = "SELECT p.firstName,p.lastName,u.quarantine,p.pic,l.source,l.desc,l.price,l.uid FROM  lessons as l left join profile as p on l.uid=p.uid left join user as u on u.id=p.uid WHERE 1=1 AND ";
		$wherefields = '';
		if($this->session->userdata['uid'])
		{
			$logUid = $this->session->userdata['uid'];
			$wherefields .= " l.uid != ".$logUid." AND ";
		}
		// filter language
		if($searchData['langInput1'] != '' || $searchData['langInput2'] != ''){
			if($searchData['langInput1'] != ''){
				$lsearch = $searchData['langInput1'];
			}
			if($searchData['langInput2'] != ''){
				if($searchData['langInput2'] != 'English' AND $searchData['langInput2'] != '0'){
					$lsearch1 = $searchData['langInput2'];
				}
			}
			$wherefields .= " (p.`nativeLanguage` LIKE '%{$lsearch}%' AND p.`otherLanguage` LIKE '%{$lsearch1}%' OR p.`nativeLanguage` LIKE '%{$lsearch1}%' AND p.`otherLanguage` LIKE '%{$lsearch}%') AND";
		}
		// filter keyword search
		if($searchData['fltr_business'] == 'true'){
			$wherefields .= " (`l`.`name` like '%business%' OR `l`.`desc` like '%business%') AND ";
		}
		if($searchData['fltr_medical'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' medical';
			$wherefields .= " (`l`.`name` like '%medical%' OR `l`.`desc` like '%medical%') AND ";
		}
		if($searchData['fltr_finance'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' finance';
			$wherefields .= " (`l`.`name` like '%finance%' OR `l`.`desc` like '%finance%') AND ";
		}
		if($searchData['fltr_software'] == 'true'){
			$searchData['keyword'] = $searchData['keyword'].' software';
			$wherefields .= " (`l`.`name` like '%software%' OR `l`.`desc` like '%software%') AND ";
		}
		if($searchData['keyword'] != ''){
			$keyword = explode(',',$searchData['keyword']);
			$keyword = explode(' ',trim($searchData['keyword']));
			$where = '';
			foreach($keyword as $k=>$v){
				if($v==''){
					continue;
				}
				$where .= " `l`.`name` LIKE '%{$v}%' OR `l`.`desc` like '%{$v}%' OR ";
			}
			$where = substr($where,0,-3);
			$wherefields .= " ({$where}) AND ";
		}
		//filter maximum cost usd
		
		if($searchData['hRateStart'] != ''){
			$config = $this->getConfig();
			$searchData['hRateStart'] = round($searchData['hRateStart'] / (1+$config['VEE_PRICE_PERCENT']['value']) *100) /100;
			$searchData['hRateEnd'] = round($searchData['hRateEnd'] / (1+$config['VEE_PRICE_PERCENT']['value']) *100) /100;
			$wherefields .= "`l`.`price` >= {$searchData['hRateStart']} and `l`.`price` <= {$searchData['hRateEnd']} AND ";
		}
		// filter author
		if($searchData['author'] != ''){
			if($searchData['author'] != 'Enter Author'){
				$author = $searchData['author'];
				$wherefields .= " (`p`.`firstName` like '%{$author}%' OR `p`.`lastName` like '%{$author}%') AND ";
			}
		}
		$wherefields .= " p.uid = l.uid AND l.status = '1' AND l.`visibility` = '1' and u.quarantine != 1 ";
		$sqlFinal =  $select.$wherefields;
		//echo $sqlFinal;
		$query = $this->db->query($sqlFinal);
		 
		$resultLessons = array();
		if ($query->num_rows() > 0) {
			$resultLessons = $query->result_array();
			//echo $this->db->last_query();die;
			$count = count($resultLessons);
					
			for($i = 0;$i<=$count;$i++)
			{
				$uid = $resultLessons[$i]['uid'];
				if($uid){
					$checkPremimumT = $this->checkPremiumTutorlessons($uid);
					if($checkPremimumT == 0){
						unset($resultLessons[$i]);
					}
				}
			}
		}
		 

		return $resultLessons;
	}
	public function getVideoLessonsUids(){
		$sql = "SELECT DISTINCT `uid` FROM lessons WHERE name!='' ";
		$query = $this->db->query($sql);
		$resultLesson = array();
		if ($query->num_rows() > 0) {
			$resultLesson = $query->result_array();	
			$vuids['id'] = array();
			foreach($resultLesson as $less)
			{
				$vuids['id'][] = $less['uid'];
			}
		}
		return $vuids;
	}
	/**
	* @author SKVIRJA
	* @package check for user is online or not 
	* @date 20 Sep 2013
	**/
	public function checkOnline($uid){
		$sql = "select DISTINCT uid from ci_sessions where uid = {$uid}";
		$query = $this->db->query($sql);
		$found = 0;
		if ($query->num_rows() > 0) {
			$found = 1;
		}
		return $found;
	}
	/**
	* @author SKVIRJA
	* @package delete opened class and update status 
	* @date 23 Sep 2013
	**/
	public function removeNow($uid){
		$sql = "update user set readytotalk = 0 where id = {$uid}";
		$query = $this->db->query($sql);
		//delete user sessions
		$sql = "DELETE FROM ci_sessions where uid = {$uid}";
		$query = $this->db->query($sql);
		/*$sql = "DELETE FROM class where tid = {$uid} AND type = 'now' AND startTime = '0000-00-00 00:00:00' AND endTime = '0000-00-00 00:00:00' ";
		$query = $this->db->query($sql);*/
	}
	public function getCurrentActiveClassTutors(){
		$start = date('Y-m-d H:i:s',time());
		$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		$sql = "select * from class where (startTime BETWEEN '{$start}' AND '{$end}' OR endTime BETWEEN '{$start}' AND '{$end}') AND type = 'now' ";
		$query = $this->db->query($sql);
		$tids = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $rs){
				if($rs['action'] == ''){
					$tids[] = $rs['tid'];
				}else{
					$actionClass = unserialize($rs['action']);
					if(@$actionClass['tutorConnected'] == 0){
						if(@$actionClass['studentConnected'] == 1){
							$tids[] = $rs['tid'];
						}else{
							continue;
						}
					}else{
						$tids[] = $rs['tid'];
					}
				}
			}
		}
		return $tids;
	}
	//skvirja checks for premium tutors video lessons
	public function checkPremiumTutorlessons($uid){
		$sql = "select roleId from user where id = {$uid}";
		$query = $this->db->query($sql);
		$return = 0;
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$roleId = $result['roleId'];
			if($roleId == 1 || $roleId == 2 || $roleId == 3){
				$return = 1;
			}			
		}
		return $return;
	}
	//skvirja checks for tutor has opened session
	public function hasSession($uid){
		$return = 'No';
		$now = date('Y-m-d H:i:s',time());
		$start = date('Y-m-d H:i:s',$this->inTime($now));
		$sstart = date("Y-m-d H:i:s", strtotime("$start + 1 day"));

		// get all opened timeslot greater then current time 
		$sql = "SELECT * from timeSlot WHERE uid = {$uid} AND startTime>='{$sstart}' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			if(count($result)>0){
				//checks for booked class and escape this one.
				foreach($result as $timeslot)
				{
					$t_startTime = $timeslot['startTime'];
					$t_endTime = $timeslot['endTime'];
					$t_uid = $timeslot['uid'];
					$sql1 = "SELECT COUNT(*) as num from class where startTime = '{$t_startTime}' AND endTime = '{$t_endTime}' AND tid = {$t_uid}";
					$query1 = $this->db->query($sql1);
					if ($query1->num_rows() > 0) {
						$result1 = $query1->row_array();
						$num = $result1['num'];
						if($num<=0){
							$return = 'Yes';		
						}
					}else{
						$return = 'Yes';
					}
				}
			}
		}
		return $return;
	}
	
	// function added by haren
	public function getAllData()
	{
		$teachers = $this->GetTutorData();
		if(!$teachers['uid'])
		{
			return array();
		}
		$sql = "SELECT `uid`,`name`,`desc` FROM lessons WHERE uid IN (".implode(',',$teachers['uid']).")";
		$query = $this->db->query($sql);
		$resultLesson = array();
		if ($query->num_rows() > 0) 
		{
			$resultLesson = $query->result_array();				
		}
		$resultTeacherTemp = $teachers['result'];
		$resultTeacher  = $teachers['result'];			
		foreach($resultLesson as $k=>$v)
		{
			$resultTeacherTemp[$v['uid']]['lesson_name'] = $v['name'];
			$resultTeacherTemp[$v['uid']]['lesson_desc'] = $v['desc'];
			if(isset( $resultTeacher[ $v['uid'] ]) ){
				unset( $resultTeacher[ $v['uid'] ] );
			}
			
			$online = $this->checkOnline($v['uid']);
			$resultTeacherTemp[$v['uid']]['online'] = $online;
			$resultTeacher[] = $resultTeacherTemp[$v['uid']];
		}
		
		if(count($resultTeacher)>0)
		{
			foreach($resultTeacher as $rt)
			{
				/*$hasSession = $this->hasSession($rt['uid']);
				$resultTeacher[$rt['uid']]['hasSession'] = $hasSession;*/
			}
		}
		$results = $resultTeacher;
		unset($resultTeacherTemp);
		$this->cache->save('freeFetureTeacherLessons', $results, $this->cacheTime);
		
		return $results;
	}
	public function GetTutorData(){
		 $sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , provices.provice ,profile.city,user.roleId,profile.hRate FROM profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id WHERE user.roleId >= 1 AND user.roleId < 4 AND user.`hiddenRole` = 0 order by RAND()";
		 $query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			foreach($result as $k=>$v){
				$results['uid'][] = $v['uid'];
				$results['result'][$v['uid']] = $v;
				$results['result'][$v['uid']]['lesson_name'] = '';
				$results['result'][$v['uid']]['lesson_desc'] = '';
				$results['result'][$v['uid']]['hRate'] = '0.00';
				$results['result'][$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
			}
		}
		$this->cache->save('freeFetureTeachers', $results, $this->cacheTime);
		return $results;
	}
	
	public function getFetureTeacherLessonsearch($whereField){
	
	  
	
	$count =  count($whereField);
	
	 $home_search = $this->session->userdata('uid');
    
  	 if($count!=0)
	 {  
	 //echo "here";die();
	 
		 $teachers = $this->getFetureTeachersearchwh($whereField);
		/* print_r($teachers);
		 die();*/
	 }
	 else
		{  
		//echo "here11"; die();
		$teachers = $this->getFetureTeachersearch();
	   }
	  //print_r($teachers);
	  //echo "oo";
	  //die();
		if(!$teachers['uid']){
			return array();
		
		}
		//echo "<pre>"; print_r($teachers);die();
		$sql = "SELECT  `uid`,`name`,`desc` FROM lessons WHERE uid IN (".implode(',',$teachers['uid']).")  ";
		$query = $this->db->query($sql);
		$resultLesson = array();
		/*if ($query->num_rows() > 0) {
			$resultLesson = $query->result_array();				
		}*/
		// echo "<pre>";print_r($resultLesson);die();
		$resultTeacherTemp = $teachers['result'];
		$resultTeacher  = $teachers['result'];
		foreach($resultLesson as $k=>$v){
			$resultTeacherTemp[$v['uid']]['lesson_name'] = $v['name'];
			$resultTeacherTemp[$v['uid']]['lesson_desc'] = $v['desc'];
			if(isset( $resultTeacher[ $v['uid'] ]) ){
				// unset( $resultTeacher[ $v['uid'] ] );
			}
			//skvirja checks for online users
			$online = $this->checkOnline($v['uid']);
			$resultTeacherTemp[$v['uid']]['online'] = $online;
			$resultTeacher[] = $resultTeacherTemp[$v['uid']];
			
			

			
		}
		
			  // print_r($teachers['result']);
			    //echo $home_search."oo";
	 // die();
		
		//checks for have session
		 if(count($resultTeacher)>0){
			 foreach($resultTeacher as $rt)
			 {
			 
				/*$hasSession = $this->hasSession($rt['uid']);
				 $resultTeacher[$rt['uid']]['hasSession'] = $hasSession;*/
				 if( $home_search!='')
				 {
				 // $chkfreesession = $this->chkfreesession($rt['uid']);
				 // $resultTeacher[$rt['uid']]['chkfreesession'] = $chkfreesession;
				  }
				  
				 if( $home_search=='')
				 {
				  $chkfreesessionhome_search = $this->chkfreesessionhome_search($rt['uid']);
				  $resultTeacher[$rt['uid']]['chkfreesession'] = $chkfreesessionhome_search;
				 }
				  
				  
				   $checkreadytalk = $this->checkreadytalk($rt['uid']);				   
				  $resultTeacher[$rt['uid']]['readytotalk'] = $checkreadytalk;
				  
				  $personalprofile = $this->checkpersonalprofile($rt['uid']);
				  $resultTeacher[$rt['uid']]['personal'] = $personalprofile;
			 }
		 }
		$results = $resultTeacher;
			   // echo count($results);
			  // print_r($results);die();
		unset($resultTeacherTemp);
		$this->cache->save('fetureTeacherLessons', $results, $this->cacheTime);
		return $results;
	}
	public function getFetureTeachersearchwh($whereField){
	
    $home_search = $this->session->userdata('uid');	
	
 	$currenttime = date('Y-m-d h:i:s');
	/*$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , 
profile.city,user.roleId,profile.hRate,profile.free_session,profile.tutor_markup,profile.school_id,readytotalk,nativeLanguage,'id2' OrderKey FROM  profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN 
countries ON profile.country = countries.id
where (roleId = 3 or  roleId = 2 or  roleId =1)  AND user.`hiddenRole` = 0 AND `profile`.`pic` != '' and user.`quarantine`!='1' and ".implode(" AND ",$whereField) ." ORDER BY nativeLanguage ASC, readytotalk DESC, roleId DESC"; // roleid desc*/


	$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,
profile.city,user.roleId,profile.hRate,profile.free_session,profile.tutor_markup,profile.school_id,readytotalk,nativeLanguage,'id2' OrderKey FROM  profile LEFT JOIN user ON user.id = profile.uid 
where (roleId = 3 or  roleId = 2 or  roleId =1)  AND user.`hiddenRole` = 0 AND `profile`.`pic` != '' and user.`quarantine`!='1' and ".implode(" AND ",$whereField) ." ORDER BY nativeLanguage ASC, readytotalk DESC, roleId DESC"; // roleid desc

		$query = $this->db->query($sql);
		//echo $this->db->last_query();die();
		/*echo $query->num_rows();
		exit;*/
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			
		/* echo count($result);
		 echo $this->db->last_query();
		 die();*/
			//print_r($result);
			
			foreach($result as $k=>$v){
			//echo $v['uid'] ;die;
				$results['uid'][] = $v['uid'];
				$results['result'][$v['uid']] = $v;
				$results['result'][$v['uid']]['lesson_name'] = '';
				$results['result'][$v['uid']]['lesson_desc'] = '';
				/*$results['result'][$v['uid']]['online'] = $this->checkOnline($v['uid']);
				$results['result'][$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
				$results['results'][$v['uid']]['readytotalk'] = $this->checkreadytalk($v['uid']);*/
				 
			   
				if($home_search!='')
				{
				/*$chkfreesession = $this->chkfreesession($v['uid']);
		        $results[$v['uid']]['chkfreesession'] = $chkfreesession;*/
				}
				 /*
				$personalprofile = $this->checkpersonalprofile($v['uid']);
				$results[$v['uid']]['personal'] = $personalprofile;*/
			  // $results['results']['chkfreesession'] = $chkfreesession;
			}
		
		}
		
			// print_r($results);die();
		
		$this->cache->save('fetureTeachers', $results, 300);
		return $results;
	}
	
	//////
	
	public function getFetureTeachersearch(){$currenttime = date('Y-m-d h:i:s');
	$sql = "select profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,
	profile.city,user.roleId,profile.hRate ,profile.tutor_markup,profile.school_id,readytotalk,
	nativeLanguage,'id2' OrderKey FROM  profile 
	LEFT JOIN user ON user.id = profile.uid 	
where (roleid = 3 or  roleid = 2 or  roleid =1) AND user.`hiddenRole` = 0 AND `profile`.`pic` != '' and user.`quarantine`!= '1' ORDER BY nativeLanguage, readytotalk, roleId desc";/*OrderKey, roleid desc";*/

	/*$sql = "select profile.personal,profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , 
provices.provice ,profile.city,user.roleId,profile.hRate ,profile.tutor_markup,profile.school_id ,'id1' OrderKey FROM timeSlot, profile LEFT JOIN user ON user.id = profile.uid and (`user`.roleId = 3 or  `user`.roleId = 2 or  `user`.roleId =1) LEFT JOIN 
countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id 
where   user.id = timeSlot.uid  and user.`quarantine`!= 1  and  timeSlot.`stid` = 0 and timeSlot.startTime >='{$currenttime}'  
UNION ALL
select profile.personal,profile.uid,profile.pic,profile.firstName,profile.lastName,profile.Lat,profile.Lng,countries.country , 
provices.provice ,profile.city,user.roleId,profile.hRate ,profile.tutor_markup,profile.school_id,'id2' OrderKey FROM  profile LEFT JOIN user ON user.id = profile.uid LEFT JOIN 
countries ON profile.country = countries.id LEFT JOIN provices ON profile.province = provices.id 
where user.`id` NOT IN (select  uid from timeSlot) and user.`quarantine`!= 1 and  (roleid = 3 or  roleid = 2 or  roleid =1)  
ORDER BY nativeLanguage, readytotalk, roleId desc"; // ORDER BY OrderKey, roleid desc";*/
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			
		
			
			foreach($result as $k=>$v){
				$results['uid'][] = $v['uid'];
				$results['result'][$v['uid']] = $v;
				$results['result'][$v['uid']]['lesson_name'] = '';
				$results['result'][$v['uid']]['lesson_desc'] = '';
				$results['result'][$v['uid']]['online'] = $this->checkOnline($v['uid']);
				$results['result'][$v['uid']]['avgRate'] = $this->getAvgRating($v['uid']);
				$results['result'][$v['uid']]['readytotalk'] = $this->checkreadytalk($v['uid']);
				
				//$personalprofile = $this->checkpersonalprofile($v['uid']);
				$results['result'][$v['uid']]['personal'] = $this->checkpersonalprofile($v['uid']);
			}
		
		}
		
			//print_r($results);die();
		
		$this->cache->save('fetureTeachers', $results, 300);
		return $results;
	}
	
	/////
	public function chkfreesession($uid)
	{
		$currenttime = date('Y-m-d h:i:s');
		
		 $sid = $this->session->userdata('uid'); 
		 
		 $sql="select free_session from user where id='{$uid}'";
		 $checkAllow = $this->db->query($sql);				
		 $res = $checkAllow->row_array();
		 
		 if($res['free_session'] == 'n')
		 {
				return $return = 'NO';
		 }	 
		 
		 if($sid=='')
		{ 
			 
			$q= "SELECT exp_session,is_eligible from user where  user.id='{$uid}'";
			//$q= "SELECT exp_session,is_eligible from user where  user.id='{$uid}' AND roleid=0";
			$classquery = $this->db->query($q);				
			$classresult = $classquery->row_array();
			$cdate=date('Y-m-d');
			if($classresult['exp_session'] > $cdate && $classresult['is_eligible']==1)
			{
				$return ='Yes';
			}
			else{
				$return = 'NO';
			}
			 	return $return;		
		 } 
		 
		$q= "SELECT exp_session,is_eligible from user where  user.id='{$sid}'";
		//$q= "SELECT exp_session,is_eligible from user where  user.id='{$sid}' AND roleid=0";
		$classquery = $this->db->query($q);
		$classresult = $classquery->row_array();
		$cdate=date('Y-m-d');
		if($classresult['exp_session'] > $cdate && $classresult['is_eligible']==1)
		{
		  $return ='Yes';
		}
		else{
			 $return = 'NO';
		} 
		 return $return;
 	}
	
	public function checkreadytalk($uid)
	{
	
	//$sid = $this->session->userdata('uid');
	//echo $uid;die();
	$sql = "SELECT readytotalk from user  WHERE  id = {$uid}   "  ;
		$query = $this->db->query($sql);
		
			$result = $query->result_array();
			//print_r($result);
			///die();
			return $result; 
			
	}
	
	public function chectutormarkup($sid)
	{
	$sql = "SELECT tutor_markup from profile  WHERE  uid = {$sid}   "  ;
		$query = $this->db->query($sql);
		
			$result = $query->result_array();
			//print_r($result);die();
			return $result; 
	}
	public function checkpersonalprofile($uid)
	{
		$sql = "SELECT professional as personal from profile  WHERE  uid = {$uid}";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$result[0]['personal']=substr($result[0]['personal'], 0, 85);
		if(strlen($result[0]['personal'])>=85)
		{
			$result[0]['personal']=$result[0]['personal']."...";
		}
		return $result; 			
	}

	public function chkfreesessionhome_search($uid)
	{
	  
		//$currenttime = date('Y-m-d h:i:s');
	
	//$sid = $this->session->userdata('uid');
	//if($sid=='')
	//{
		//return $return = 'NO';		
	//}
	//$sql = "SELECT profile.free_session from profile,user  WHERE profile.uid = {$sid} AND user.id = {$sid} AND user.exp_session >='{$currenttime}' "  ;
		//$query = $this->db->query($sql);
		
			//$result = $query->result_array();
			  //print_r($result);die();
			  //echo $result[0]['free_session'];die();
			//if($result[0]['free_session']=='y'){
			
				$sql1 = "SELECT free_session from profile where uid = {$uid} ";
					$query1 = $this->db->query($sql1);
					$result1 = $query1->result_array();
						// print_r($result1['free_session']);die();
						// echo $result1[0]['free_session'];die();
			     if($result1[0]['free_session']=='y')
				 {
				 $return = 'Yes';	
				 }
				 else
				 {
				 $return = 'No';
				 }
					
					return $return;	 
	//	}		
		return $return = 'NO';		
	 	}
}
/* End of file search_model.php */
/* Location: ./application/model/search_model.php */