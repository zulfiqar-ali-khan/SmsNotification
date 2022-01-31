<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsControlleer extends Controller
{
    //
    public function SmsSending()
    {
       try {

            $basic  = new \Vonage\Client\Credentials\Basic("f85199f3", "Gf3R3S3ZfcAIw55M");
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS("923315701576", 'Pakistan', 'A text message sent using the Nexmo SMS API')
            );
            
            $message = $response->current();
            
            if ($message->getStatus() == 0) {
                echo "The message was sent successfully\n";
            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
            }

            // $nexmo = app('Nexmo\Client');

            // $nexmo->message()->send([
            //     'to'   => '923315701576',
            //     'from' => '16105552344',
            //     'text' => 'Using the instance to send a message.'
            // ]);


            // Nexmo::message()->send([
            //     'to'   => '923315701576',
            //     'from' => 'Form Asim',
            //     'text' => 'Using the facade to send a message.'
            // ]);

       } catch (\Exception $e) {
           return  $e->getMessage();
       }
    }
}
