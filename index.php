<?php
$access_token = 'g71f3DlMvXejMozh2QiWtpOWp0FFUvTWfQv+VGnSn0mvj9EpSCFXNakeWFM4XgkpyW3OGyHJ3DXHwuql0FMcaXXdtrphoWkCC+oV+5MpTb7VnA8sDcq2XlI2KHTdJVde4fuacAnvdSBFBcxOLzJ5CgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		
		
		
		
		
		
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			
			
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
//////////// Call API
			$PATH = dirname(__FILE__) . '/';
			$COOKIEFILE = $PATH . 'protect/cookies';
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
      $result = curl_exec($chLine[$pairing_id]);
			curl_close($chLine[$pairing_id]);
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text.$result.$urlLine
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";