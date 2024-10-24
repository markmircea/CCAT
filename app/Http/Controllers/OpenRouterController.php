<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenRouterController extends Controller
{
    private $apiUrl = 'https://openrouter.ai/api/v1/chat/completions';

    public function generateQuestion(Request $request)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'HTTP-Referer' => 'https://easyace.ai',
                'X-Title' => 'CCAT',
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'model' => 'openai/gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $request->input('prompt')
                    ]
                ]
            ]);

            if (!$response->successful()) {
                return response()->json([
                    'error' => 'Failed to get response from OpenRouter API',
                    'details' => $response->json()
                ], $response->status());
            }

            $responseData = $response->json();

            // Extract the content from the response
            $content = $responseData['choices'][0]['message']['content'] ?? null;
            if (!$content) {
                return response()->json([
                    'error' => 'Invalid response format from OpenRouter API'
                ], 500);
            }

            // Try to extract and validate JSON from the content
            preg_match('/{.*}/s', $content, $matches);
            if (empty($matches)) {
                return response()->json([
                    'error' => 'Could not extract JSON from response'
                ], 500);
            }

            $questionData = json_decode($matches[0], true);
            if (!$questionData ||
                !isset($questionData['question']) ||
                !isset($questionData['options']) ||
                !isset($questionData['correctAnswer']) ||
                !is_array($questionData['options'])) {
                return response()->json([
                    'error' => 'Invalid question data format'
                ], 500);
            }

            // Store the response data in session
            session([
                'current_question' => $questionData['question'],
                'current_options' => $questionData['options'],
                'current_answer' => $questionData['correctAnswer']
            ]);

            return response()->json([
                'choices' => [
                    [
                        'message' => [
                            'content' => json_encode($questionData)
                        ]
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function generateExplanation(Request $request)
    {
        try {
            // Extract answer from request
            $promptContent = $request->input('prompt');
            if (!preg_match('/The user answered "(.*?)"\. /', $promptContent, $matches)) {
                throw new \Exception('Could not extract user answer from prompt');
            }
            $userAnswer = $matches[1];

            // Get question data from session
            $question = session('current_question');
            $options = session('current_options');
            $correctAnswer = session('current_answer');

            if (!$question || !$options || !$correctAnswer) {
                // Fallback to original behavior if session data is missing
                return $this->generateExplanationFallback($request);
            }

            // Create more focused prompt for quick explanation
            $prompt = "Give a brief, focused explanation for this question: '$question'. ";
            $prompt .= "The correct answer is '$correctAnswer'. ";
            $prompt .= "The user chose '$userAnswer'. ";
            if ($userAnswer === $correctAnswer) {
                $prompt .= "Explain why this is correct.";
            } else {
                $prompt .= "Explain why their answer is incorrect and why $correctAnswer is correct.";
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'HTTP-Referer' => 'https://easyace.ai',
                'X-Title' => 'Easy Ace AI',
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                //'model' => 'google/gemma-2-9b-it:free',
                'model' => 'openai/gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ]
            ]);

            if (!$response->successful()) {
                return response()->json([
                    'error' => 'Failed to get response from OpenRouter API',
                    'details' => $response->json()
                ], $response->status());
            }

            return response()->json($response->json());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function generateExplanationFallback(Request $request)
    {
        // Original explanation generation logic as fallback
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            'HTTP-Referer' => 'https://easyace.ai',
            'X-Title' => 'Easy Ace AI',
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'model' => 'google/gemma-2-9b-it:free',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $request->input('prompt')
                ]
            ]
        ]);

        if (!$response->successful()) {
            return response()->json([
                'error' => 'Failed to get response from OpenRouter API',
                'details' => $response->json()
            ], $response->status());
        }

        return response()->json($response->json());
    }
}
