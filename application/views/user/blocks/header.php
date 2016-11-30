<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>css/style.css" media="screen" />
<title>My.Blog</title>
</head>
<body>
    <div id="header">
        <div id="header_left">
            <h1><a href="<?=base_url();?>"><?=@$settings[0]->value;?></a></h1>
        </div>
    
        <div id="header_right">
		<?php if(!$this->session->userdata('id_user')):?>
			<a href="<?=base_url();?>auth/login">Login</a>
			<a href="<?=base_url();?>auth/reg">Registration</a>
		<?php else:?>
			<a href="<?=base_url();?>auth/logout">Logout</a>
		<?php endif;?>
        </div>
    </div>