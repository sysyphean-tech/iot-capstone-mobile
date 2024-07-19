<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Support\Facades\Log;

class MqttService
{
    protected $client;

    public function __construct()
    {
        $clientId = config('mqtt.client_id');
        $host = config('mqtt.host');
        $port = config('mqtt.port');
        $username = config('mqtt.username');
        $password = config('mqtt.password');

        $this->client = new MqttClient($host, $port, $clientId, MqttClient::MQTT_3_1_1);
        $settings = (new ConnectionSettings)
            ->setUsername($username)
            ->setPassword($password)
            ->setKeepAliveInterval(60)
            ->setConnectTimeout(10);

        try {
            $this->client->connect($settings, true);
        } catch (\Exception $e) {
            Log::error('Failed to connect to MQTT broker: ' . $e->getMessage());
        }
    }

    public function publish($topic, $message, $qualityOfService = MqttClient::QOS_AT_MOST_ONCE)
    {
        try {
            $this->client->publish($topic, $message, $qualityOfService);
        } catch (\Exception $e) {
            Log::error('Failed to publish message: ' . $e->getMessage());
        }
    }

    public function subscribe($topic, callable $callback, $qualityOfService = MqttClient::QOS_AT_MOST_ONCE)
    {
        try {
            $this->client->subscribe($topic, $callback, $qualityOfService);
        } catch (\Exception $e) {
            Log::error('Failed to subscribe to topic: ' . $e->getMessage());
        }
    }

    public function loop($duration = 10)
    {
        try {
            $this->client->loop(true, true, $duration);
        } catch (\Exception $e) {
            Log::error('Failed to loop: ' . $e->getMessage());
        }
    }

    public function isConnected()
    {
        return $this->client->isConnected();
    }
}
