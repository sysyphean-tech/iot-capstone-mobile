<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MqttService;
use App\Models\RelayStatus;
use App\Models\SensorStatus;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT topics and update statuses';
    protected $mqttService;

    public function __construct(MqttService $mqttService)
    {
        parent::__construct();
        $this->mqttService = $mqttService;
    }

    public function handle()
    {
        $this->mqttService->subscribe('relay/status', function ($message) {
            $status = $message->getPayload() == '1' ? 1 : 0;
            RelayStatus::updateOrCreate([], ['is_relay_status' => $status]);
        });

        $this->mqttService->subscribe('sensor/status', function ($message) {
            $status = $message->getPayload() == '1' ? 1 : 0;
            SensorStatus::updateOrCreate([], ['is_sensor_status' => $status]);
        });

        $this->mqttService->loop();
        return 0;
    }
}
