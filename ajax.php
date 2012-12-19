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
            $name = 'BOB';
            $db->addToQueue($_GET['id'],$name);
            header('Location: index.php');
        }
        break;
    case "delete":
        if (@$_GET['delete']){
            $db->deleteFromQueue($_GET['delete']);
            header( 'Location: queue.php' );
        }
        break;
    case 'queue':
        $queue = $db->getQueue();
        if (count($queue) > 0)
        {

        }else{
            echo "Queue is empty";
        }
        break;
    default:
        echo 'Error!';
    }
}
?>
