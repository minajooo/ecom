<?php

	function pagetitle(){
		global $pagetitle;
		if(isset($pagetitle)){
			echo $pagetitle;
		}else{
			echo "Default";
		}
	};


?>