<?php
require_once('backup.php');
$fn = "minecraft.zip";
$target = "/srv/maikura/Tea Time";
if(!file_exists($fn) || file_old($fn)) {
	backup($fn, $target);
}
header("Location: /$fn");
exit();
?>
