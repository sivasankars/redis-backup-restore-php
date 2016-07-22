<?php
include_once ("config.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'Export') {
	$i = 0;
	$json = array();
	foreach($redis->keys('*') as $key) {
		$data = array();
		$data['key'] = $key;
		$data['ttl'] = $redis->ttl($key);
		$data['value'] = bin2hex($redis->dump($key));
		$json[$i] = $data;
		$i++;
	}
	header('Content-disposition: attachment; filename=database.json');
	header('Content-type: application/json');
	echo json_encode($json);
} else {
	header("Location: /");
	die();
}
?>