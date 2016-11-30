<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="werww" />
    <link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" />
	<title>Admin</title>
</head>
<body>
    <div id="login">
        <h2>Form login</h2>
        <form action="<?=base_url();?>admin/auth" method="post">
            <br />
            <p><input type="text" name="login" value="" class="input" /> : Login</p>
            <br />
            <p><input type="password" value="" name="password" class="input" /> : Password</p>
            <br />
            <input type="submit" value="Submit" id="submit" />
        </form>
    </div>
</body>
</html>