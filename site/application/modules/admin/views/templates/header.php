<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <?php header("Content-Type: text/html; charset=UTF-8",true) ; ?>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <link rel="stylesheet" href="<?php echo base_url();?>public/template/css/font.css">
		<link href="<?php echo base_url();?>public/template/css/ekattor.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url();?>public/template/js/ekattor.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/template/js/script.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/template/js/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/template/js/mascaras.js" type="text/javascript"></script>
    	<title>Organizacional</title>
    </head>
    <body> 
    <div id="main_body">
	<div class="navbar navbar-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="<?php echo base_url();?>">Assinfor
				</a>
				<!-- the new toggle buttons -->
				<ul class="nav pull-right">
					<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
					<li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
				</ul>
				<div class="nav-collapse nav-collapse-top collapse">
	            	<ul class="nav pull-right">
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
						<!-- Account Selector -->
	                    <ul class="dropdown-menu">
	                    	<li class="with-image">
	                            <div class="avatar">
	                                <img src="<?php echo base_url();?>public/template/images/icons_big/account.png" class="avatar-medium"/>
	                            </div>
	                            <span><?php echo $user_data['nome'];?></span>
	                        </li>
	                    	<li class="divider"></li>
							<li><a href="<?php echo base_url();?>admin/manage_profile">
	                        		<i class="icon-user"></i><span>Editar perfil</span></a></li>

							<li><a href="<?php echo base_url();?>logout">
	                        		<i class="icon-off"></i><span>Sair</span></a></li>
						</ul>
	                	<!-- Account Selector -->
						</li>
					</ul>
	                <ul class="nav pull-right">
						<li class="dropdown">
						<a href="#" ><i class="icon-user"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>