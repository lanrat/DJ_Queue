<?php
include('dbconnection.php');
$searchq = $_GET['searchq'];
$getName_sql = 'SELECT * FROM USER
    WHERE name LIKE "%' . $searchq .'%"
    $getName = mysql_query($getTask_sql);
$total = mysql_num_rows(getTask);

while ($row = mysql_fetch_array($getName)) {
    echo $row.name . '<br/>';
}
?>
