<?php
require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';

/*
$db = get_db();
$db->users->drop();
$db->galery->drop();
exit;
*/

//aspekty globalne
session_start();

//wybór kontrolera do wywo³ania:
$action_url = $_GET['action'];
dispatch($routing, $action_url);