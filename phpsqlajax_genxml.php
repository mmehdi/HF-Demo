<?php
require_once('db-connector.php');

//header("Content-type: text/xml");

// Start XML file, echo parent node

$animal = getAnimalByTag('UK321331/400646');
$animal = mysql_fetch_assoc($animal);

$owner = getMemberByRefNo($animal['owner']);
$owner=mysql_fetch_assoc($owner);

$breeder = getMemberByRefNo($animal['breeder']);
$breeder=mysql_fetch_assoc($breeder);

echo '<markers>';

var_dump('animal tag_no: '.$animal['tag_no']);
var_dump('owner address: '.$owner['address']);
var_dump('breeder address: '.$owner['address']);

// Iterate through the rows, printing XML nodes for each
/*while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  var_dump($row['name']);
  //echo '<marker ';
  //echo 'name="' . parseToXML($row['name']) . '" ';
    //           echo 'lat="' . $row['lat'] . '" ';
  //echo 'lng="' . $row['lng'] . '" ';
  //echo 'type="' . $row['type'] . '" ';
  //echo '/>';
}*/

// End XML file
echo '</markers>';

?>
<?php

function generateMapData(){

  echo '<markers>';

  var_dump('animal tag_no: '.$animal['tag_no']);
  var_dump('owner address: '.$owner['address']);
  var_dump('breeder address: '.$owner['address']);

  // Iterate through the rows, printing XML nodes for each
  /*while ($row = @mysql_fetch_assoc($result)){
    // ADD TO XML DOCUMENT NODE
    var_dump($row['name']);
    //echo '<marker ';
    //echo 'name="' . parseToXML($row['name']) . '" ';
      //           echo 'lat="' . $row['lat'] . '" ';
    //echo 'lng="' . $row['lng'] . '" ';
    //echo 'type="' . $row['type'] . '" ';
    //echo '/>';
  }*/

  // End XML file
  echo '</markers>';

  return $xml;
}

function parseToXML($htmlStr) { 
  $xmlStr=str_replace('<','&lt;',$htmlStr); 
  $xmlStr=str_replace('>','&gt;',$xmlStr); 
  $xmlStr=str_replace('"','&quot;',$xmlStr); 
  $xmlStr=str_replace("'",'&#39;',$xmlStr); 
  $xmlStr=str_replace("&",'&amp;',$xmlStr); 
  return $xmlStr; 
} 

?>