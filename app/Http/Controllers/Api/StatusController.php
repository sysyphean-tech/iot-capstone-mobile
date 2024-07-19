<?php

// Update the StatusController with MQTT publish functionality
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RelayStatus;
use App\Models\SensorStatus;
use Illuminate\Http\Request;
use App\Services\MqttService;

class StatusController extends Controller
{
    protected $mqttService;

    public function __construct(MqttService $mqttService)
    {
        $this->mqttService = $mqttService;
    }

    public function updateRelayStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $relayStatus = RelayStatus::orderBy('id', 'DESC')->first();
        if (!$relayStatus) {
            $relayStatus = new RelayStatus();
        }

        $relayStatus->is_relay_status = $request->status;
        $relayStatus->save();

        // Publish to MQTT
        $this->mqttService->publish('relay/status', $request->status);

        return response()->json(['success' => true, 'message' => 'Relay status updated successfully.']);
    }

    public function updateSensorStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $sensorStatus = SensorStatus::orderBy('id', 'DESC')->first();
        if (!$sensorStatus) {
            $sensorStatus = new SensorStatus();
        }

        $sensorStatus->is_sensor_status = $request->status;
        $sensorStatus->save();

        return response()->json(['success' => true, 'message' => 'Sensor status updated successfully.']);
    }

    public function updateRelayStatusFromArduino(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $relayStatus = RelayStatus::orderBy('id', 'DESC')->first();
        if (!$relayStatus) {
            $relayStatus = new RelayStatus();
        }

        $relayStatus->is_relay_status = $request->status;
        $relayStatus->save();

        $sensorStatus = SensorStatus::orderBy('id', 'DESC')->first();

        if (!$sensorStatus) {
            $sensorStatus = new SensorStatus();
        }

        $sensorStatus->is_sensor_status = $request->status;
        $sensorStatus->save();

        // Publish to MQTT
        $this->mqttService->publish('relay/status', $request->status);
        $this->mqttService->publish('sensor/status', $request->status);

        return response()->json(['success' => true, 'message' => 'Relay status updated successfully.']);
    }
}
