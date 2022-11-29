<?php
function backup($fn, $target) {
	// Uses unix available zip because easy to write
	$out_dir = "/srv/backfans";
	$backup_command="zip -r \"$out_dir/$fn\" \"$target\"";
	exec($backup_command);
}
function file_old($fn, $exp_time=2*24*3600){
	return time()-filemtime($fn) > $exp_time;
}
?>
