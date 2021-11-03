<?php

	header('Content-Type: text/html; charset=utf-8');

	$db = new mysqli("localhost","root","1234","spurs"); 
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>