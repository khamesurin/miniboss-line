<?php
class Main {
function LineNotify() {
    $msg = array();
    $msg[message] = "New Message";
    $token = "rvLOtYHJjxJKVK8JRLZWNkxQ5ILbF5QM5x7hWkQV4mf"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
    return $response = $this->notify_message($msg,$token);
  }
  function notify_message($msg,$token) {
    define('LINE_API',"https://notify-api.line.me/api/notify");
    $queryData = $msg;
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            ."Authorization: Bearer ".$token."\r\n"
            ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    return $result = file_get_contents(LINE_API,FALSE,$context);
  }
}
$main = new Main;
echo $main->LineNotify();
?>
