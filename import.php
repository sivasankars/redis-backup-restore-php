<?php
include_once ("config.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'Import') {
	$types = array(
		'application/json',
		'application/octet-stream'
	);
	if (in_array($_FILES['upload']['type'], $types)) {
		var_dump($_FILES);
		if (move_uploaded_file($_FILES['upload']['tmp_name'], 'uploads/' . $_FILES['upload']['name']))
			{
			$file = file_get_contents('uploads/' . $_FILES['upload']['name'], "r");
			$database = json_decode($file, true);
			foreach($database as $data)
				{
				if ($data['ttl'] >= 0)
					{
					$data['ttl'] = $data['ttl'];
					}
				  else
					{
					$data['ttl'] = 0;
					}

				if ($data['key'] && $data['value'] && !$redis->exists($data['key']))
					{
					$redis->restore($data['key'], $data['ttl'], hex2bin($data['value']));
					}
				}
			}
		}
}

header("Location: /");
die();
?>
