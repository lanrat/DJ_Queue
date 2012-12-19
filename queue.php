<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="2" >-->
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>DJ Queue</title>
  <script language="javascript" src="ajax_framework.js"></script>
  <script language="JavaScript">
  updateQueue();
  setInterval( "updateQueue();", 2000 );  // 2 seconds
  </script>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<div class="container">

<header class="header clearfix">
<div class="logo">Current Queue</div>
      <nav class="menu_main">
        <ul>
          <li><a href="index.php">Search</a></li>
          <li class="active"><a href="#">Queue</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
      </nav>
</header>

<div class="info">

<div id="update-result"></div>
</div>
<footer class="footer clearfix">
    <div class="copyright">Rock On</div>

    <nav class="menu_bottom">
    <ul>
        <li><a target="_blank" href="https://github.com/mrlanrat/DJ_Queue">Souce</a></li>
        <li><a target="_blank" href="http://vorsk.com">Vorsk</a></li>
    </ul>
    </nav>
</footer>

</div>
</body>
</html>
