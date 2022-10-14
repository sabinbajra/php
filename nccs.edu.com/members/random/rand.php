<?php
// En: Begin PHP Code / Fr: Debut code PHP
/*******************************************************************************/
// Necessary Variables:

$RANDOM_IMG_FILE = "random/rand_images.txt";
	// En: Absolute path and name to file contain image URL location.

// End  Necessary Variables section
/******************************************************************************/

srand((double)microtime()*1000000);

if (file_exists($RANDOM_IMG_FILE)) {
	$arry = file($RANDOM_IMG_FILE);
		// En: load file.

	for($i = 0; $i < sizeof($arry) ; $i++) {
		if (preg_match("/\w+/", $arry[$i]))
			$good_arry[$j++] = chop($arry[$i]);
			# PHP 4.0 arry_push ($good_arry, $arry[$i]);
	}

	$randval = rand(0, sizeof($good_arry) -1);
	$html_result = "<IMG SRC=\"$good_arry[$randval]\">";
}
// En: End PHP Code
?>

<CENTER>
	<?php echo $html_result ?>
</CENTER>


