<?php
$access_token = 'g71f3DlMvXejMozh2QiWtpOWp0FFUvTWfQv+VGnSn0mvj9EpSCFXNakeWFM4XgkpyW3OGyHJ3DXHwuql0FMcaXXdtrphoWkCC+oV+5MpTb7VnA8sDcq2XlI2KHTdJVde4fuacAnvdSBFBcxOLzJ5CgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;