<?php

class DB
{
private $link;

function __construct($host,$database,$user,$pass)
{
    $this->link = mysql_connect($host,$user,$pass);

    if (!$this->link || !mysql_select_db($database))
    {
        die('DB Error');
    }
}

function __destruct()
{
    mysql_close($this->link);
}


function setMode($id)
{
    $id = mysql_escape_string($id);
    if (!$id)
    {
        return false;
    }
    $sql = 'update modes set active = 0';
    if (!mysql_query($sql))
    {
        return false;
    }
    $sql = "update modes set active = 1 where id = $id";
    return mysql_query($sql);
}

function resetQueue()
{
    $sql = "truncate table queue";
    return mysql_query($sql);
}

function deleteAllSongs($type=NULL)
{
    if ($type && $type != "all")
    {
        $type = mysql_escape_string($type);
        $sql = "delete from songs where type = $type";
    }else
    {
        $sql = 'truncate songs';
    }
    return mysql_query($sql);
}


function getMode()
{
    $sql = 'select * from modes where active = 1';
    $arr = $this->arrayQuery($sql);
    return $arr[0];
}


function getQueue()
{
    $sql = "select queue.id, queue.user, songs.artist, songs.title, songs.code, songs.track from queue, songs where queue.song_id = songs.id order by queue.id asc";
    return $this->arrayQuery($sql);
}

function deleteFromQueue($id)
{
    $id = mysql_escape_string($id);
    $sql = "delete from queue where id = $id";
    return mysql_query($sql);
}


function search($name)
{
    $name = mysql_escape_string($name);
    $sql = "select * from songs where ( title COLLATE UTF8_GENERAL_CI LIKE '%$name%' ) or ( artist COLLATE UTF8_GENERAL_CI LIKE '%$name%' )";
    return $this->arrayQuery($sql);
}

function addSong($type,$artist,$title,$code,$track)
{
    $type = mysql_escape_string($type);
    $artist = mysql_escape_string($artist);
    $title = mysql_escape_string($title);
    $code = mysql_escape_string($code);
    $track = mysql_escape_string($track);

    $sql = "INSERT into songs (type,artist,title,code,track) values ($type,$artist,$title,$code,$track)";

    return mysql_query($sql);
}

function getModes()
{
    $sql = 'SELECT * from modes order by active';
    return $this->arrayQuery($sql);
}


private function arrayQuery($sql)
{
    $result = mysql_query($sql);
    if (!$result)
    {
        return;
    }
    $out = array();
    while ($row = mysql_fetch_array($result))
    {
        $out[] = $row;
    }
    return $out;
}


}
?>
