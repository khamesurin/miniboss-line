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
<table width="100%" cellpadding="0">
	<tr>
		<td>Ticker</td>
		<td>Market</td>
		<td>Name</td>
		<td>Last Price</td>
		<td>Change</td>
		<td>24 Hours Vol</td>

	</tr>
<?php            
            foreach($json as $data){

//////////// https://bx.in.th/api/tradehistory/?pairing=1&date=2014-10-21
/*$pairing_id = $data->pairing_id;
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

if($data->change > 0){
	
}elseif($data->change < 0){
	
}else{
	
}
$bg = ($ii++ & 1) ? "#ffffff":"#d9edf7";
?>
<tr bgcolor="<?=$bg;?>">
		<td><?=$data->secondary_currency;?></td>
		<td><?=$data->primary_currency;?></td>
		<td class="name" "><img src="https://d2v7vc3vnopnyy.cloudfront.net/img/coins/<?=$data->secondary_currency;?>.png" align="absmiddle" /> <?=$data->secondary_currency;?></td>
		<td><?=$last_price;?></td>
		<td><?=$data->change;?>%</td>

		<td><?=$data->volume_24hours;?></td>

	</tr>
<?php            	
 
						}
?>
</table>		
<script>
	function reload_one_m(){
		window.location.reload();
	}
	//setInterval(reload_one_m,10000);
</script>

			
