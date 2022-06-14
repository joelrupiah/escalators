<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailListing;
// use telesign\sdk\messaging\MessagingClient;

class EmailListingController extends Controller
{
    public function subscribe(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|email|unique:email_listings'
        ]);

        $email = $request->email;

        EmailListing::create([
            'email' => $email
        ]);

        return response()->json('success', 200);

    }

    /**
     * push array in key/value pairs
     */
    protected function array_push_assoc(&$array, $key, $value){
        $array[$key] = $value;
        return $array;
    }

    public function sendEMail(Request $request)
    {
        $validated = $request->validate([
            'emailTopic' => 'required|string',
            'emailBody' => 'required|string',
            'senderEmail' => 'required|email',
        ]);

        $from = $validated['senderEmail'];
        $topic = $validated['emailTopic'];
        $addresses = EmailListing::all();
        $receivers = [];
        $emailContent = $validated['emailBody'];

        foreach($addresses as $address){
            $this->array_push_assoc($receivers, $address->email, 'Example user ');
        }

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($from, "Joel Rupiah");
        $email->setSubject($topic);
        $email->addTo("alloyking1@gmail.com", "Example User");
        $email->addTos($receivers);
        $email->addContent("text/plain", $emailContent);
        
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

        try {
            $response = $sendgrid->send($email);
            return response()->json("Email sent successfully");

        } catch (Exception $e) {
            return response()->json( 'Caught exception: '. $e->getMessage() ."\n");
        }
    }

    // public function sendSms()
    // {
    //     $customer_id = "BD0BBB77-6FBF-4C4D-9838-10D8C7229CA0";
    //     $api_key = "Rj6kju1H22w4wRmRyYLF6kK+RJO3oJ/Jl8ZrQ7PhMX/wcJ9jcfEVYAtCWQv/SFLgZU7HBOlPf/iRu6Om335vnw==";
    //     $phone_number = "254715733257";
    //     $message = "You're scheduled for a dentist appointment at 2:30PM.";
    //     $message_type = "ARN";
    //     $messaging = new MessagingClient($customer_id, $api_key);
    //     $response = $messaging->message($phone_number, $message, $message_type);
        
    // }
    
}
