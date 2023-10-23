<?php
	// for($i=19; $i<=19; $i++) {
	// 	for($t=1; $t<10; $t++){
	//		$res = $i*$t;
	// 		echo "{$i} * {$t} = {$res}"."\n";
	// 	}
	// }
	//

	// for($i=1; $i<=9; $i++){
	// 	echo "19 * {$i} =".(19*$i)."\n";
	// }

	$t=0;
	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

	while(true) {
		$t++;
		if($t==10) {
			break;
		}
		$txt = "19 * $t = ".(19*$t)."\n";
		fwrite($myfile, $txt);
	}
	fclose($myfile);
?>