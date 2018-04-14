<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function nama_depan($str){
		return strtok($str, ' ');
	}
?>