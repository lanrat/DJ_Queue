<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);

if (@$_GET['action'])
{
    switch ($_GET['action'])
    {
    case "search":
        if (@$_GET['name'])
        {
            $results = $db->search($_GET['name']);
            //print the results
            if (count($results) > 0)
            {
                echo '<ul>';
                foreach ($results as $song)
                {
                    echo '<li><a href="ajax.php?action=add&id='.$song['id'].'" onclick="return confirm(\'Do you really want '.str_replace("'","\'",$song['title']).' by '.str_replace("'","\'",$song['artist']).'?\')" >'.$song['title'].' - '.$song['artist'].'</a></li>';
                }
                echo '</ul>';
            }else{
                echo '<h3>No Songs Found</h3>';
            }
            echo '<pre>';
            echo '</pre>';
        }
        break;
    case "add":
        if (@$_GET['id'])
        {
            $name = 'Guest';
            if (isset($_COOKIE["user"]))
            {
                $name = $_COOKIE["user"];
            }
            $db->addToQueue($_GET['id'],$name);
            header('Location: index.php');
        }
        break;
    case "delete":
        if (@$_GET['id']){
            $db->deleteFromQueue($_GET['id']);
            header( 'Location: queue.php' );
        }
        break;
    case 'queue':
        $mode = $db->getMode();
        $queue = $db->getQueue();
        echo '<h3>Current Mode is '.$mode['name'].'</h3>';
        if (count($queue) > 0)
        {
            echo '<h3>Queue size is '.count($queue).'</h3>';
            echo '<table class="table"><tr><th>Artist</th><th>Song</th><th>Code</th><th>Track</th><th>User</th><th>Action</th></tr>';
            foreach ($queue as $row)
            {
                echo '<tr>';
                echo '<td>'.$row['artist'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['code'].'</td>';
                echo '<td>'.$row['track'].'</td>';
                echo '<td>'.$row['user'].'</td>';
                echo '<td><a href="ajax.php?action=delete&id='.$row['id'].'">Delete</a></td>';
                echo '</tr>';
            }
        }else{
            echo "Queue is empty";
        }
        break;
        case 'size':
            echo 'Current Queue Size is: '.$db->getQueueSize();
            break;
    default:
        echo 'Error!';
    }
}
?>
