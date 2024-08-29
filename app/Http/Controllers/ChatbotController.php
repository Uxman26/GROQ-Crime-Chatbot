<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LucianoTonet\GroqLaravel\Facades\Groq;

class ChatbotController extends Controller
{
    public function analyze(Request $request)
    {
        $caseDetails = $request->input('case_details');

        // $groq = new Groq(env('GROQ_API_KEY'));
        $groq = new Groq('GROQ_API_KEY'); // api key

        $chatCompletion = $groq->chat()->completions()->create([ // groq api call
            'model' => 'llama3-8b-8192',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Analyze the following case details and summarize it. Identify the relevant legal articles or sections that may apply:\n\n" . $caseDetails,
                ],
            ],
        ]);
        $summary = $chatCompletion['choices'][0]['message']['content'];
        // dd($summary);
        return view('chatbot', [
            'summary' => $summary,
        ]);
    }
}
