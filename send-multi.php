<?php
$access_token = 'g71f3DlMvXejMozh2QiWtpOWp0FFUvTWfQv+VGnSn0mvj9EpSCFXNakeWFM4XgkpyW3OGyHJ3DXHwuql0FMcaXXdtrphoWkCC+oV+5MpTb7VnA8sDcq2XlI2KHTdJVde4fuacAnvdSBFBcxOLzJ5CgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
//if (!is_null($events['events'])) {
	// Loop through each event
	//foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		//if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			//$url = 'https://api.line.me/v2/bot/message/push';
			$url = 'https://api.line.me/v2/bot/message/multicast';
			$data = [
				'to' => "khamenaja",
				'messages' => "test"
			];
//"to": ["U493a81bb89e58db5f619db64a94f7d08","U97a49f76c0043e0b3d4f81121248cf16","U4155056f90bb4eb8f2bc08fbf0c200d1","U331603b5a1d3ea48b78e7eb00364e196"],		
$name = $_GET['name'];
$set_price = $_GET['set_price'];
$last_price = $_GET['last_price'];
$txt_line = ''.$name.' , Price more than '.$set_price.' To '.$last_price.' ';			
			$post = '{
    "to": ["U97a49f76c0043e0b3d4f81121248cf16","U4155056f90bb4eb8f2bc08fbf0c200d1","U331603b5a1d3ea48b78e7eb00364e196"],
    "messages":[
        {
            "type":"text",
            "text":"'.$txt_line.' "
        }
    ]
}';

/*,
        {
    "type": "image",
    "originalContentUrl": "https://d2v7vc3vnopnyy.cloudfront.net/img/coins/'.$name.'.png",
    "previewImageUrl": "https://d2v7vc3vnopnyy.cloudfront.net/img/coins/'.$name.'.png"
}*/
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			if(2 > 1){
				
			
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
		//}
	//}
//}
echo "OK";
