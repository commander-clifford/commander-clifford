<?php 

$db = new mysqli('localhost','commander-cliff','173.164.the-PEOPLE','diyeld-trails');

//if error connecting, kill the page
if($db->connect_errno > 0 ){
	die('Oops, Unable to connect to the database');
}