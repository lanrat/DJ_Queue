<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);
$mode = $db->getMode();

$queue = $db->getQueue();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="2" >
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
<div class="logo">Current Queue</div>
</header>

<div class="info">

<h3>Current Mode is <?php echo $mode['name']; ?></h3>
<h3>Queue size is <?php echo count($queue); ?></h3>

<?php
if (count($queue) > 0)
{ ?>
<table>
<tr>
<th>Artist</th>
<th>Song</th>
<th>Code</th>
<th>Track</th>
<th>User</th>
<th>Action</th>
</tr>
<?php
foreach ($queue as $row)
{
    echo '<tr>';
    echo '<td>'.$row['artist'].'</td>';
    echo '<td>'.$row['title'].'</td>';
    echo '<td>'.$row['code'].'</td>';
    echo '<td>'.$row['track'].'</td>';
    echo '<td>'.$row['user'].'</td>';
    echo '<td><a href="ajax.php?action=delete&delete='.$row['id'].'">Delete</a></td>';
    echo '</tr>';
}
}else
{
    echo 'Queue is empty';
}
?>
</div>
</div>
</body>
</html>
