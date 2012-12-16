<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);

if (@$_POST['action'])
{
    switch ($_POST['action'])
    {
    case "mode":
        $db->setMode($_POST['mode']);
        break;
    case "rm_songs":
        $db->deleteAllSongs($_POST['type']);
        break;
    case "empty_queue":
        $db->resetQueue();
        break;
    }
}

$mode = $db->getMode();
$modes = $db->getModes();
?>

    <h3>Change Mode [<?php echo $mode['name']; ?>]</h3>
<form action="admin.php" method="post">
<input type="hidden" name="action" value="mode"/>
<select name="mode">
<?php
foreach($modes as $mode)
{
    echo '<option value="'.$mode['id'].'">'.$mode['name'].'</option>';
}
?>
</select>
<input type="submit" />
</form>

<br />


<h3>Remove Songs</h3>
<form action="admin.php" method="post">
<input type="hidden" name="action" value="rm_songs"/>
<select name="type">
<option value="all">All</option>
<?php
foreach($modes as $mode)
{
    echo '<option value="'.$mode['id'].'">'.$mode['name'].'</option>';
}
?>
</select>
<input type="submit" />
</form>

<br />


<form action="admin.php" method="post">
<input type="hidden" name="action" value="empty_queue"/>
<input type="submit" value="Empty Queue" />
</form>

<br />


