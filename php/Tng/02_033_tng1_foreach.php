<?php
	$arr = [
		[
			"id"=>"meerkat1"
			,"pw"=>"php504"
		]
		,[
			"id"=>"meerkat2"
			,"pw"=>"php504"
		]
		,[
			"id"=>"meerkat3"
			,"pw"=>"php504"
		]
	];

//foreach 이렇게 할 필요가 없음...
	foreach($arr as $key => $item){
		foreach($item as $key1=>$item1){
			if($key1=='id'){
				echo $item1."\n";
			}
		}
	};

// 이렇게 해야함
	foreach($arr as $key => $item){
		echo $item['id']."\n";
	}


?>