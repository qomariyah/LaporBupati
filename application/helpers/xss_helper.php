<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function p($str){
	    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
?>

