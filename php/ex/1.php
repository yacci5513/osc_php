<?php

	$x=1;
	$max=5;

	while($x<=$max) {
		$y=1;
		$z=1;
		while($y<=$max-$x) {
			echo " ";
			$y++;
		}
		while($z<=$x) {
			echo "*";
			$z++;
		}
		$x++;
		echo "\n";
	}
	
	$x=1;
	$max=5;
	while($x<=$max) {
		$y=1;
		while($y<=$max) {
			if($y<=$max-$x) {
				echo " ";
			} else {
				echo "*";
			}
			$y++;
		}
		$x++;
		echo "\n";
	}
?>