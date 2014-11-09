<?php
header('Content-Type', 'text/html;charset=utf-8');

var_dump($_POST);
$jsonStr = isset($_POST['str']) ? $_POST['str'] : null;

if (empty($jsonStr)) {
	echo '请输入需要转换的JSON';
	die();
}

$rs = json_decode($jsonStr, true);

if ($rs === NULL) {
	echo 'JSON解析失败'; 
} else {
	var_dump($rs);
}