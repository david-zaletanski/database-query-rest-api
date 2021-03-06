<?php
/**
 * @Author: dzale
 * @Date:   2015-05-08 01:37:29
 * @Last Modified by:   dzale
 * @Last Modified time: 2015-05-12 03:02:59
 */

// ENABLE ERROR REPORTING
error_reporting(E_ALL);
ini_set('display_errors',1);

require '../Model/Item.class.php';

/**
 * Tests updating an item by it's id.
 */

$item = new Item();
$item->id = 5;
$item->name = "Smart Water";
		$item->manufacturer = "Glaceua";
$item->description = "A very tall, sleek, bottle of water.";
$item->unit_quantity = 33.8;
$item->unit_measure = "FL OZ";

$item_string = json_encode($item);

$ch = curl_init('http://trackula.me/trackmini/api/items');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $item_string);

$result = curl_exec($ch);
echo $result;
curl_close($ch);

?>