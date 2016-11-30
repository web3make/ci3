<!DOCTYPE html>
<html>
<head>
    <link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" />
	<title>Admin</title>
</head>
<body>
    <div id="login">
        <h2>Form login</h2>
        <form action="<?=base_url();?>auth/login" method="post">
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