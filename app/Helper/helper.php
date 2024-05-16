<?php

function create_avatar($string)
{
    return 'https://ui-avatars.com/api/?name=' . $string;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function fcm_notification($firebase_id, $title, $body)
{
    $notification = [
        'title' => $title,
        'body' => $body,
        'sound' => 'default',
    ];

    $fcmNotification = [
        'to' => $firebase_id,
        'notification' => $notification,
        'data' => [
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
        ],
        'priority' => 'high',
    ];

    $headers = [
        'Authorization: key=AAAAZDfQYlQ:APA91bEd6x-9lSUx3zOz4RMpuIERfna9DD5yTezorw_ISnnnxs7IMY74mKZkzhPNiZpv55_DTVxLptPaLA8--tD-8xkwQ50nywsRgoGv-ZKWqbGzVmrvsvTrLV2TKOyRS0BoAUlHFy42',
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    curl_exec($ch);
    curl_close($ch);

    return true;
}
