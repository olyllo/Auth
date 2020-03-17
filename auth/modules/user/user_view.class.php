<?php
/**
 * Class for work with users in view
 *
 *
 */


class User_View extends User_Model {

    public $dataSet;

	function __construct (){
		parent::__construct ();
	}

	function getErros ($data = ''){
	  $res = '';
	  if (isset($data['err']) && is_array($data['err'])) {
      for ($i = 0; $i < sizeof($data ['err']); $i++) {
        $res .= '<li>' . $data['err'][$i] . '</li>';
      }
    }
    if ($this->dbErrorNum !=0){
	    $res.= '<li> MySQL Error: ' . $this->dbErrorNum . ' - ' . $this->dbErrorMsg . '</li>';
    }
    if (strlen($this->msgInfo) > 0){
	    $res.= '<li> User Module say: ' . $this->msgInfo . '</li>';
    }
    if (strlen($res) > 0){
	    $res = '<ul class="Error">' . $res . '</ul>';
    }
    return $res;
  }

	function getLoginForm ($data = ''){
    $data = array('userLogin'=>$this->userLogin);
      if ($this->userID == 0) {
        if (array_key_exists("isRegistration", $_SESSION)) {
          if ($_SESSION['isRegistration']!== 1){
            include(CMS_MODULES_PATH . 'user/templates/loginform.tpl.php');
          }
          else {
            include(CMS_MODULES_PATH . 'user/templates/registerform.tpl.php');
          }
        }
        else {
          include(CMS_MODULES_PATH . 'user/templates/registerform.tpl.php');
        }
      }
      elseif($this->userAdmin!=1) {
        include (CMS_MODULES_PATH . 'user/templates/welcome.tpl.php');
      }
      else {
        include (CMS_MODULES_PATH . 'user/templates/Admin_menu.tpl.php');
      }
	}

 	function getRegisterForm ($data = ''){
		include (CMS_MODULES_PATH . 'user/templates/registerform.tpl.php');
	}

	function getEditForm ($data = ''){
		include (CMS_MODULES_PATH . 'user/templates/editform.tpl.php');
	}




}
