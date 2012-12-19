<?php
//delete existing user cookie
setcookie("user", "", time()-3600);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>DJ Queue Login</title>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<div class="container">

<header class="header clearfix">
<div class="logo">User Login</div>
      <nav class="menu_main">
        <ul>
          <li><a href="index.php">Search</a></li>
          <li class="active"><a href="#">Logout</a></li>
        </ul>
      </nav>
</header>

<div class="info">
<p>You appear to be new here. Please enter the name you would like to go by below to login and select a song.</p>


<form  method="post" action="index.php">
<input name="user" type="text" id="user" size="25"/>
<input class="button" type="submit" value="Login"/>
</form>


</div>

<footer class="footer clearfix">
    <div class="copyright">Rock On</div>

    <nav class="menu_bottom">
    <ul>
        <li><a target="_blank" href="http://vorsk.com">Vorsk</a></li>
    </ul>
    </nav>
</footer>

</div>
</body>
</html>