<?php 

$db = new mysqli('localhost','commander-cliff','173.164.the-PEOPLE','blog_crn0327');

//if error connecting, kill the page
if($db->connect_errno > 0 ){
	die('Unable to connect to the database');
}