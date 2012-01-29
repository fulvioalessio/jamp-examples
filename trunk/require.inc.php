<?php

// local debug configuration
$conn = dirname(__FILE__).'/conf/conn.inc.php';
if (file_exists($conn)) {
	define('_JAMP_SETTING_', dirname(__FILE__).'/conf/setting.inc.php');
	define('_JAMP_CONNECTIONS_', $conn);
}

require(dirname(__FILE__).'/../jamp.inc.php');
?>