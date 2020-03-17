<?php
/**
 * Class for work with users in model
 *
 *
 */

class User_Model extends DB_Driver {

	public $userID;
	public $userLogin;
	public $userName;
	public $userData;
  public $userAdmin;
  public $fileLink;

    function __construct (){
        $this->sessionLoadUser();
      parent::__construct ();
    }

	  function modelLoginUser ($userLogin, $userPswd){
      $userPswd=MD5($userPswd);
      $sql = "SELECT * FROM `users` WHERE `userLogin` = '" . $userLogin .  "' AND `userPswd`= '" . $userPswd . "' "; 
        $this->sqlSendQuery($sql);
        $row = $this->sqlGetOneRow();
        if (isset($row['userID'])){
            $this->userID = $row['userID'];
            $this->userLogin = $row['userLogin'];
            $this->userPhone = $row['userPhone'];
            $this->userName = $row['userName'];
            $this->userData = $row;
            $this->userAdmin = $row['Admin'];
            $this->fileLink = $row['fileLink'];
            $this->sessionSaveUser();
            return true;
        }
        else
        {
            return false;
        }
    }

    function modelCheckLogin ($userLogin){
	    $sql = "SELECT COUNT(`userLogin`) AS useLogin FROM `users` WHERE `userLogin` = '" . $userLogin . "'";
      $this->sqlSendQuery($sql);
       $row = $this->sqlGetOneRow();
	    if ($row ['useLogin'] > 0) {
          return false;
        }
        else {
          return true;
        }
    }

    
    function modelCheckPhone ($userPhone){
	    $sql = "SELECT COUNT(`userPhone`) AS usePhone FROM `users` WHERE `userPhone` = '" . $userPhone . "'";
      $this->sqlSendQuery($sql);
       $row = $this->sqlGetOneRow();
	    if ($row ['usePhone'] > 0) {
          return false;
        }
        else {
          return true;
        }
    }


    function modelLogoutUser (){
	    session_destroy();
	    session_start();
        $this->sessionLoadUser();
    }

    function sessionSaveUser (){
        $_SESSION['userID'] = $this->userID;
        $_SESSION['userLogin'] = $this->userLogin;
        $_SESSION['userName'] = $this->userName;
        $_SESSION['userData'] = $this->userData;
        $_SESSION['fileLink'] = $this->fileLink;
    }

    function sessionLoadUser (){
        if (isset($_SESSION['userID'])) {
            $this->userID = $_SESSION['userID'];
            $this->userLogin = $_SESSION['userLogin'];
            $this->userName = $_SESSION['userName'];
            $this->userData = $_SESSION['userData'];
            $this->fileLink = $_SESSION['fileLink'];
        }
        else {
            $this->userID = 0;
            $this->userLogin = 'guest';
            $this->userName = 'Guest';
            $this->fileLink = '../lesson14/files/def.jpg';
            $this->userData = array ();
            $this->sessionSaveUser();
        }
    }

	function modelRegisterUser ($userLogin, $userName,  $userLastName, $userEmail, $userPhone, $userPswd, $fileLink){
		$this->msgError = '';
		$sql = "INSERT INTO `users` (`userLogin`, `userName`, `userLastName`, `userEmail`,`fileLink`, `userPhone`, `userPswd`)
                VALUES ('" . $userLogin . "', '" . $userName . "','" . $userLastName . "','" . $userEmail . "','" . $fileLink."','" . $userPhone . "', MD5('" . $userPswd . "'))";
    $this->sqlSendQuery($sql);
	}

	function modelUpdateUser  ($login, $pswd){
	}


}

