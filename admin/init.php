<?php
	
	//DB CONNECT
	include "connect.php";


	//ROUTES

		$css	=	"layout/css/";
		$js		=	"layout/js/";
		$tpl    =   "includes/templates/";
		$func   =   "includes/functions/";


	//templates

		include $func."functions.php";
		include	$tpl."header.php";

		//Navbar Include

		if(!isset($nonavbar)){include $tpl.'navbar.php';};