<?php
    $db = new mysqli;
    $db->connect('localhost','root','anacardoVolante','crud');
    if (!$db) {
    	echo "success";
    }
?>