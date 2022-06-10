<?php

namespace App\Repository;

class PushNotification{
    public function sendNotification($id, $title, $body, $img, $url, $topic)
	{

		OneSignal::sendNotificationToAll(
			$title,
			$url, 
			null, 
			null, 
			null,
			$body,
			$body
		);

		// $API_KEY = 'AAAAXvTNHyI:APA91bFYgPxJF-95i9tl65O7Jlm-E8gOkwFsHQtLv6rkRc47M5od-M1hBucR-TeRKlPP1Bp1UIxQGvyISdIseFkvsgZ-SpJ63hF8p4jTozNsAnHQ9PaPleL04EiuNRgBM95C3iRQkBEy';
		
        // $data = array(
		// 		'id' => $id,
		// 		'img_url' => $img,
		// 		'volume' => '3.21.15',
		// 		// 'android' => $android,
		// 	);
			
		// $notif = array
		// (
		// 	"click_action" => "FLUTTER_NOTIFICATION_CLICK",
		// 	"color" => "#f45342",
		// 	"sound" => "default"
		// );
	
		// $android = array
		// (
		// 	"ttl" => "4500s",
		// 	"notification" => $notif
		// );

		// $header = array
		// (
		// 	"TTL" => "4500",
		// );

		// $web_push = array
		// (
		// 	"headers" => $header,
		// );

		// $header_apns = array
		// (
		// 	"apns-expiration" => "1604750400",
		// );

		// $apns = array
		// (
		// 	"headers" => $header_apns,
		// );

		// $action = $url;
		// // if($topic == "news"){
		// // 	$action = "FLUTTER_NOTIFICATION_CLICK";
		// // } else {
		// // 	$action = $url;
		// // }

		// $msg = array(
		// 			'title' => $title,
		// 			'body' => $body,
		// 			"icon" => $img,
		// 			"requireInteraction" => "true",
		// 			"volume" => "3.21.15",
		// 			"sound" => "default",
		// 			"badge" => "1",
		// 			"click_action" => $action,
		// 			// "apns" => $apns,
		// 			// 'android' => $android,
		// 			'webpush' => $web_push,
		// 		);
						
		// /* $fields = array(
		// 				'to' => $_REQUEST['fpWXT7bfcas:APA91bFQHL0KKFGvqapSzm0j1u2wlCHksNjMw4MGakRE-Xkui_n9qx0kTf70p-eSuoYGO1BfzJZxsX3dLwMkARBNWtMVACTq5Qf3GoYOLpkAi_U1kwu4O_0KmrTCEPehwJMb3Og0LaLq1x4SJ8GYIkzNOhgZ4nha1A'],
		// 				'notification'	=> $msg
		// 			); */
				
		// $fields = array(
		// 			'to' => '/topics/'.$topic,
		// 			'notification' => $msg,
		// 			'android' => $android,
		// 			'webpush' => $web_push,
		// 			'volume' => '3.21.15',
		// 			'sound' => 'default',
		// 			'priority' => 'high',
		// 			'data' => $data
		// 		);
		
		
		// $headers = array(
		// 			'Authorization: key=' .$API_KEY,
		// 			'Content-Type: application/json'
		// 		);
				
		// $ch = curl_init();
		// curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		// curl_setopt( $ch,CURLOPT_POST, true );
		// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		// curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		// $result = curl_exec($ch );
		// // echo $result;
		// curl_close( $ch );
        
    }



}