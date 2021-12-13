<?php
print_r( json_encode(json_decode(file_get_contents($_GET['url']),true)));
?>