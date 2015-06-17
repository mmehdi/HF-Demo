<?php

function getDB(){
  $username="happerley";
  $password="happerley";
  $database="happerley_reader";
  $db_url = "localhost:8889";

  // Opens a connection to a MySQL server
    $connection=mysql_connect ($db_url, $username, $password);
    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }

    // Set the active MySQL database
    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    }

    return $db_selected;
}

function fetch($query){
  $db = getDB();
  // Select all the rows in the markers table
  $result = mysql_query($query);
    
    if (!$result) {
      die('Invalid query: ' . mysql_error());
    }
  return $result;
}



function getAnimalByTag($tag_no){
    $query = "SELECT * FROM animal WHERE tag_no='".$tag_no."'";
    $result = fetch($query);

    return $result;
}

function getMemberByRefNo($member_ref){
    $query = "SELECT * FROM member WHERE member_ref='".$member_ref."'";
    $result = fetch($query);

    return $result;
}

?>