<?php
// 버블 정렬

//for
	$arr=[5,34,3,2,3,3,6,7,12];
	$count = count($arr);
	for($z=0; $z<=$count-1; $z++){
		for($i=0; $i<=$count-2-$z; $i++){
			if($arr[$i]>$arr[$i+1]){
				$tmp=$arr[$i];
				$arr[$i] = $arr[$i+1];
				$arr[$i+1] = $tmp;
			}
		}
	}
	print_r($arr);

//while
	$arr=[5,34,3,2,3,3,6,7,12];
	$count = count($arr);
	$i=0;
	while($i<=$count-1){
		$z=0;
		while($z<=$count-2-$i){
			if($arr[$z]>$arr[$z+1]){
			$tmp=$arr[$z];
			$arr[$z] = $arr[$z+1];
			$arr[$z+1] = $tmp;
			}
		$z++;
		}
	$i++;
	}
	
	print_r($arr);
	
?>