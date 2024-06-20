
# Just Chat AI

Just Chat AI is a website that used for chatting with ai, this website can be powered by Groq AI and Gemini.


## Features

- Asking question to ai

## Tech Stack

**Client:** Laravel 11, Livewire 3,  Javascript, TailwindCSS

**Server:** PHP


## Installation

Clone project ini

```bash
  git clone https://github.com/Kepoo311/Just_Chat_AI.git
  cd Just_Chat_AI
```

Install dependencies

```bash
  composer install
  npm install
```

Configurasi DB

```bash
  php artisan migrate:fresh --seed
```

Add Groq AI or Gemini Api Key in env
* You can just copy from example env, in the very bottom

```bash
    GEMINI_API_KEY=

    GROQ_API_KEY=
```

Run this project

 ```bash
  php artisan serve
```   

* If you want to change the style do:

 ```bash
  npm run dev
```  

* Dont forget to uncomment the @vite(..) in resources\views\components\layouts\app.blade.php and comment the 
   link rel="stylesheet" href="{{asset('css/build.css')}}"

## Authors

- [@Kepoo311](https://www.github.com/kepoo311)

