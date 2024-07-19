<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelayStatus;
use App\Models\SensorStatus;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Dashboard.homePage');
    }

    public function showRelayStatus()
    {
        $showRelayStatus = RelayStatus::orderBy('id', 'DESC')->first();
        return response()->json($showRelayStatus);
    }

    public function showSensorStatus()
    {
        $showSensorStatus = SensorStatus::orderBy('id', 'DESC')->first();
        return response()->json($showSensorStatus);
    }

    public function toggleRelayStatus(Request $request)
    {
        $status = $request->status;
        $relayStatus = RelayStatus::orderBy('id', 'DESC')->first();
        $relayStatus->is_relay_status = $status;
        $relayStatus->save();

        return response()->json(['success' => true]);
    }
}
