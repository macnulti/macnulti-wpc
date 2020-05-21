<?php
$uriParsed = preg_replace('/\//', ' ', $_SERVER['REQUEST_URI']);
header("HTTP/1.1 301 Moved Permanently");
header("Location: " . get_site_url() . '?s=' . $uriParsed);
exit();