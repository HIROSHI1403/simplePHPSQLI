<?php

require_once 'newfunction.php';

echo '<p>google.com</p>';

$result = RUN_SQLI_DEFAULTLOGIN('SELECT * FROM test_table');
if (!$result){
	echo 'no result';
}else {
	while ($row = $result->fetch_assoc()){
		echo <<<EOT
			<p>{$row['id']}</p>
			<p>{$row['name']}</p>
EOT;
	}
}