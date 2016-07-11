<?php

	if($commentRow[$i][2] == 1){
		echo "【〇】";
	}else if($commentRow[$i][2] == 2){
		echo "【△】";
	}else{
		echo "【☓】";
	}

?>