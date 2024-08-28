<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Models\WebhookCall;

class SavingsController extends Controller{
    public function store(Request $request){
    // Log the incoming request for debugging purposes
    Log::info('webhook called', ['request' => $request->all()]);

    // Decode the incoming JSON payload
    $data = json_decode($request->getContent(), true);

    // Extract the 'amount' and 'date' from the 'key' array
    if (isset($data['key'])) {
        $amount = $data['key']['amount'];
        $date = $data['key']['date'];

        // Log the extracted amount and date for verification
        Log::info('Extracted data', ['amount' => $amount, 'date' => $date]);

        // Save the extracted data into the database
        $saving = new Saving();
        $saving->amount = $amount;
        $saving->date = $date;
        $saving->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully',
        ], 201);
    }

    // If 'key' is not present, return an error response
    return response()->json([
        'status' => 'error',
        'message' => 'Invalid payload',
    ], 400);
}

}
