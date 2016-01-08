<?php 
$from="from@example.com";
$to="to@example.com";
$content="isi email";
$subject="test";
$name="example";
$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';
$attachment = file_get_contents('file.txt');
$attachment_encoded = base64_encode($attachment); 
$params = array(
"key" => "API_KEY",
"message" => array(
    "html" => $content,
    "text" => $content,
    "to" => array(
    array("email" => $to, "name" => $to)
    ),
    "from_email" => $from,
    "from_name" => $name,
    "subject" => $subject,
    "track_opens" => TRUE,
    "track_clicks" => TRUE,
	"attachments" => array(
        array(
            'content' => $attachment_encoded,
            'type' => "application/txt",
            'name' => 'file.txt',
			)
        ),
),

"async" => FALSE
);
$postString = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
$result = curl_exec($ch);
?>