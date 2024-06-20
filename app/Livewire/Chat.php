<?php

namespace App\Livewire;

use Livewire\Component;
use Gemini\Laravel\Facades\Gemini;
use LucianoTonet\GroqPHP\Groq;


class Chat extends Component
{
    public $question;
    public $response;
    public $aiModel = 'GA';

    public function getResponse()
    {
        $hl = new \Highlight\Highlighter();

        if($this->aiModel == 'GM'){
            $result = Gemini::geminiPro()->generateContent($this->question);
            $highlight = $hl->highlight('swift', $result->text());
    
            $this->response = $highlight->value;
        } else if($this->aiModel == 'GA'){
            $groq = new Groq(getenv('GROQ_API_KEY'));
    
            $chatCompletion = $groq->chat()->completions()->create([
                'model' => 'llama3-70b-8192',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $this->question
                    ],
                ]
            ]);
    
            $highlight = $hl->highlight('swift', $chatCompletion['choices'][0]['message']['content']);
    
            $this->response = $highlight->value;
        }
    }


    public function render()
    {
        return view('livewire.chat');
    }
}
