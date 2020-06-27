<?php

function pr($string){
	 echo "<pre>";
	 print_r($string);
	 echo "</pre>";
}

function clean($string) {
   $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '-', strtolower($string)); // Removes special chars.
}

function classes_type() {
   return array('I'=>'I','II'=>'II','IV'=>'IV','V'=>'V','VI'=>'VI','VII'=>'VII','VIII'=>'VIII','IX'=>'IX','X'=>'X','XI'=>'XI','XII'=>'XII');
}

function sections() {
   return array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E');
}

function salutation() {
   return array('Mr'=>'Mr.','Miss'=>'Miss.','Mrs'=>'Mrs.','Dr'=>'Dr.','Pro'=>'Pro.','Adv'=>'Adv.','Er'=>'Er.');
}

function subjects() {
   return array('2+1'=>'2+1','1+2'=>'1+2','2+2'=>'2+2','2+3'=>'2+3','1+1'=>'1+1','1+1+1'=>'1+1+1');
}


function DateFormates($date,$seperator) {
	if(!empty($date)){
		$dt = explode($seperator,$date);
		try{
			return $dt[2].'-'.$dt[1].'-'.$dt[0];
		}catch (Exception $ex) {
			die($ex->getMessage());
		}
		
	}else{
		die('DateFormates errors');
	}
}

function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}

function upload_path()
{
	if(is_localhost())
		$path = public_path().'/upload/';
	else 
		$path = public_path().'/upload/';
	return $path;
}

function src_path()
{
	if(is_localhost())
		$path = "http://localhost/pcs/public/upload/";
	else 
		$path = "http://admin.pcskhalispur.com/public/upload/";
	return $path;
}

function getBitlyAPI($longurl, $login, $apikey) {
	$url = 'http://api.bitly.com/v3/shorten?login='.$login.'&apiKey='.$apikey.'&longUrl='.$longurl.'&format=json&history=1';
	//$url = "http://api.bit.ly/shorten?version=2.0.1&longUrl=$longurl&login=$login&apiKey=$apikey&format=json&history=1";
	$s = curl_init();
	curl_setopt($s, CURLOPT_URL, $url);
	curl_setopt($s, CURLOPT_HEADER, false);
	curl_setopt($s, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($s);
	curl_close($s);

	$obj = json_decode($result, true);
	return $obj;
}