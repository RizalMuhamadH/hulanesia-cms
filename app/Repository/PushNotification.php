<?php

namespace App\Repository;

use Berkayk\OneSignal\OneSignalFacade as OneSignal;

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
    }

	public function sendNotificationSegment($title, $segment, $url = null, $description = null, $image = null){
		$contents = array(
            "en" => $title
        );

        $params = array(
            'app_id' => env('ONESIGNAL_APP_ID'),
            'contents' => $contents,
            'included_segments' => [$segment]
        );

		if (isset($url)) {
            $params['url'] = $url;
        }

		if(isset($description)){
            $params['subtitle'] = array(
                "en" => $description
            );
        }

		if(isset($image)){
			$params['chrome_web_image'] = $image;
			$params['chrome_web_icon'] = $image;
		}

		OneSignal::sendNotificationCustom($params);
	}



}