<?php
//error_reporting(0);
require 'core/core.php';
 
$core = new Core;
$core -> load('core', 'dispatcher') -> run();
?>