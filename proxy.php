<?php
header("HTTP/1.1 200 OK");
$url = $_POST['url'];
echo file_get_contents($url);
?>
