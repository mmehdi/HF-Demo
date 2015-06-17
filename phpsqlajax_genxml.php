<?php
require_once('db-connector.php');


$restaurant_carcass = getRestaurantCarcassByID(1);
$restaurant_carcass = mysql_fetch_assoc($restaurant_carcass);

$restaurant = getRestaurantByID($restaurant_carcass['restaurant_id']);
$restaurant=mysql_fetch_assoc($restaurant);

$carcass_sheet = getCarcassSheetByID($restaurant_carcass['carcass_id']);
$carcass_sheet = mysql_fetch_assoc($carcass_sheet);

$animal = getAnimalByTag($carcass_sheet['tag_no']);
$animal = mysql_fetch_assoc($animal);

$owner = getMemberByRefNo($animal['owner']);
$owner=mysql_fetch_assoc($owner);

$breeder = getMemberByRefNo($animal['breeder']);
$breeder=mysql_fetch_assoc($breeder);

$abbotair = getAbbotairByID($carcass_sheet['abattoir_id']);
$abbotair=mysql_fetch_assoc($abbotair);

$butcher = getButcherByID($carcass_sheet['butcher_id']);
$butcher=mysql_fetch_assoc($butcher);



//var_dump('animal tag_no: '.$animal['tag_no']);
//var_dump('owner address: '.$owner['address']);
//var_dump('breeder address: '.$owner['address']);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
 //add producer

//add restaurant
  echo '<marker ';
  $address = $restaurant['address_line_one'].','.$restaurant['address_line_two'].','.$restaurant['address_line_three'].','.$restaurant['address_line_four'].','.$restaurant['postcode'];
  echo 'name="' . parseToXML($restaurant['business_name']) . '" ';
  echo 'address="' . parseToXML($address) . '" ';
  echo 'lat="' . $restaurant['latitude'] . '" ';
  echo 'long="' . $restaurant['longitude'] . '" ';
  echo 'type= "'."Restaurant".'"';
  echo '/>';

//add butcher
  echo '<marker ';
  $address = $butcher['address_line_one'].','.$butcher['address_line_two'].','.$butcher['address_line_three'].','.$butcher['address_line_four'].','.$butcher['postcode'];
  echo 'name="' . parseToXML($butcher['business_name']) . '" ';
  echo 'address="' . parseToXML($address) . '" ';
  echo 'lat="' . $butcher['latitude'] . '" ';
  echo 'long="' . $butcher['longitude'] . '" ';
  echo 'type= "'."Butcher".'"';
  echo '/>';

//add animal owner
  echo '<marker ';
  echo 'name="' . parseToXML($owner['name']) . '" ';
  echo 'address="' . parseToXML(substr($owner['address'], 1)) . '" ';
  echo 'lat="' . $owner['lat'] . '" ';
  echo 'long="' . $owner['long'] . '" ';
  echo 'type= "'."Producer".'"';
  echo '/>';

  echo '<marker ';
  echo 'name="' . parseToXML($abbotair['business_name']) . '" ';
  echo 'address="' . parseToXML($abbotair['town_region']) . '" ';
  echo 'lat="' . "51.864245" . '" ';
  echo 'long="' . "-2.238156" . '" ';
  echo 'type= "'."Abbotair".'"';
  echo '/>';

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