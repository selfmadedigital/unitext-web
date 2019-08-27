<?php
$mysqli = new mysqli("w1kr9ijlozl9l79i.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "noqegorlfezm7yyt", "ger6tv16a6w6meaa", "tohn37uf3jlm1u2r");
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	mysqli_set_charset($mysqli,"utf8");


	$lang = 'sk';
	$captcha_lang = 'sk';
	// $uri = explode('.',$_SERVER['HTTP_HOST']);
	// foreach ($uri as $uripart) {
	// 	if($uripart == 'sk' || $uripart == 'cz'){
	// 		$lang = $uripart;
	// 		if($lang == 'cz'){
	// 			$captcha_lang = 'cs';
	// 		}else{
	// 			$captcha_lang = $lang;
	// 		}
	// 	}
	// }

	$content = array();

	if ($result = $mysqli->query("SELECT section, content FROM contents WHERE lang = '".$lang."'")) {
	    while ($obj = $result->fetch_object()) {
	        $content[$obj->section] = $obj->content;
	    }
	    
	    $result->close();
    }

    

	function get_translated_content($content, $section){
		if(array_key_exists($section, $content)){
			return html_entity_decode(htmlspecialchars_decode($content[$section]));
		}else{
			return "";
		}
	}

	function get_pretty_price($price){
		$price_arrray = explode('.',strval($price));
		if($price_arrray[1] == '00'){
			$price = intval($price_arrray[0]);
		}
		return $price;
    }
    

	function startsWith ($string, $startString) { 
    	$len = strlen($startString); 
		return (substr($string, 0, $len) === $startString); 
	} 
    ?>
