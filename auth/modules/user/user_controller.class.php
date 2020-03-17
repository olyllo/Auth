<?php
/**
 * Class for work with users in ciontroller
 *
 *
 */

class User_Controller extends User_View {

	function __construct ($userLang){
		parent::__construct ();
		
		$this->curLang=$userLang;
		$this->isRegistrError=0;
		
		GLOBAL $_POST;

		$this->model = array();
		$this->userFOTO='';
		$this->model = array('LANG'=>'','ERRORS'=>'','LOGINERROR'=>'','AUTHERROR'=>'', 'NAMEERROR'=>'','LASTNAMEERROR'=>'','EMAILERROR'=>'','PSWDERROR'=>'','CONFPSWDERROR'=>'','PHONEERROR'=>'','FILEERROR'=>'','LOGINVALUE'=>'','NAMEVALUE'=>'','EMAILVALUE'=>'', 'LASTNAMEVALUE'=>'','PHONEVALUE'=>'',);
		
		if (isset ($_POST['EngLang']) ){
			$this->set_lang('Eng'); //set lang at COOKIE
		}
		elseif(isset ($_POST['RuLang'])){
			$this->set_lang('Ru'); //set lang at COOKIE
		}
		if (isset ($_POST['doLogin']) ){
			$this->doLogin ($_POST['userLogin'], $_POST['userPswd']);
		}
		elseif  (isset ($_POST['doRegister']) ) {
			$this->doRegister ();
		}
		elseif ( isset ($_POST['doEdit']) ) {
			$this->doUpdate ();
		}
        elseif ( isset ($_POST['doLogout']) ) {
            $this->doLogout ();
        }
        else {
		    $this->sessionLoadUser();
        }

	}

	//Set language
	function set_lang($lang){
		$this->curLang=$lang;
		setcookie("Lang", $lang, time()+2400000,"/");
	}
	function get_lang()
	{
		return $this->curLang;
	}

	//Make authorization
	function doLogin ($login, $pswd){
		if ( !$this->modelLoginUser ($login, $pswd))
      	{	
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('AUTHERROR', 'Login or Pswd Error');
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('AUTHERROR', 'Ошибка Логина или Пароля');//если после сохранения ошибки поменяли язык
			}
			else {
				$this->setRegularERRORorVALUE('AUTHERROR', 'Ошибка Логина или Пароля');
			}
			
      	}
    
    }

	//Выполняет выход поьзователя с сайта
    function doLogout (){
	    $this->modelLogoutUser();
    }

    function doUpdate (){
		GLOBAL $_POST;
	}
	
	//Выполняет регистрацию пользователя
	function doRegister (){
		GLOBAL $_POST;
	    $userLogin = $_POST['userLogin'];
		$userPswd = $_POST['userPswd'];
		$userConfPswd = $_POST['userConfPswd'];
		$userName = $_POST['userName'];
		$userLastName = $_POST['userLastName'];
		$userEmail = $_POST['userEmail'];
		$userPhone = $_POST['userPhone'];
		
		if ($this->checkForm()){
				$_SESSION['isRegistration'] = 0;
				if ($this->userFOTO=='')
				{
					$userPHOTO='../auth/files/def.jpg';
				}
				else {
					$userPHOTO = $this->userFOTO;
				}
		    	$this->modelRegisterUser ($userLogin, $userName, $userLastName, $userEmail, $userPhone, $userPswd, $userPHOTO);
				$this->modelLoginUser($userLogin, $userPswd);
			}
			else {
				$_SESSION['isRegistration'] = 1;
			}
    }

