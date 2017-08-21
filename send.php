<?php
$access_token = 'g71f3DlMvXejMozh2QiWtpOWp0FFUvTWfQv+VGnSn0mvj9EpSCFXNakeWFM4XgkpyW3OGyHJ3DXHwuql0FMcaXXdtrphoWkCC+oV+5MpTb7VnA8sDcq2XlI2KHTdJVde4fuacAnvdSBFBcxOLzJ5CgdB04t89/1O/w1cDnyilFU=';

$_GET['data'];
			$post = '{
    "to": "U493a81bb89e58db5f619db64a94f7d08",
    "messages":[
        {
            "type":"text",
            "text":"Hello, world Images"
        },
        {
    "type": "image",
    "originalContentUrl": "https://drivesoft.co.th/tutorial/sources/system/line-bot-api/2017-02-13_6-58-39.png?v=0.0.5",
    "previewImageUrl": "https://drivesoft.co.th/tutorial/sources/system/line-bot-api/2017-02-13_6-58-39.png?v=0.0.5"
}
    ]
}';
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

echo "OK";