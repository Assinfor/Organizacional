<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<link href="<?php echo base_url();?>public/template/css/ekattor.css" media="screen" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>template/js/ekattor.js" type="text/javascript"></script>
        <title>Login</title>
    </head>
	<body>
        <div id="main_body">
            <div class="navbar navbar-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        
                        <a class="brand" href="<?php echo base_url();?>">
                            Assinfor
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="span4 offset4">
                    <div class="padded">
                        <center>
                            <img src="<?php echo base_url();?>public/uploads/logo.png" style="max-height:100px;margin:20px 0px;" />
                        </center>
                        <div class="login box" style="margin-top: 10px;">
                            <div class="box-header">
                                <span class="title">Login</span>
                            </div>
                            <div class="box-content padded">
                                <?php echo form_open('login/autenticar' , array('class' => 'separate-sections'));?>
                                    <center>
                                        <div style="height:100px;">
                                            <div id="avatar" class="avatar">
                                                <img src="<?php echo base_url();?>public/template/images/icons_big/account.png" class="avatar-big"  id="account_img" style=""/>
                                            </div>
                                        </div>
                                    <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-envelope"></i>
                                        </span>
                                        <input name="email" type="text" autocomplete="off" required/>
                                    </div>
                                    <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-key"></i>
                                        </span>
                                        <input name="senha" type="password" autocomplete="off" required/>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <a  data-toggle="modal" href="#modal-simple"  class="btn btn-blue btn-block" >
                                                Esqueceu a Senha?
                                            </a>
                                        </div>
                                        <div class="span6">
                                            <input type="submit" class="btn btn-gray btn-block "  value="Login"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr />
                        <div style="color:#a5a5a5;">
                        	
                        		<center>&copy; 2014, Sistema Organizacional
                        		</center>
                            
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
        <!-----------password reset form ------>
        <div id="modal-simple" class="modal hide fade" style="top:30%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel"><?php echo get_phrase('reset_password');?></h6>
          </div>
          <div class="modal-body" style="padding:20px;">
            <?php echo form_open('login/reset_password');?>
            	<select class="validate[required]" name="account_type"  style="margin-bottom: 0px !important;">
                    <option value=""><?php echo get_phrase('account_type');?></option>
                    <option value="admin"><?php echo get_phrase('admin');?></option>
                    <option value="teacher"><?php echo get_phrase('teacher');?></option>
                    <option value="student"><?php echo get_phrase('student');?></option>
                    <option value="parent"><?php echo get_phrase('parent');?></option>
                </select>
                <input type="email" name="email"  placeholder="<?php echo get_phrase('email');?>"  style="margin-bottom: 0px !important;"/>
                <input type="submit" value="<?php echo get_phrase('reset');?>"  class="btn btn-blue btn-medium"/>
            <?php echo form_close();?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>
        <!-----------password reset form ------>
	</body>
</html>