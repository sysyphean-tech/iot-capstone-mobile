<?php

return [
    'client_id' => env('MQTT_CLIENT_ID', '9cc97282-4140-4050-a98d-3fa5056b92a0-DJANCOKKK'),
    'host'      => env('MQTT_HOST', 'broker.emqx.io'),
    'port'      => env('MQTT_PORT', 1883),
    'username'  => env('MQTT_USERNAME', 'root'),
    'password'  => env('MQTT_PASSWORD', 'root'),
    'cert_file' => env('MQTT_CERT_FILE', null),
    'ca_file'   => env('MQTT_CA_FILE', null),
    'key_file'  => env('MQTT_KEY_FILE', null),
];

// return [
//     'client_id' => env('MQTT_CLIENT_ID', 'ece22cdc-261e-43cf-8f36-9d01acda55c0-sysyphean-1'),
//     'host'      => env('MQTT_HOST', 'sysyphean-ad4aip.a01.euc1.aws.hivemq.cloud'),
//     'port'      => env('MQTT_PORT', 8883),
//     'username'  => env('MQTT_USERNAME', 'sysyphean'),
//     'password'  => env('MQTT_PASSWORD', '123.Qwerty'),
//     'cert_file' => env('MQTT_CERT_FILE', null),
//     'ca_file'   => env('MQTT_CA_FILE', null),
//     'key_file'  => env('MQTT_KEY_FILE', null),
// ];
