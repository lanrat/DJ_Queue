<?php
require_once('config.php');
require_once('database.php');
$db = new DB($host,$database,$user,$pass);

if (@$_POST['action'] == 'import' and @$_FILES['file'])
{
    echo 'Starting Import<br />';
    
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        $handle = fopen($_FILES['file']['tmp_name'],'r');
        if (!$handle)
        {
            echo 'Error opening file<br />';
        }else
        {
            $row = 0;
            $type = $_POST['type'];
            while ($data = fgetcsv($handle))
            {
                if ($row > 0)
                {
                    if (!$db->addSong($type,$data[0],$data[1],$data[2],$data[3]))
                    {
                        echo 'Unable to add song '.$row.' ['.$data[1].']<br />';
                    }
                }
                $row++;
            }
            fclose($handle);
        }
    }

    echo 'Finished Importing '.$row.' songs<br />';
}else{
    echo 'Nothing to Import<br />';
}
?>
<br />
<a href="admin.php">Back</a>
