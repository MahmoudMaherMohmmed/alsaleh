<?php

use App\Models\CarSalesman;
use Google\Client;

function create_avatar($string)
{
    return 'https://ui-avatars.com/api/?name=' . $string;
}

function fcm_notification($firebase_id, $title, $body)
{
    $fcm_message = [
        'token' => $firebase_id,
        'notification' => [
            'title' => $title,
            'body' => $body,
        ],
        "android" => [
            "notification" => [
                "click_action" => "AL_SALEH_NOTIFICATION_CLICK"
            ],
            "priority" => "high"
        ]
    ];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/v1/projects/al-saleh/messages:send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization' => 'Bearer ' . get_fcm_access_token(),
        'Content-Type' => 'application/json',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['message' => $fcm_message]));
    curl_exec($ch);
    curl_close($ch);

    return true;
}

function get_fcm_access_token()
{
    $credentialsPath = storage_path('app/firebase-service-account.json');

    $client = new Client();
    $client->setAuthConfig($credentialsPath);
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    $token = $client->fetchAccessTokenWithAssertion();

    return $token['access_token'];
}

function customer_new_reference_id($salesman_id)
{
    $last_salesman_customer = App\Models\Customer::where('salesman_id', $salesman_id)->latest()->first();

    if ($last_salesman_customer != null) {
        return $last_salesman_customer->reference_id + 1;
    } else {
        return 1;
    }
}

function get_salesman_car_product_quantity($product_id)
{
    $quantity = 0;

    $salesman_car = CarSalesman::where('salesman_id', auth()->id())->first();
    if ($salesman_car != null) {
        if ($salesman_car->car != null) {
            $salesman_car_product_pivot = optional($salesman_car->car->products()->where('product_id', $product_id)->first())->pivot;
            if ($salesman_car_product_pivot != null) {
                $quantity = $salesman_car_product_pivot->quantity;
            }
        }
    }

    return (string)$quantity;
}
