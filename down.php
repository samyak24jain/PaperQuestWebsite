<?php

$filepath = urldecode($_GET['file']);
$filename = basename($filepath);
$ext = explode( '.' , $filename);
$ext = $ext[1];

function download ($filepath, $filename, $ext) {
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header("Content-Type: image/$ext");
    header('Content-Length: ' . filesize($filepath));
    header('Content-Description: File Transfer');
    header("Content-Transfer-Encoding: binary");
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Expires: 0');
    ob_clean();
    readfile($filepath);
    exit();
}

download($filepath, $filename, $ext);

?>