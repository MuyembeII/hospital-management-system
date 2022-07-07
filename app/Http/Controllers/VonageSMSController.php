<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class VonageSMSController extends Controller
{
    /**
     * Store a newly created patient resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'appointment_message' => 'required',
        ]);

        $appointment_message = $request->get('appointment_message');

        try {

            $basic = new \Vonage\Client\Credentials\Basic(getenv("VONAGE_KEY"), getenv("VONAGE_SECRET"));
            $client = new \Vonage\Client($basic);

            $receiverNumber = "967106289"; //Patient Number
            //$message = "This is testing from ItSolutionStuff.com";

            $appointment_message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Chilanga Hospice',
                'text' => $appointment_message
            ]);

            dd('SMS Sent Successfully.');

        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }
}
