<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);
$qSize = $db->getQueueSize();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>DJ Queue</title>
  <script language="javascript" src="ajax_framework.js"></script>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

<div class="container">

<header class="header clearfix">
<div class="logo">Song Search Engine</div>
</header>

<div class="info">
<div>Current queue Size: <?php echo $qSize; ?></div>

<form id="searchForm" name="searchForm" method="post" action="javascript:insertTask();">
<div class="searchInput">
<input name="searchq" type="text" id="searchq" size="30" onkeyup="javascript:searchNameq()"/>
<input class="button" type="button" name="submitSearch" id="submitSearch" value="Search" onclick="javascript:searchNameq()"/>
</div>
</form>

<h3>Results</h3>
<div id="msg">Type something into the input field</div>
<div id="search-result"></div>
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
