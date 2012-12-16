<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);
$mode = $db->getMode();

if (@$_GET['action'] == 'delete' && @$_GET['delete'])
{
    $db->deleteFromQueue($_GET['delete']);
}
$queue = $db->getQueue();

?>
<h3>Current Mode is <?php echo $mode['name']; ?></h3>
<h3>Queue size is <?php echo count($queue); ?></h3>

<?php
if (count($queue) > 1)
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
    echo '<td><a href="queue.php?action=delete&delete='.$row['id'].'">Delete</a></td>';
    echo '</tr>';
}
}else
{
    echo 'Queue is empty';
}
?>
