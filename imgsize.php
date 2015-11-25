<?php
$fname = $_GET['fname'];
list($width, $height, $type, $attr)  = getimagesize( $fname );
echo '{ "w": ' . "$width" . ', "h": ' . "$height" . ' }';
?>
