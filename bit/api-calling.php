<?php
 $PATH = dirname(__FILE__) . '/';
$COOKIEFILE = $PATH . 'protect/cookies';


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
            curl_setopt($ch, CURLOPT_CAINFO, $PATH . "cacert.pem");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIEFILE);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $COOKIEFILE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 120);

            curl_setopt($ch, CURLOPT_URL, 'https://bx.in.th/api/');
            $data = curl_exec($ch);
            
            $json = json_decode($data);



?>

<?php            
foreach($json as $data){
$pairing_id = $data->pairing_id;
$secondary_currency = $data->secondary_currency;

 

//////////// https://bx.in.th/api/tradehistory/?pairing=1&date=2014-10-21
/*
$data_now = date('Y-m-d');
$ch1[$pairing_id] = curl_init();
            curl_setopt($ch1[$pairing_id], CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($ch1[$pairing_id], CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
            curl_setopt($ch1[$pairing_id], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch1[$pairing_id], CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch1[$pairing_id], CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
            curl_setopt($ch1[$pairing_id], CURLOPT_CAINFO, $PATH . "cacert.pem");
            curl_setopt($ch1[$pairing_id], CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch1[$pairing_id], CURLOPT_COOKIEJAR, $COOKIEFILE);
            curl_setopt($ch1[$pairing_id], CURLOPT_COOKIEFILE, $COOKIEFILE);
            curl_setopt($ch1[$pairing_id], CURLOPT_HEADER, 0);
            curl_setopt($ch1[$pairing_id], CURLOPT_TIMEOUT, 120);
            curl_setopt($ch1[$pairing_id], CURLOPT_URL, 'https://bx.in.th/api/tradehistory/?pairing='.$pairing_id.'&date='.$data_now);
            $datas = curl_exec($ch1[$pairing_id]);
            $jsons = json_decode($datas);*/


$last_price_ex =  explode("E-",$data->last_price);
//echo count($last_price_ex);
if(count($last_price_ex) > 1){
	$fnumber = explode(".",$last_price_ex[0]);
	$fullnumber = $fnumber[0].$fnumber[1];
	$last_n = $last_price_ex[1] - 1;
	$zero = "";
	for($i = 1; $i <= $last_n; $i++){
		$zero .= "0";
	}
	$last_price = "0.".$zero.$fullnumber;
}else{
	$last_price = $data->last_price;
}

$arr_id[$secondary_currency] = $data->pairing_id;
$arr_last[$secondary_currency] = $last_price;
$arr_change[$secondary_currency] = $data->change;

//secondary_currency primary_currency change volume_24hours

$all_name .= $secondary_currency." ";
?>

<?php            	
 
						}

if($_GET[name]){
	$name_api = strtoupper($_GET[name]);
	if($arr_id[$name_api] > 0){
		echo "Lasted : ".$arr_last[$name_api];
		echo "\r\nChange : ".$arr_change[$name_api]." %";
		echo "<br />";
		echo "รายการอื่น ๆ \r\n";
		echo $all_name;
		
	}else{
		echo "Not Found This Name :: ".$name_api;
	}
	
}else{
	echo "Name Empty Please Input Name !!!";
}

?>



			
