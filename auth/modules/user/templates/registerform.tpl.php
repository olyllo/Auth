 <!--<h3>Login</h3>-->
 <?php //$this->getErros();?>
 <?php $Errors=$this->model; 
 if ($this->curLang=='Eng'){
 	$data=formEng;
 }
 else{
	$data=formRu;
	}?>
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

 <!--<form action="<?//=$_SERVER['PHP_SELF']?>" method="POST">
	<input type="text" name="userLogin" value="<?=$data['userLogin']?>" /><br />
	<input type="password" name="userPswd" /><br />
	<input type="submit" name="doLogin" value="Enter" />
</form>-->



<!-- <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="form-inline" role="form">
  <div class="form-group">
    <label class="sr-only" for="InputLogin">Login</label>
    <input type="text" name="userLogin" class="form-control"  id="InputLogin" value="<?=$data['userLogin']?>" /><br />
	
	
  </div>

  <div class="form-group">
    <label class="sr-only" for="InputPassword">Пароль</label>
    <input type="password" name="userPswd" class="form-control" id="InputPassword" placeholder="Password"  /><br />
  </div>
  <div class="checkbox">
    <label>
          <input type="checkbox"> Запомнить меня
    </label>
  </div>
  	<input type="submit" name="doLogin" value="Enter" class="btn btn-default"/>

</form>-->


<!--NEW -->

<!--NEW

 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 
    <script>
        $( document ).ready(function() {
            $('#s-h-pass').click(function(){
                var type = $('#InputUserPswd').attr('type') == "text" ? "password" : 'text',
                    c = $(this).html() == "<span class=\"glyphicon glyphicon-eye-close\" title=\"Скрыть пароль\"></span>" ? "<span class=\"glyphicon glyphicon-eye-open\" title=\"Показать пароль\"></span>" : "<span class=\"glyphicon glyphicon-eye-close\" title=\"Скрыть пароль\"></span>";
                $(this).html(c);
                $('#InputUserPswd').prop('type', type);
            });
        });
	</script>

	<script>
        $( document ).ready(function() {
            $('#s-h-pass-auth').click(function(){
                var type = $('#InputPassword').attr('type') == "text" ? "password" : 'text',
                    c = $(this).html() == "<span class=\"glyphicon glyphicon-eye-close\" title=\"Скрыть пароль\"></span>" ? "<span class=\"glyphicon glyphicon-eye-open\" title=\"Показать пароль\"></span>" : "<span class=\"glyphicon glyphicon-eye-close\" title=\"Скрыть пароль\"></span>";
                $(this).html(c);
                $('#InputPassword').prop('type', type);
            });
        });
	</script>
	
