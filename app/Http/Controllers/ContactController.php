<?php

namespace App\Http\Controllers;

use App\Mail\welcomemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            } else {

                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $insert = DB::table('users')->insert($data);
                if ($insert) {
                    $email = "infotechbheem@gmail.com";
                    $name = $request->name;
                    $toEmail = $request->email;
                    $message = $request->message;
                    $subject = $request->subject;

                    $result = Mail::to($email)->send( new welcomemail($message, $subject, $toEmail, $name));

                    return response()->json([
                        'success' => true,
                        'message' => 'Your message has been sent. Thank you!',
                        'details' => $result
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        "message" => "Internal server error",
                    ], 500);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                "message" => "Internal server error",
            ], 500);
        }
    }
}
