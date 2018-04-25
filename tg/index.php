<?php 
	
// initialise variables here
//$chat_id = 101083185;
// path to the picture, 

$token = "414115110:AAFvOsCYIfZ47EyVzjrcIVCaFX5mrg4-ZlU";

$data = [
    'text' => 'your message here',
    'chat_id' => '123311411'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
?>