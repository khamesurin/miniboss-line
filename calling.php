<?php
$PATH = dirname(__FILE__) . '/';
			// Get text sent
			$text = 'btc';
			// Get replyToken
			$replyToken = $event['replyToken'];
//////////// Call API
			$pairing_id = 1;
			$urlLine = "https://miniboss-line.herokuapp.com/bit/api-calling.php?name=".$text;
			$chLine[$pairing_id] = curl_init();
      curl_setopt($chLine[$pairing_id], CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($chLine[$pairing_id], CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
      curl_setopt($chLine[$pairing_id], CURLOPT_RETURNTRANSFER, true);
      curl_setopt($chLine[$pairing_id], CURLOPT_SSL_VERIFYPEER, true);
      curl_setopt($chLine[$pairing_id], CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
      curl_setopt($chLine[$pairing_id], CURLOPT_CAINFO, $PATH . "cacert.pem");
      curl_setopt($chLine[$pairing_id], CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($chLine[$pairing_id], CURLOPT_COOKIEJAR, $COOKIEFILE);
      curl_setopt($chLine[$pairing_id], CURLOPT_COOKIEFILE, $COOKIEFILE);
      curl_setopt($chLine[$pairing_id], CURLOPT_HEADER, 0);
      curl_setopt($chLine[$pairing_id], CURLOPT_TIMEOUT, 120);
      curl_setopt($chLine[$pairing_id], CURLOPT_URL, $urlLine);
      echo $result = curl_exec($chLine[$pairing_id]);
			curl_close($chLine[$pairing_id]);