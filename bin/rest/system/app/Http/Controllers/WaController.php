<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WaController extends Controller
{
    public function test()
    {
        $sid = "AC0274b92a4d79062708f938888326e89b";
        $token = "44ea2e9f72e1ded7a31559a1ae8fb044";
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create(
                "whatsapp:+6282284733404", // to
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => "testings"
                ]
            );

        print($message->sid);
    }
}
