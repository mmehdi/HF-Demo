<?php

function getDB(){
  $username="happerley";
  $password="happerley";
  $database="happerley";
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

function getCarcassSheetByID($id){
    $query = "SELECT * FROM carcass_sheet WHERE id='".$id."'";
    $result = fetch($query);

    return $result;
}

function getRestaurantCarcassByID($id){ //internal table id
    $query = "SELECT * FROM restaurant_carcass WHERE id='".$id."'";
    $result = fetch($query);

    return $result;
}

//restaurant info
function getRestaurantByID($id){
    $query = "SELECT * FROM fsa_hygiene_ratings WHERE fshid='".$id."'";
    $result = fetch($query);

    return $result;
}


function getAbbotairByID($id){
    $query = "SELECT * FROM fsa_approved_ungulates_england WHERE app_no='".$id."'";
    $result = fetch($query);

    return $result;
}

function getButcherByID($id){
    $query = "SELECT * FROM fsa_hygiene_ratings WHERE fshid='".$id."'";
    $result = fetch($query);

    return $result;
}

?>