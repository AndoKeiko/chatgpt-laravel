<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGptController extends Controller
{

    public function index(Request $request)
    {
      return view('chat');
    }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 文章
        $sentence = $request->input('sentence');

        // ChatGPT API処理
        $chat_response = $this->chat_gpt("文章を読み取り、先生が学生に言うように励ましてください", $sentence);

        return view('chat', compact('sentence', 'chat_response'));
    }

    function chat_gpt($system, $user)
    {
        // APIキー
        $api_key = env('CHAT_GPT_KEY');

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $openaiClient = \Tectalic\OpenAi\Manager::build(
            new \GuzzleHttp\Client(),
            new \Tectalic\OpenAi\Authentication($api_key)
        );

        try {

            $response = $openaiClient->chatCompletions()->create(
                new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest($data)
            )->toModel();
            // var_dump($response);
            return $response->choices[0]->message->content;
        } catch (\Exception $e) {
            return "ERROR";
        }
    }

}