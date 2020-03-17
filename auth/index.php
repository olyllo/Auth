<?php
/**
 *
 *
 *
 */
include ('_init.php');

$mySite->start();

//Show authorization/regestration form
echo $curUser->getLoginForm();




$mySite->end();