<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="loggin-form">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-7">
				<div class="tab" role="tabpanel">
					
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"><?php echo $data['SIGN_IN']?></a></li>
						<li role="presentation" class="active" ><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $data['SIGN_UP']?></a></li>
					</ul>
					
					<!-- Tab panes -->
					<div class="tab-content tabs">
						<div role="tabpanel" class="tab-pane fade" id="Section1">
							<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" role="form" class="form-horizontal">

								<!--Login-->
								<div class="form-group">
									<label for="InputLogin"><?php echo $data['LOGIN']?></label>
									<input type="text" name="userLogin" class="form-control"  id="InputLogin" placeholder="<?php echo $data['LOGIN_PH']?>" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['NAMEVALUE']?>" />
								</div>
								
								<!--Pass-->
								<div class="form-group">
								<label for="InputPassword"><?php echo $data['PSWD']?></label>
									<div class="input-group">
									<input type="password" name="userPswd" class="form-control" id="InputPassword" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" placeholder="<?php echo $data['PSWD_PH']?>"  />
										<div class="input-group-addon" id="s-h-pass-auth"><span class="glyphicon glyphicon-eye-open" title="Показать пароль"></span></div>
									</div>
								</div>
								<?php if ($Errors['AUTHERROR']!='')
									{
										echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$Errors['AUTHERROR'].'</p><br />';
									} 
								?>

								<!--Keep sign in-->
								<div class="form-group">
									<div class="main-checkbox">
										<input value="None" id="checkbox1" name="check" type="checkbox">
										<label for="checkbox1"></label>
									</div>
									<span class="text"><?php echo $data['KEEP']?></span>
						
								</div>

								<!--doLogin-->
								<div class="form-group">
									<input type="submit" name="doLogin" value="<?php echo $data['LOG_IN']?>" class="btn btn-my btn-default"/>
								</div>

								<!--Fogot pass-->
								<div class="form-group forgot-pass">
									<!--NEW-->
									<button type="submit" class="btn btn-my btn-default btn-submit"><?php echo $data['FP']?></button>
								</div>

							</form>
							<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" role="form" class="form-horizontal">
								<!--English-->
								<div class="form-group">
									<input type="submit" name="EngLang" value="<?php echo $data['ENG_L']?>" class="btn btn-lang-eng btn-success"/>
									<input type="submit" name="RuLang" value="<?php echo $data['RU_L']?>" class="btn btn-lang-ru btn-info"/>
								</div>
							</form>
						</div> <!--end tabpanel1-->
		
						<div role="tabpanel" class="tab-pane fade in active" id="Section2">
							<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			
								<!--Login-->
								<div class="form-group">
									<label for="InputLogin"><?php echo $data['LOGIN']?></label> 
									<input type="text"  name="userLogin" class="form-control" placeholder="<?php echo $data['LOGIN_PH']?>" id="InputLogin" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['LOGINVALUE']?>"/>
									<?php if ($Errors['LOGINERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$Errors['LOGINERROR'].'</p>';
										} 
									?>
								</div>

								<!--UserName-->
								<div class="form-group">
									<label for="InputUserName"><?php echo $data['NAME']?></label>
									<input type="text" id="InputUserName" name="userName" class="form-control" placeholder="<?php echo $data['NAME_PH']?>" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['NAMEVALUE']?>"/>
									<?php if ($Errors['NAMEERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$Errors['NAMEERROR'].'</p>';
										} 
									?>
									
								</div>
									
								<!--UserLastName-->
								<div class="form-group">
									<label for="InputUserLastName"><?php echo $data['LASTNAME']?></label>
									<input type="text" id="InputUserLastName" name="userLastName" class="form-control" placeholder="<?php echo $data['LASTNAME_PH']?>" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['LASTNAMEVALUE']?>"/>
									<?php if ($this->model['LASTNAMEERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$this->model['LASTNAMEERROR'].' </p>';
										} 
									?>
								</div>
									
								<!--userEmail-->	
								<div class="form-group">
									<label for="InputEmail"><?php echo $data['EMAIL']?></label>
									<input type="text" id="InputEmail" name="userEmail" class="form-control" placeholder="<?php echo $data['EMAIL_PH']?>" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['EMAILVALUE']?>" />
									<?php if ($this->model['EMAILERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$this->model['EMAILERROR'].'</p>';
											
										} 
									?>
								</div>
									
								<!--userPhone-->	
								<div class="form-group">
									<!--NEW-->
									<label for="InputPhone"><?php echo $data['PHONE']?></label>
									<input type="tel" id="InputPhone" name="userPhone" class="form-control" placeholder="<?php echo $data['PHONE_PH']?>" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" value="<?=$this->model['PHONEVALUE']?>"/>
									<?php if ($this->model['PHONEERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$this->model['PHONEERROR'].' </p>';
										} 
									?>
								</div>
									
								<!--userPswd-->	
								<div class="form-group">
									<label for="InputUserPswd"><?php echo $data['PSWD']?></label><!--abcABC123$-->
									<div class="input-group">
										<input type="password" id="InputUserPswd" name="userPswd" class="form-control" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" placeholder="<?php echo $data['PSWD_PH']?>" />
										<div class="input-group-addon" id="s-h-pass"><span class="glyphicon glyphicon-eye-open" title="Показать пароль"></span></div>
									</div>
									<?php if ($this->model['PSWDERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$this->model['PSWDERROR'].' </p>';
										} 
									?>
								</div>
									
								<!--userConfPswd-->	
								<div class="form-group">
									<label for="InputUserPswd"><?php echo $data['CONFPSWD']?></label>
									<input type="password" id="InputConfUserPswd" name="userConfPswd" class="form-control" required oninvalid="this.setCustomValidity('<?php echo $data['RECUIRED']?>')" oninput="setCustomValidity('')" placeholder="<?php echo $data['CONFPSWD_PH']?>" />
									<?php if ($this->model['CONFPSWDERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$this->model['CONFPSWDERROR'].' </p>';
										} 
									?>
									
								</div>
								
								<div class="form-group">
									<input type="file" name="file" id="file" class="file-select"/>
									<label for="file"><i class="fa fa-arrow-circle-o-up"></i>
									<?php echo $data['FILE']?>
									</label>
									<?php if ($Errors['FILEERROR']!='')
										{
											echo '<p style="color:#F84E5C;font-size: 14px; font-weight: bold; padding: 0 10px;">'.$Errors['FILEERROR'].'</p>';
										} 
									?>
								</div>
								
								<!--doRegister-->		
								<div class="form-group">
									<input type="submit" name="doRegister" value="<?php echo $data['REGBTN']?>" class="btn btn-my btn-default" />
								</div>

							</form>
							<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" role="form" class="form-horizontal">
								<!--English-->
								<div class="form-group">
									<input type="submit" name="EngLang" value="<?php echo $data['ENG_L']?>" class="btn btn-lang-eng btn-success"/>
									<input type="submit" name="RuLang" value="<?php echo $data['RU_L']?>" class="btn btn-lang-ru btn-info"/>
								</div>
							</form>

						</div>

					</div><!--tab-content tabs-->
					<!-- End Tab panes -->
					
				</div>

			</div><!-- /.col-md-offset-3 col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /loggin-form -->