//NEW
	public function checkForm()
	{
		$userLogin = $this->getUserLogin();
		$userPswd = $this->getUserPswd();
		$userConfPswd = $this->getUserConfPswd();
		$userName = $this->getUserName();
		$userLastName = $this->getUserLastName();  
		$userEmail = $this->getUserEmail(); 
		$userPhone = $this->getUserPhone();
		$userLoadFile = $this->LoadFile(); 
		

	if (($userLogin == true) && ($userPswd == true) && ($userConfPswd == true) && ($userName == true) && ($userLastName == true) && ($userEmail == true) && ($userPhone == true))
		{
			$this->model['ALLRIGHT']="Registration Sucsess!"; //добавить в форму
			return true;
		}
	else
		{
			$this->model['ERRORS']="You have error(s) at form";
			return false;
		}
	}

	public function returnFormErrors()
	{
		if ($this->checkForm())
		{
			return $this->error_mes;
		}
	}

	public function LoadFile()
	{
		if($_FILES['file']['type']!=''){
			$uploadname=basename($_FILES['file']['name']); 
			if ($this->Check_File($_FILES['file']['type'])){
				$uploadpath= '../auth/files/'.$uploadname; 
				if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) 
				{ 
					$this->userFOTO=$uploadpath;
					return true;
				}
				else 
				{
					return false;
				}
			}
			else {
				return false;
			}
		}
	}

	public function Check_File($file)
	{
		$format=explode("/", $file);
		if ($format[1]=='jpg'||$format[1]=='jpeg'||$format[1]=='gif'||$format[1]=='png'){
		
			return true;
		}
		else{
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('FILEERROR', 'Error file format, you loaad file in unallowed format');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('FILEERROR', 'Ошибка вы загружаете файл не разрешенного формата');
				return false;
			}
			
		}
	}

	public function getUserName()
	{
		if (isset($_POST['userName']))
		{
			$name =  $_POST['userName'];
			if ($this->Check_Names($name,'NAMEERROR','NAMEVALUE','userName')){
					return $name;
			}
			else {
				return false;	
			}
		} else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('NAMEERROR', 'Error at name. Name contain illegal symbols');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('NAMEERROR', 'Ошибка в имени. Имя содержит запрещенные символы');
				return false;
			}

		}

	}

	public function getUserLastName()
	{
		if (isset($_POST['userLastName']))
		{
			$name =  $_POST['userLastName'];
			if ($this->Check_Names($name,'LASTNAMEERROR','LASTNAMEVALUE','userLastName')){
				return $name;
			}
			else {
				return false;	
			}
		} else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('LASTNAMEERROR', 'Error at name. Name contain illegal symbols');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('LASTNAMEERROR', 'Ошибка в имени. Имя содержит запрещенные символы');
				return false;
			}
		}

	}

	public function getUserLogin()
	{
		if (isset($_POST['userLogin']))
		{
			$userLogin =  $_POST['userLogin'];
			if ($this->Check_Loggin($userLogin,'LOGINERROR','LOGINVALUE','userLogin'))
			{
				if ($this->checkUnique($userLogin))
				{
					return $userLogin;
				}
				else {
					return false;
				}
			}
			else {
				return false;	
			}
		} 

	}

	public function getUserPhone(){
		if (isset($_POST['userPhone']))
		{
			$userPhone = $_POST['userPhone'];
			if ($this->Check_Phone($userPhone,'PHONEERROR','PHONEVALUE','userPhone')){
				if ($this->checkUniquePhone($userPhone))
				{
					return $userPhone;
				}
				else {
					return false;
				}
			}
			else {
				return false;	
			}
		}
		else
		{
			$this->setRegularERRORorVALUE('PHONEERROR', 'No phone');
			return false;
		}

	}


	public function checkUnique($userLogin)
	{
		if($this->modelCheckLogin ($userLogin))
		{
			return true;
		}
		else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('LOGINERROR', 'Some user use this login, please load another');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('LOGINERROR', 'Уже есть пользователь с данным логином, пожалуйста выберите другой');
				return false;
			}
		}

	}

	public function checkUniquePhone($userPhone)
	{
		if($this->modelCheckPhone ($userPhone))
		{
			return true;
		}
		else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('PHONEERROR', 'User with this phone have been registrated, you can authotize');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('LOGINERROR', 'Пользователь с данным номером телефона уже зарегестрирован, вы можете авторизироваться');
				return false;
			}
		}

	}

	public function getUserPswd(){
		if (isset($_POST['userPswd']))
		{
			$name =  $_POST['userPswd'];
			if ($this->Check_Pass($name,'PSWDERROR','PSWDVALUE','userPswd'))
			{
				return $name;
			}
			else {
				return false;	
			}
		} else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('PSWDERROR', 'Error at name. Name contain illegal symbols');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('PSWDERROR', 'Ошибка в имени. Имя содержит запрещенные символы');
				return false;
			}
			
		}
	}

	public function getUserConfPswd(){
		if (isset($_POST['userConfPswd'])||$this->getUserPswd())
		{
			$name =  $_POST['userConfPswd'];
			if ($_POST['userPswd']===$_POST['userConfPswd']){
				$this->data['UserConfPswd']=$_POST['userConfPswd'];
				return $name;
			}
			else 
			{
				if ($_COOKIE['Lang']=='Eng' ){
					$this->setRegularERRORorVALUE('CONFPSWDERROR', 'Error at Confirm Passworld it must be equel');
				}
				elseif($_COOKIE['Lang']=='Ru'){
					$this->setRegularERRORorVALUE('CONFPSWDERROR', 'Ошибка, пароли должны быть одинаковыми');
				}
			}
		} else {
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE('CONFPSWDERROR', 'Error at Confirm Passworld, please fill the field or You enter incorect password,please check');
				return false;
			}
			elseif($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE('CONFPSWDERROR', 'Ошибка либо они разные либо вы ошибо=лись при вводе');
				return false;
			}
		}


	}

	public function getUserEmail()
	{
		if (isset($_POST['userEmail']))
		{
			$email = $_POST['userEmail'];
			if ($this->Check_Email($email,'EMAILERROR','EMAILVALUE','userEmail')){
				return $email;
			}
			else {
				return false;	
			}
		}
		else
		{
			$this->setRegularERRORorVALUE('EMAILERROR', 'No email');
			return false;
		}
	}


	public function Check_Email($name,$const1,$const2,$field)
	{
		if (!preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $name))
		{
			$this->setRegularERRORorVALUE($const2, $name);
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE($const1, 'Error at Email -  contain illegal symbols');
				return false;
			}
			elseif ($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Почта содержит запрещенные символы');
				return false;
			}
			else {
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Почта содержит запрещенные символы');
				return false;
			}
		}
		else
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			return true;
		}
	}

	public function Check_Phone($name,$const1,$const2,$field)
	{
		if (!preg_match('/^(?:\+|\d)[\d\-\(\) ]{9,}\d$/', $name))
		{
			$this->setRegularERRORorVALUE($const2, $name);
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE($const1, 'Error at Phone -  contain illegal symbols');
				return false;
			}
			elseif ($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Телефон содержит запрещенные символы');
				return false;
			}
			else {
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Телефон содержит запрещенные символы');
				return false;
			}
		}
		else
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			return true;
		}
	}

	public function Check_Loggin($name,$const1,$const2,$field)
	{
		if (!preg_match('/^[a-zA-Zа-яёА-ЯЁ0-9\s\-]+$/', $name))
		{
			$this->setRegularERRORorVALUE($const2, $name);
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE($const1, 'Error at Loggin -  contain illegal symbols');
				return false;
			}
			elseif ($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Логгин содержит запрещенные символы');
				return false;
			}
			else {
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Логгин содержит запрещенные символы');
				return false;
			}
			
		}
		else
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			return true;
		}


	}

	public function Check_Pass($name,$const1,$const2,$field)
	{
		if (!preg_match('/^[a-zA-Z0-9_-\w\s].{6,}$/', $name))
		{
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE($const1, 'Error at Pass, contain illegal symbols');
				return false;
			}
			elseif ($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE($const1, 'Ошибка, пароль одержит запрещенные символы');
				return false;
			}
			else {
				$this->setRegularERRORorVALUE($const1, 'Ошибка, пароль содержит запрещенные символы');
				return false;
			}

		}
		else
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			return true;
		}


	}

	public function Check_Names($name,$const1,$const2,$field)
	{
		if (!preg_match('/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/', $name))
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			if ($_COOKIE['Lang']=='Eng' ){
				$this->setRegularERRORorVALUE($const1, 'Error at Name -  contain illegal symbols');
				return false;
			}
			elseif ($_COOKIE['Lang']=='Ru'){
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Имя содержит запрещенные символы');
				return false;
			}
			else {
				$this->setRegularERRORorVALUE($const1, 'Ошибка, Имя содержит запрещенные символы');
				return false;
			}
		}
		else
		{
			$this->setRegularERRORorVALUE($const2, $name);
			$this->data[$field]=$_POST[$field];
			return true;
		}
	}

	public function setRegularERRORorVALUE ($ParamKey, $ParamVal)
	{
		
		$this->model[$ParamKey]=$ParamVal;
	}






}
