<?php
$access_token = 'fpa1zz94JHdL7tHC6ORnkGlBf7sEPhhaNK8yhhEDmoryMhF98D/oU5ZvlwGDpqOedR7UY/x17SWndArUxlTiBQykqWuwZRC10hqiqxkUUrLt3UJXRJHmiPx5oNvinVF+yYpuqlsMt+H/338Ub0MxwQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;