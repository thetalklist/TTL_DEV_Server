<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends TL_Model{

	public function __construct(){
		parent::__construct();
	}
	public function getAll($uid,$page = 1,$perPage = 10) {
		$start = intval($page - 1) * $perPage;
		$sql = 'SELECT * from lessons where uid={$uid} limit {$start},{$perPage}';
		$query = $this->db->query($sql);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	public function creatTimeSlot($start,$end,$uid){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		$sqlSearch = "select * from timeSlot where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and uid={$uid}";
		$query = $this->db->query($sqlSearch);
		if ($query->num_rows() > 0) {
			return false;
		}
		$sqlSearch = "select * from class where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and (tid={$uid} or sid={$uid})";
		$query = $this->db->query($sqlSearch);
		if ($query->num_rows() > 0) {
			return false;
		}
		$creatAt = date('Y-m-d H:i:s');
		$sql = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`) values ({$uid},'{$start}','{$end}','{$creatAt}')";
		$query = $this->db->query($sql);
		return $query ;
	}
	public function creatTimeSlotRecurring($start,$end,$uid,$creatAt){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		$end = date('Y-m-d H:i:s',$this->inTime($end));
                //echo "<br/>".$start." : ".$end;
		$sqlSearch = "select * from timeSlot where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and uid={$uid}";
		$query = $this->db->query($sqlSearch);
		if ($query->num_rows() > 0) {
			return false;
		}
		$sqlSearch = "select * from class where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and (tid={$uid} or sid={$uid})";
		$query = $this->db->query($sqlSearch);
		if ($query->num_rows() > 0) {
			return false;
		}
		$creatAt = date('Y-m-d H:i:s');
		$sql = "insert into timeSlot (`uid`,`startTime`,`endTime`,`type`,`creatAt`) values ({$uid},'{$start}','{$end}','recuring','{$creatAt}')";
		$query = $this->db->query($sql);
		return $query ;
	}
	public function checkTimeSlotRecurring($start,$end,$uid){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		$end = date('Y-m-d H:i:s',$this->inTime($end));
		$found = 0; 
		$sqlSearch = "select * from timeSlot where `startTime` ='{$start}' and `endTime` = '{$end}' and uid={$uid}";
		$query = $this->db->query($sqlSearch);
		if ($query->num_rows() > 0) {
			$found = 1;
		}
		return $found;
	}
	public function delTimeSlot($id,$uid){
		$sql = "DELETE FROM timeSlot WHERE id={$id} AND uid={$uid}";
		return $this->db->query($sql);
	}
	public function creatClass($_start,$end,$uid,$tid,$fee,$rate){
		$sTopic = $_POST['sTopic'];
		$sLevel = $_POST['sLevel'];
		$start = date('Y-m-d H:i:s',$this->inTime($_start));
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		$sqlSearch = "select * from timeSlot where `startTime` <='{$start}' and endTime >= '{$end}' and uid={$tid}";
                $query = $this->db->query($sqlSearch);
                if ($query->num_rows() == 0) {
			return false;
		}else {
			$timeSlot = $query->row_array();
			$creatAt = date('Y-m-d H:i:s');
			$sql = "insert into class (`sid`,`startTime`,`endTime`,`createAt`,`tid`,`fee` ,`sTopic`  , `sLevel`) values ({$uid},'{$start}','{$end}','{$creatAt}',{$tid},{$fee},{$rate},'{$sTopic}','{$sLevel}')";
			$query = $this->db->query($sql);
			$spiltSql1 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`) values ({$timeSlot['uid']},'{$timeSlot['startTime']}','{$start}','{$creatAt}')";
			$spiltSql2 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`) values ({$timeSlot['uid']},'{$end}','{$timeSlot['endTime']}','{$creatAt}')";
			$deleteSql = "delete from timeSlot where id = {$timeSlot['id']}";
			if( strtotime($start) - strtotime($timeSlot['startTime']) > 3600){
                        	$query = $this->db->query($spiltSql1);
			}
			if( strtotime($timeSlot['endTime']) - strtotime($end) > 3600){
                        	$query = $this->db->query($spiltSql2);
			}
                        $query = $this->db->query($deleteSql);
			$feeSql = "update profile set money=money-{$fee} , frMoney=frMoney+{$fee} where uid={$uid}";
			$query = $this->db->query($feeSql);
			$this->sendScuessEmail($uid,$tid,strtotime($start));
			
			////TECHNO-VIPLOVE added below code for affiliate////////
			$fre_session = $this->getuserfreesession($uid);
			//print_r($fre_session);exit();
			/* if($fre_session[0]['free_session']=='n' &&  $fre_session[0]['first_paid']=='0')
			{
			$sqlrefid = "select refid from user where id = {$uid}";
		    $queryrefid = $this->db->query($sqlrefid);
		    $resultrefid = $queryrefid->result_array();
			$ref_id = $resultrefid[0]['refid'];
			$sqlpercentage = "select value from config where id = 6";
		    $querypercentage = $this->db->query($sqlpercentage);
		    $resultpercentage = $querypercentage->result_array();
			$percentage = $resultpercentage[0]['value'];
			$fee = 10*($percentage/100);
			$sql = "insert into affiliate (`refid`,`sid`,`tid`,`amount`,`createAt`) values ({$ref_id},{$uid},{$tid},'{$fee}',NOW())";
			$query = $this->db->query($sql);
			$updatefirst_paid= "UPDATE profile SET first_paid = 1 WHERE uid = {$uid}";
			$query = $this->db->query($updatefirst_paid);
			} */
			////////
			
			// TECHNO-SANJAY added below code new registered user to normal user
			$updateSessionSql = "UPDATE user SET free_session = 'n' ,user_firsttime = 'n' WHERE id = {$uid}";
			$query = $this->db->query($updateSessionSql);
			$updateSessionSql1 = "UPDATE profile SET free_session = 'n' WHERE uid = {$uid}";
			$query1 = $this->db->query($updateSessionSql1);
			//Techno-Sanjay added for disputes resolution
			if($fre_session[0]['free_session']=='n'){
				$sql = "insert into disputes (`sid`,`createAt`,`tid`,`fee`,`approve`,`paymentstatus`,`postpone`) values ({$uid},'{$start}',{$tid},{$fee},{$rate},'0','Unpaid','0')";
				$query = $this->db->query($sql);
			}
		}
		return $query ;
	}
	public function getactualtime()
	{
			$dt = date(' H:i:s Y-m-d',time());
			$studentTimezone = $this->user_model->getLastLocalTimeZone($this->uid);
			$student_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$studentTimezone);

			return time($student_session_time);
	}
	public function sendScuessEmail($fUid,$tUid,$time) {
		$sTopic = $_POST['sTopic'];
		$sLevel = $_POST['sLevel'];
		$sql = "SELECT user.timezone,user.email,user.username,profile.* from profile left join user on user.id = profile.uid WHERE (uid={$fUid} OR uid={$tUid})";
		$query = $this->db->query($sql);
		$result = $query->result_array();
         $time = strtotime($time);
		$users = array();
		foreach ($result as $key => $value) {
			$users[$value['uid']] = $value;
		}
		/*$usernameFid = $users[$fUid]['firstName'].' '.$users[$fUid]['lastName'];
		$usernametUid = $users[$tUid]['firstName'].' '.$users[$tUid]['lastName'];*/
		$usernameFid = $users[$fUid]['firstName'].''.$users[$fUid]['uid'];
		$usernametUid = $users[$tUid]['firstName'].''.$users[$tUid]['uid'];
		
		$dt = date(' H:i:s Y-m-d',$time);
		$this->load->model(array('event_model','user_model'));
		$studentTimezone = $this->user_model->getLastLocalTimeZone($users[$fUid]['uid']);

		$student_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$studentTimezone);
		/*if($studentTimezone == 'America/Boise'){
			$oldTime 			= time($student_session_time);
			$timeAfterOneHour 	= $oldTime+60*60*4.6;
			$student_session_time = date("g:i A, Y-m-d",$timeAfterOneHour);
		}else{
			$student_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$studentTimezone);
		}*/

		//$dateInLocal = date("g:i A, Y-m-d", $this->event_model->outTime($dt));
		$this->load->library('email');
		$this->email->mailtype = 'html';
		$this->email->from('no-reply@thetalklist.com','TalkMaster BlueBob');
		// email to student as per his local requested time
		$str = "A learning Vee-session was booked by {$usernameFid} with  {$usernametUid}";
		$str .= ".\r\n<br/>";
		if($this->session->userdata('free_session') == 'y'){
			$str .= "This is a new student booking their FREE session. \r\n<br/>";
		}
		$str .= "The Vee-session start time is at your local time  ". $student_session_time . ". \r\n<br/>";
		$str .="{$usernameFid} is an {$sLevel} speaker and would like to talk about {$sTopic}."; 
		$str .= "If you have any problems please email the support team at:  support@thetalklist.com\r\n<br/>";
		$str .= "Thank you,           TheTalkList Support Team";
		$toStudent = $users[$fUid]['email'];
		$this->email->to($toStudent);
		$this->email->subject('TheTalklist Vee-session created.');
		$this->email->message($str);
		//$this->email->send();
		// email to tutor as per his local timezone
		$this->load->model('user_model');
		$tutotTimezone = $this->user_model->getLastLocalTimeZone($users[$tUid]['uid']);
		$tutor_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$tutotTimezone);

		/*$tutorTimezone = $this->user_model->getLastLocalTimeZone($users[$fUid]['uid']);

		$tutor_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$tutorTimezone);*/
		/*
		if($tutotTimezone == 'America/Boise'){
			$oldTime 			= time($tutor_session_time);
			$timeAfterOneHour 	= $oldTime+60*60*4.6;
			$tutor_session_time = date("g:i A, Y-m-d",$timeAfterOneHour);
		}else{
			$tutor_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$tutorTimezone);
		}
		*/
		$str = "A learning Vee-session was booked by {$usernameFid} with  {$usernametUid}";
		$str .= "\r\n<br/>";
		if($this->session->userdata('free_session') == 'y'){
			$str .= "This is a new student booking their FREE session. \r\n<br/>";
		}
		$str .= "The Vee-session start time is at your local time  ". $tutor_session_time . ". \r\n<br/>";
		$str .="{$usernameFid} is an {$sLevel} speaker and would like to talk about {$sTopic}."; 
		$str .= "If you have any problems please email the support team at:  support@thetalklist.com\r\n<br/>";
		$str .= "Thank you,           TheTalkList Support Team";
		$toTutor = $users[$tUid]['email'];
		$this->email->clear();
		$this->email->mailtype = 'html';
		$this->email->from('no-reply@thetalklist.com','TalkMaster BlueBob');
		$this->email->to($toTutor);
		$this->email->subject('TheTalklist Vee-session created.');
		$this->email->message($str);
		//$this->email->send();
	}
	
	
	//-------- Book Now email message start----------------------
	
	public function sendBookNowScuessEmail($fUid,$tUid,$time) {
		$sTopic = $_POST['sTopic'];
		$sLevel = $_POST['sLevel'];
		$sql = "SELECT user.timezone,user.email,user.username,profile.* from profile left join user on user.id = profile.uid WHERE (uid={$fUid} OR uid={$tUid})";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$users = array();
		foreach ($result as $key => $value) {
			$users[$value['uid']] = $value;
		}
		/*$usernameFid = $users[$fUid]['firstName'].' '.$users[$fUid]['lastName'];
		$usernametUid = $users[$tUid]['firstName'].' '.$users[$tUid]['lastName'];*/
		$usernameFid = $users[$fUid]['firstName'].''.$users[$fUid]['uid'];
		$usernametUid = $users[$tUid]['firstName'].''.$users[$tUid]['uid'];

		$dt = date(' H:i:s Y-m-d',$time);
		$this->load->model(array('event_model','user_model'));

		$studentTimezone = $this->user_model->getLastLocalTimeZone($users[$fUid]['uid']);

		$student_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$studentTimezone);
		/*if($studentTimezone == 'America/Boise'){
			$oldTime 			= time($student_session_time);
			$timeAfterOneHour 	= $oldTime-60*60*5.92;
			$student_session_time = date("g:i A, Y-m-d",$timeAfterOneHour);
		}else{
			$student_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$studentTimezone);
		}*/

		//$sid = $this->session->userdata('uid');
		//$sql = "SELECT profile.free_session from profile,user  WHERE profile.uid = {$sid} AND user.id = {$sid} AND user.exp_session >='{$currenttime}' "  ;
		//$query = $this->db->query($sql);
		
		//	$result = $query->result_array();
			  //print_r($result);die();
			// echo $result[0]['free_session'];die();
			//if($result[0]['free_session']=='y'){
		//	}
		
		//$dateInLocal = date("g:i A, Y-m-d", $this->event_model->outTime($dt));
		$this->load->library('email');
		$this->email->mailtype = 'html';
		$this->email->from('no-reply@thetalklist.com','TalkMaster BlueBob');
		// email to student as per his local requested time
		$str = "A learning Vee-session was booked by {$usernameFid} with  {$usernametUid}";
		$str .= ".\r\n<br/>";
		if($this->session->userdata('free_session') == 'y'){
			$str .= "This is a new student booking their FREE session. \r\n<br/>";
		}
		$str .= "The Vee-session start time is at your local time  ". $student_session_time . ". \r\n<br/>";		
		//$str .= "<br><br>From user Dashboard, join within 15min of session but don't be late. \r\n<br/>";
		//$str .= "<br><br>From user dashboard, you have 5 minutes from this notification to join the session. So don't be late. \r\n<br/>";
		$str .= "From user Dashboard, join within 15min of session but don’t be late.  If you are late by 4min, then session will be locked and you will forfeit credits or earnings. In this case send Beepbox message to partner to reschedule.\r\n<br/>";
		$str .= "Click to Share webcam and mic devices.\r\n<br/>";		
		$str .= "<br><br>If you have any problems please email the support team at:  support@thetalklist.com\r\n<br/>";
		$str .= "Thank you,           TheTalkList Support Team";
		$toStudent = $users[$fUid]['email'];
		$this->email->to($toStudent);
		$this->email->subject('TheTalklist Vee-session created.');
		$this->email->message($str);
		$this->email->send();
		// email to tutor as per his local timezone
		$this->load->model('user_model');
		$tutotTimezone = $this->user_model->getLastLocalTimeZone($users[$tUid]['uid']);

		$tutor_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$tutotTimezone);
		/*if($tutotTimezone == 'America/Boise'){
			$oldTime 			= time($tutor_session_time);
			$timeAfterOneHour 	= $oldTime-60*60*5.92;
			$tutor_session_time = date("g:i A, Y-m-d",$timeAfterOneHour);
		}else{
			$tutor_session_time = $this->utc_to_local('g:i A, Y-m-d',$dt,$tutotTimezone);
		}*/

		$str = "A learning Vee-session was booked by {$usernameFid} with  {$usernametUid}";
		$str .= ".\r\n<br/>";
		if($this->session->userdata('free_session') == 'y'){
			$str .= "This is a new student booking their FREE session. \r\n<br/>";
		}
		$str .= "The Vee-session start time is at your local time  ". $tutor_session_time . ". \r\n<br/>";		
		//$str .= "<br><br>From user Dashboard, join within 15min of session but don't be late. \r\n<br/>";
		$str .= "From user Dashboard, join within 15min of session but don’t be late.  If you are late by 4min, then session will be locked and you will forfeit credits or earnings. In this case send Beepbox message to partner to reschedule.\r\n<br/>";
		$str .= "Click to Share webcam and mic devices.\r\n<br/>";
		
		$str .= "<br><br>If you have any problems please email the support team at:  support@thetalklist.com\r\n<br/>";
		$str .= "Thank you,           TheTalkList Support Team";
		$toTutor = $users[$tUid]['email'];
		$this->email->clear();
		$this->email->mailtype = 'html';
		$this->email->from('no-reply@thetalklist.com','TalkMaster BlueBob');
		$this->email->to($toTutor);
		$this->email->subject('TheTalklist Vee-session created.');
		$this->email->message($str);
		$this->email->send();
	}
	
	//-------- Book Now email message end----------------------
	
	public function getSlotByDate($uid,$start,$end){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		$end = date('Y-m-d H:i:s',$this->inTime($end));
		
		
		
		 $sql = "select * from timeSlot where startTime>='{$start}' and endTime <='{$end}' and uid={$uid} order by startTime asc";
		$query = $this->db->query($sql);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	public function getClassByDate($uid,$start,$end){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		$end = date('Y-m-d H:i:s',$this->inTime($end));
		$sql = "select * from class where startTime>='{$start}' and endTime <='{$end}' and (tid={$uid} or sid={$uid}) order by startTime asc";
		$query = $this->db->query($sql);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	//--R&D@Sept-18-2013 : Check if Session is booked for this day
	public function getBookedClassByDate($uid,$day,$month, $year){
		$sql 		= "SELECT * FROM `class` WHERE Month(`startTime`)  = '{$month}' AND Year(`startTime`)  = '{$year}' AND Day(`startTime`)  = '{$day}' AND (`tid` ={$uid} OR `sid`={$uid}) ORDER BY `startTime` ASC";
		$query = $this->db->query($sql);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	//--R&D@Sept-18-2013 : Check if Session is booked for this day
	public function getEventsByDate($uid,$start,$end){
		$slot = $this->getSlotByDate($uid,$start,$end);
		
		$class = $this->getClassByDate($uid,$start,$end);
		 //print_r($class);die;
		$events = array_merge($slot,$class);
		usort($events,array($this,'sortByStartTime'));
		//print_r($events);die();
		return $events;
	}
	private function sortByStartTime($a,$b){
		if($a['startTime'] == $b['startTime']){
			return 0;
		}
		return ($a['startTime'] >$b['startTime']) ? 1 : -1;
	}
	public function getEventsCountByDate($uid,$start,$end){
		$slot = $this->getSlotByDate($uid,$start,$end);
		$class = $this->getClassByDate($uid,$start,$end);
		$events = array_merge($slot,$class);
		$eventsCount = array();
		foreach($events as $key => $v){
			$dateTime = $this->outTime($v['startTime']);
			$date = date('Y-m-d',$dateTime);
			if( isset($eventsCount[$date]) && isset($eventsCount[$date]['count']) && $eventsCount[$date]['count']>0 ) {
				$eventsCount[$date]['count'] ++;
			}else {
				$year = date('Y',$dateTime);
				$month = date('m',$dateTime);
				$day = date('d',$dateTime);
				$d = compact ($year,$month,$day );
				$eventsCount[$date] = array();
				$eventsCount[$date] = compact('year','month','day' );
				$eventsCount[$date]['date'] = $date;
				$eventsCount[$date]['count'] = 1;
			}
		}
		return $eventsCount;
	}
	public function checkSlotTime($day,$times,$tid) {
		$sql = "SELECT startTime from timeSlot where uid= {$tid} ";
		$inTimes = array();
		if( !is_array($times) ){
			$times = array();
		}
		foreach ($times as $key => $value) {
			$inTimes[] = date('Y-m-d H:i:s',$this->inTime($day . ' ' . $value));
		}
		if(count($inTimes) == 0){
			$sql1 = " DELETE FROM timeSlot where uid= {$tid} ";
			$sql1 .= " AND startTime >= '".date('Y-m-d H:i:s',$this->inTime($day . ' 00:00:00')) ."' AND startTime < '".date('Y-m-d H:i:s',$this->inTime($day . ' 23:59:59'))."'" ;
			$this->db->query($sql1);
			return array();
		}else{
			$sql1 = " DELETE FROM timeSlot where uid= {$tid} AND startTime not in (\"" . implode($inTimes, '","') ."\")";
			$sql1 .= " AND startTime >= '".date('Y-m-d H:i:s',$this->inTime($day . ' 00:00:00')) ."' AND startTime < '".date('Y-m-d H:i:s',$this->inTime($day . ' 23:59:59'))."'" ;
			$this->db->query($sql1);
			$sql .= " and startTime in (\"" . implode($inTimes, '","') ."\")";
		}
		//check if already in time slot
		$query = $this->db->query($sql);
		$num_rows = array();
		if ($query->num_rows() > 0) {
			$num_rows = $query->result_array();
		}
		foreach ($num_rows as $key => $value) {
			$inTimesKey = array_search($value['startTime'], $inTimes);
			if( $inTimesKey !== false ) {
				unset($inTimes[$inTimesKey ]);
			}
		}
		foreach ($inTimes as $key => $value) {
			$inTimes[ $key ] = date( 'Y-m-d H:i:s',$this->outTime($value) );
		}
		return $inTimes;
	}
	public function checkClassTime($day,$times,$tid,$uid) {
		 $sql = "SELECT startTime from class where (sid= {$tid} or tid={$tid}) ";
		//$sql = "SELECT startTime from class where (sid= {$uid} or tid={$tid}) ";
		//print_r($times);die;
		$inTimes = array();
		if( !is_array($times) ){
			$times = array();
		}
		foreach ($times as $key => $value) {
			$inTimes[] = date('Y-m-d H:i:s',$this->inTime($day . ' ' . $value));
		}
		if(count($inTimes) == 0){
			return array();
		}else{
			$sql .= " and startTime in (\"" . implode($inTimes, '","') ."\")";
		}
		//check if already in time slot
		$query = $this->db->query($sql);
		$num_rows = array();
		if ($query->num_rows() > 0) {
			$num_rows = $query->result_array();
		}
		foreach ($num_rows as $key => $value) {
			$inTimesKey = array_search($value['startTime'], $inTimes);
			if( $inTimesKey !== false ) {
				unset($inTimes[$inTimesKey ]);
			}
		}
		if(count($inTimes) == 0){
			return array();
		}
		//check if in time slot
		$sql = "SELECT startTime from timeSlot WHERE uid={$tid} AND startTime BETWEEN '{$inTimes[0]}' AND date_add('{$inTimes[0]}',interval 1 day)";
		$num_rows = array();
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$num_rows = $query->result_array();
		}
		$num_rows_temp = array();
		foreach ($num_rows as $key => $value) {
			$num_rows_temp[] = $value['startTime'];
		}
		$num_rows = $num_rows_temp;
		unset($num_rows_temp);
		$_inTimes = array();
		foreach ($inTimes as $key => $value) {
			if( in_array($value, $num_rows) ) {
				$_inTimes[] = date( 'Y-m-d H:i:s',$this->outTime($value) );
			}
		}
		$inTimes = $_inTimes;
		return $inTimes;
	}
	/*
	@author RD@Sept-17-2013
	@desc Check if Student/Teacher is having first time secction
	*/
	//---Check if STUDENT is booking the session for the first time
	public function isFirstTimeStudent($studentId){
		$sql 	= "SELECT `id`  FROM `class` WHERE `tid` = '{$studentId}'";
		$query 	= $this->db->query($sql);
		if ($query->num_rows() <= 0) { return true;} else { return false; }
	}
	//---Check if TEACHER is scheduling the session for the first time
	public function isFirstTimeTeacher($techerId){
		$sql 	= "SELECT `id`  FROM `timeSlot` WHERE `uid` = '{$techerId}'";
		$query 	= $this->db->query($sql);
		if ($query->num_rows() <= 0) { return true;} else { return false; }
	}
        public function isFirstTimeStudentnew($studentId){
		$sql 	= "SELECT `id`  FROM `class` WHERE `sid` = '{$studentId}'";
		$query 	= $this->db->query($sql);
		if ($query->num_rows() <= 0) { return true;} else { return false; }
	}
        public function isFirstTimeTeachernew($techerId){
		$sql 	= "SELECT `id`  FROM `timeslot` WHERE `uid` = '{$techerId}'";
		$query 	= $this->db->query($sql);
		if ($query->num_rows() <= 0) { return true;} else { return false; }
	}
	function utc_to_local($format_string, $utc_datetime, $time_zone)
	{
		$date = new DateTime($utc_datetime, new DateTimeZone('UTC'));
		$date->setTimeZone(new DateTimeZone($time_zone));
		return $date->format($format_string);
	}
	
	
	public function checkSlotTimest($day,$times,$sid) {
		$sql = "SELECT startTime from timeSlot where stid= {$sid} ";
		$inTimes = array();
		if( !is_array($times) ){
			$times = array();
		}
		foreach ($times as $key => $value) {
			$inTimes[] = date('Y-m-d H:i:s',$this->inTime($day . ' ' . $value));
		}
		if(count($inTimes) == 0){
			//$sql1 = " DELETE FROM timeSlot where sid= {$sid} ";
			//$sql1 .= " AND startTime >= '".date('Y-m-d H:i:s',$this->inTime($day . ' 00:00:00')) ."' AND startTime < '".date('Y-m-d H:i:s',$this->inTime($day . ' 23:59:59'))."'" ;
			//$this->db->query($sql1);
			return array();
		}else{
			//$sql1 = " DELETE FROM timeSlot where sid= {$sid} AND startTime not in (\"" . implode($inTimes, '","') ."\")";
			//$sql1 .= " AND startTime >= '".date('Y-m-d H:i:s',$this->inTime($day . ' 00:00:00')) ."' AND startTime < '".date('Y-m-d H:i:s',$this->inTime($day . ' 23:59:59'))."'" ;
			//$this->db->query($sql1);
			//$sql .= " and startTime in (\"" . implode($inTimes, '","') ."\")";
		}
		//check if already in time slot
		$query = $this->db->query($sql);
		$num_rows = array();
		if ($query->num_rows() > 0) {
			$num_rows = $query->result_array();
		}
		foreach ($num_rows as $key => $value) {
			$inTimesKey = array_search($value['startTime'], $inTimes);
			if( $inTimesKey !== false ) {
				unset($inTimes[$inTimesKey ]);
			}
		}
		foreach ($inTimes as $key => $value) {
			$inTimes[ $key ] = date( 'Y-m-d H:i:s',$this->outTime($value) );
		}
		return $inTimes;
	}

	public function creatTimeSlotst($start,$end,$tid,$sid,$stopic,$slevel,$schoolid){
		$start = date('Y-m-d H:i:s',$this->inTime($start));
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		
	//	echo $start;
	//	echo "</br>";
	//	echo $end;
	//	die();
		
		//$sqlSearch = "select * from timeSlot where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and uid={$sid}";
		//$query = $this->db->query($sqlSearch);
		//if ($query->num_rows() > 0) {
			//return false;
		//}
		//$sqlSearch = "select * from class where ((`startTime` <='{$start}' and endTime >= '{$start}') or (`startTime` <='{$end}' and endTime >= '{$end}')) and (tid={$tid} or sid={$sid})";
		//$query = $this->db->query($sqlSearch);
		//if ($query->num_rows() > 0) {
			//return false;
		//}
		$creatAt = date('Y-m-d H:i:s');
		$flag = 0;
		$openby=2;
		
		
		 $sql = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`stid`,`flag`,`stopic`,`slevel`,`openby`,`School_id`) values ({$tid},'{$start}','{$end}','{$creatAt}','{$sid}','{$flag}','{$stopic}','{$slevel}','{$openby}','{$schoolid}')";
 
		$query = $this->db->query($sql);
		return $start ;
	}
	
	public function getdata($eid)
	{
	
	$sql = "select * from timeSlot where id ='{$eid}'";
		$query = $this->db->query($sql);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}
	return $result ;
	 
	
	}

	
	public function creatClassbytutor($_start,$end,$uid,$tid,$fee,$rate){
	
	 
	
		$sTopic = $_POST['sTopic'];
		$sLevel = $_POST['sLevel'];
		 
		
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($_start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		
		$start = $_start;
		
		
		$sqlSearch = "select * from timeSlot where `startTime` <='{$start}' and endTime >= '{$end}' and uid={$tid}";
		$query = $this->db->query($sqlSearch);
		
		 
		 
		//echo $query->num_rows();die();
		if ($query->num_rows() == 0) {
			return false;
		}else {
		
			$timeSlot = $query->row_array();
			
			$schoolid=$timeSlot['School_id'];
			
			$creatAt = date('Y-m-d H:i:s');
			$sql = "insert into class (`sid`,`startTime`,`endTime`,`createAt`,`tid`,`fee`,`t_hrate`,`sTopic`  , `sLevel`,`confirmby`,`school_id`) values ({$uid},'{$start}','{$end}','{$creatAt}',{$tid},{$fee},{$rate},'{$sTopic}','{$sLevel}','1','{$schoolid}')";
			$query = $this->db->query($sql);
			$spiltSql1 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$timeSlot['startTime']}','{$start}','{$creatAt}','{$schoolid}')";
			$spiltSql2 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$end}','{$timeSlot['endTime']}','{$creatAt}','{$schoolid}')";
		 	$deleteSql = "delete from timeSlot where id = {$timeSlot['id']}";
			if( strtotime($start) - strtotime($timeSlot['startTime']) > 3600){
				$query = $this->db->query($spiltSql1);
			}
			if( strtotime($timeSlot['endTime']) - strtotime($end) > 3600){
				$query = $this->db->query($spiltSql2);
			}
			$query = $this->db->query($deleteSql);
			$feeSql = "update profile set money=money-{$fee} , frMoney=frMoney+{$fee} where uid={$uid}";
			$query = $this->db->query($feeSql);
			$this->sendScuessEmail($uid,$tid,strtotime($start));
			////TECHNO-VIPLOVE added below code for affiliate////////
			$fre_session = $this->getuserfreesession($uid);
				//print_r($fre_session);exit();
			/* if($fre_session[0]['free_session']=='n' && $fre_session[0]['first_paid']==0)
			{
			$sqlrefid = "select refid from user where id = {$uid}";
		    $queryrefid = $this->db->query($sqlrefid);
		    $resultrefid = $queryrefid->result_array();
			$ref_id = $resultrefid[0]['refid'];
			$sqlpercentage = "select value from config where id = 6";
		    $querypercentage = $this->db->query($sqlpercentage);
		    $resultpercentage = $querypercentage->result_array();
			$percentage = $resultpercentage[0]['value'];
			$fee = 10*($percentage/100);
			$sql = "insert into affiliate (`refid`,`sid`,`tid`,`amount`,`createAt`) values ({$ref_id},{$uid},{$tid},'{$fee}',NOW())";
			$query = $this->db->query($sql);
			$updatefirst_paid= "UPDATE profile SET first_paid = 1 WHERE uid = {$uid}";
			$query = $this->db->query($updatefirst_paid);
			} */
			////////
			// TECHNO-SANJAY added below code new registered user to normal user
			$updateSessionSql = "UPDATE user SET free_session = 'n' ,user_firsttime = 'n' WHERE id = {$uid}";
			$query = $this->db->query($updateSessionSql);
			$updateSessionSql1 = "UPDATE profile SET free_session = 'n' WHERE uid = {$uid}";
			$query1 = $this->db->query($updateSessionSql1);
			//Techno-Sanjay added for disputes resolution
			if($fre_session[0]['free_session']=='n'){
			$sql = "insert into disputes (`sid`,`createAt`,`tid`,`fee`,`t_hrate`,`approve`,`paymentstatus`,`postpone`,`School_id`) values ({$uid},'{$start}',{$tid},{$fee},{$rate},'0','Unpaid','0','{$schoolid}')";
			$query = $this->db->query($sql);
			}
		}
		return $query ;
	}
	
	
	public function getfreesession($gfuid)
	{
	    $sql = "select free_session,first_paid from profile where uid = {$gfuid}";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		//print_r($result);die();
		return $result;
	}
	
	public function getuserfreesession($gfuid)
	{
	    $sql = "select free_session from user where id = {$gfuid}";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		//print_r($result);die();
		return $result;
	}
	public function testtime($_start){
		echo $start = date('Y-m-d H:i:s',$this->inTime($_start));
		exit;
	}
	
	/*
	public function creatClassnew($_start,$end,$uid,$tid,$fee,$sspeakinglevel,$conversationtopic,$txtconversationtopic,$isrequest,$bookingtype,$trate=0,$s_markup=0,$pvt=0,$schoolId=0,$conf=0){
		 
		 
		if ($conversationtopic == "Other")
                {
                    $conversationtopic = $txtconversationtopic;
                }
                $sTopic = $_POST['sTopic'];
				$sLevel = $_POST['sLevel'];
                $sTopic = $conversationtopic;
                $sLevel = $sspeakinglevel;
		$start = date('Y-m-d H:i:s',$this->inTime($_start));
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		$sqlSearch = "select * from timeSlot where `startTime` <='{$start}' and endTime >= '{$end}' and uid={$tid}";
                //echo $sqlSearch;
                $query = $this->db->query($sqlSearch);
                //echo $query->num_rows();
                if ($query->num_rows() == 0 && $isrequest != "1") {
                        //echo "<br/>test<br/>";
			return false;
		}else {
				if($this->session->userdata('free_session') == 'y')
				{
					$rtype='free';
				}
				else {$rtype='requested';}
				
				if($conf==1)
				{
					$bookStatus="Booked";
				}
				else{
					$bookStatus="Requested";
				}
				
			$timeSlot = $query->row_array();
			$creatAt = date('Y-m-d H:i:s');
			$sql = "insert into class (`sid`,`startTime`,`endTime`,`createAt`,`tid`,`fee` ,`sTopic`  , `sLevel`,`t_hrate`,`s_markup`,`is_private`,`school_id`,`confirmby`,`session_type`,`Booking`) values ({$uid},'{$start}','{$end}','{$creatAt}',{$tid},{$fee},'{$sTopic}','{$sLevel}','{$trate}','{$s_markup}','{$pvt}','{$schoolId}','{$conf}','{$rtype}','{$bookStatus}')";
                        //echo $sql;
			$query = $this->db->query($sql);
			$cid = $this->db->insert_id();
			if ($isrequest != "1")
                        {
                            $spiltSql1 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$timeSlot['startTime']}','{$start}','{$creatAt}','{$schoolId}')";
                            $spiltSql2 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$end}','{$timeSlot['endTime']}','{$creatAt}','{$schoolId}')";
                            $deleteSql = "delete from timeSlot where id = {$timeSlot['id']}";
                            //echo $deleteSql;
                            if( strtotime($start) - strtotime($timeSlot['startTime']) > 3600){
                                    $query = $this->db->query($spiltSql1);
                            }
                            if( strtotime($timeSlot['endTime']) - strtotime($end) > 3600){
                                    $query = $this->db->query($spiltSql2);
                            }
                            $query = $this->db->query($deleteSql);
                        }
						
						if($pvt == 1)
						{		
							$q1="select value from config where id='9'";
							$query = $this->db->query($q1);
							$result = $query->row_array();
							$AdminRate=$result['value'];
							$updatepvt="update profile set pbalance=pbalance-{$AdminRate} where uid={$schoolId}";
							$query = $this->db->query($updatepvt);
						}
						$feeSql = "update profile set money=money-{$fee} , frMoney=frMoney+{$fee}, new = 0 where uid={$uid}";
			//echo $feeSql;
                        $query = $this->db->query($feeSql);
                        if ($isrequest == "1")
                        {
                            $isrequestqu = "insert into timeSlot (`uid`,`stid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$tid},{$uid},'{$start}','{$end}','{$creatAt}','{$schoolId}')";
                            //echo $isrequestqu;
                            $query = $this->db->query($isrequestqu);
							
                        }
                        $this->sendScuessEmail($uid,$tid,strtotime($start));
                        $fre_session = $this->getuserfreesession($uid);
                        $updateSessionSql = "UPDATE user SET free_session = 'n' ,user_firsttime = 'n' WHERE id = {$uid}";
			$query = $this->db->query($updateSessionSql);
			$updateSessionSql1 = "UPDATE profile SET free_session = 'n' WHERE uid = {$uid}";
			$query1 = $this->db->query($updateSessionSql1);
			//Techno-Sanjay added for disputes resolution
			if($fre_session[0]['free_session']=='n'){
				//$sql = "insert into disputes (`sid`,`createAt`,`tid`,`fee`,`approve`,`paymentstatus`,`postpone`,`t_hrate`,`cid`,`School_id`) values ({$uid},'{$start}',{$tid},{$fee},'0','Unpaid','0',{$trate},'{$cid}','{$schoolId}')";
				$sql = "insert into disputes (`sid`,`createAt`,`tid`,`fee`,`approve`,`paymentstatus`,`postpone`,`t_hrate`,`cid`,`School_id`,`s_markup`) values ({$uid},'{$start}',{$tid},{$fee},'0','Unpaid','0',{$trate},'{$cid}','{$schoolId}','{$s_markup}')";
				$query = $this->db->query($sql);
			}
			$updateUser = "UPDATE user SET is_eligible = '0'  WHERE id = {$uid}";
			$query = $this->db->query($updateUser);
		}
		return $query ;
	}*/
	
	public function creatClassnew($_start,$end,$uid,$tid,$fee,$sspeakinglevel,$conversationtopic,$txtconversationtopic,$isrequest,$bookingtype,$trate=0,$s_markup=0,$pvt=0,$schoolId=0,$conf=0){
		
		/* added by haren if tutor rate 0 then allow free */
		if($trate <= 0)
		{
			$s_markup=0;
			$fee=0;
		}
		/* haren code end */
		 
		if ($conversationtopic == "Other")
		{
			$conversationtopic = $txtconversationtopic;
		}
		$sTopic = $_POST['sTopic'];
		$sLevel = $_POST['sLevel'];
		$sTopic = $conversationtopic;
		$sLevel = ($sspeakinglevel=='naval') ? "Intermediate" :  $sspeakinglevel;
		$start = date('Y-m-d H:i:s',$this->inTime($_start));
		if($end == 0){
			$end = date('Y-m-d H:i:s',strtotime($start) + 25*60);
		}else {
			$end = date('Y-m-d H:i:s',$this->inTime($end));
		}
		$sqlSearch = "select * from timeSlot where `startTime` <='{$start}' and endTime >= '{$end}' and uid={$tid}";
        //echo $sqlSearch;
        $query = $this->db->query($sqlSearch);
        //echo $query->num_rows();
        if ($query->num_rows() == 0 && $isrequest != "1") {
        	return false;
		}else {
			if($this->session->userdata('free_session') == 'y')
			{
				$rtype='free';
			}
			/*else if(if($conf==1))
			{
				$rtype='booked';
			}*/
			else {$rtype='requested';}
			if($conf==1)
			{
				$bookStatus="Booked";
			}
			else{
				$bookStatus="Requested";
			}
			$timeSlot = $query->row_array();
			$creatAt = date('Y-m-d H:i:s');
			$sql = "insert into class (`sid`,`startTime`,`endTime`,`createAt`,`tid`,`fee` ,`sTopic`  , `sLevel`,`t_hrate`,`s_markup`,`is_private`,`school_id`,`confirmby`,`session_type`,`Booking`) values ({$uid},'{$start}','{$end}','{$creatAt}',{$tid},{$fee},'{$sTopic}','{$sLevel}','{$trate}','{$s_markup}','{$pvt}','{$schoolId}','{$conf}','{$rtype}','{$bookStatus}')";
            $query = $this->db->query($sql);
			$cid = $this->db->insert_id();
			
			if ($isrequest != "1")
			{
				$spiltSql1 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$timeSlot['startTime']}','{$start}','{$creatAt}','{$schoolId}')";
				$spiltSql2 = "insert into timeSlot (`uid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$timeSlot['uid']},'{$end}','{$timeSlot['endTime']}','{$creatAt}','{$schoolId}')";
				$deleteSql = "delete from timeSlot where id = {$timeSlot['id']}";
				//echo $deleteSql;
				if( strtotime($start) - strtotime($timeSlot['startTime']) > 3600){
						$query = $this->db->query($spiltSql1);
				}
				if( strtotime($timeSlot['endTime']) - strtotime($end) > 3600){
						$query = $this->db->query($spiltSql2);
				}
				$query = $this->db->query($deleteSql);
			}
						
			if($pvt == 1)
			{		
				/*$q1="select value from config where id='9'";
				$query = $this->db->query($q1);
				$result = $query->row_array();
				$AdminRate=$result['value'];
				$updatepvt="update profile set pbalance=pbalance-{$AdminRate} where uid={$schoolId}";
				$query = $this->db->query($updatepvt);*/
			}
			$feeSql = "update profile set money=money-{$fee} , frMoney=frMoney+{$fee}, new = 0 where uid={$uid}";
			$query = $this->db->query($feeSql);
			
			/* Added By Ilyas */
			// Call Transaction Insert Function for insert record - Ilyas
			$CI =& get_instance();
			$CI->load->model('user_model');
			$nw = date("Y-m-d H:i:s");
			$record = array(
				  'user_id' 		=> 	$uid,
				  'amount'		 	=> 	$fee,
				  'amount_status' 	=> 	'debit',
				  'type' 			=> 	'Student Vee-session',
				  'payment_status' 	=> 	'Paid',
				  'payment_date' 	=> 	$nw,
				  'summary' 		=> 	"Paid to Tutor ($tid) by Student",
				  'ref_table'		=>	'class',
				  'ref_id'			=>	$cid
			);
			$relId = $this->user_model->fnInsertTransaction($record);
			/* End */
			
			if ($isrequest == "1")
			{
				$isrequestqu = "insert into timeSlot (`uid`,`stid`,`startTime`,`endTime`,`creatAt`,`School_id`) values ({$tid},{$uid},'{$start}','{$end}','{$creatAt}','{$schoolId}')";
				//echo $isrequestqu;
				$query = $this->db->query($isrequestqu);
				
			}
			$this->sendScuessEmail($uid,$tid,strtotime($start));
			$fre_session = $this->getuserfreesession($uid);
			$updateSessionSql = "UPDATE user SET free_session = 'n' ,user_firsttime = 'n' WHERE id = {$uid}";
			$query = $this->db->query($updateSessionSql);
			$updateSessionSql1 = "UPDATE profile SET free_session = 'n' WHERE uid = {$uid}";
			$query1 = $this->db->query($updateSessionSql1);
			//Techno-Sanjay added for disputes resolution
			
			//change by haren: add school_markup in dispute table
			
			if($fre_session[0]['free_session']=='n'){
				$sql = "insert into disputes (`sid`,`createAt`,`tid`,`fee`,`approve`,`paymentstatus`,`postpone`,`t_hrate`,`cid`,`School_id`,`s_markup`) values ({$uid},'{$start}',{$tid},{$fee},'0','Unpaid','0',{$trate},'{$cid}','{$schoolId}','{$s_markup}')";
				$query = $this->db->query($sql);
				
				$disputeId = $this->db->insert_id(); // Ilyas
				$record2 = array(
					  'user_id'			=> 	$tid,
					  'amount'			=> 	$trate,
					  'amount_status'	=> 	'Credit',
					  'type'			=> 	'Tutor Vee-session',
					  'payment_status'	=> 	'Pending',
					  'payment_date'	=> 	'',
					  'summary'			=> 	"Pending Tutor Payment ($tid) by admin",
					  'ref_table'		=>	'dispute',
					  'ref_id'			=>	$disputeId,
					  'inner_rel_id' 	=> 	$relId
				);
				$this->user_model->fnInsertTransaction($record2);
			}
			//added by haren new scope
			$updateUser = "UPDATE user SET is_eligible = '0'  WHERE id = {$uid}";
			$query = $this->db->query($updateUser);
		}
		return $query ;
	}
	
}
/* End of file event_model.php */
/* Location: ./application/model/event_model.php */