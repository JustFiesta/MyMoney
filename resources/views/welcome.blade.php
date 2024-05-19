<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myMoney</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <style>
            .welcomeFont {
                font-family: "Chakra Petch", sans-serif;
                font-weight: 300;
                font-style: normal;
                font-weight: bold
            }
            .loginButton {
                background: rgb(183, 45, 250);
                color: white;
                border: 3px solid white;
                transition: background 0.1s linear, color 0.1s linear, border-color 0.1s linear;
            }
            .loginButton:hover {
                background: white;
                color: rgb(183, 45, 250);
                border: 3px solid rgb(183, 45, 250);
            }
            .registerButton {
                background: white;
                color: rgb(183, 45, 250);
                border: 3px solid rgb(183, 45, 250);
                transition: background 0.1s linear, color 0.1s linear, border-color 0.1s linear;
            }
            .registerButton:hover {
                background: rgb(183, 45, 250);
                color: white;
            }
        </style>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="flex flex-col justify-center items-center min-h-screen bg-gray-50 lg:max-h-screen dark:bg-black">
            <x-application-logo class="w-52" />
            @if (Route::has('login'))
                <div class="flex flex-col justify-center items-center mt-10 w-full gap-2 md:w-2/5 dark:text-gray-50">
                    <span class="welcomeFont text-4xl">Witaj w myMoney!</span>
                    <span class="welcomeFont text-center text-xl mt-5">Kontroluj budżet, planuj wydatki i ustawiaj cele.<br>
                        Dzięki myMoney w łatwy i szybki sposób ogarniesz swoje finanse.</span>
                    @auth()
                        <span class="mt-10 gap-4">
                            <a href="{{ route('home') }}" class="text-2xl px-4 py-2 rounded-full text-center registerButton">Strona główna</a>
                        </span>
                    @else
                        <span class="flex flex-col-reverse mt-10 gap-4">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-full welcomeFont text-2xl  text-black-50 px-4 py-2 rounded-full text-center registerButton">Utwórz konto</a>
                            @endif
                            <a href="{{ route('login') }}" class="w-full welcomeFont text-2xl text-black-50 px-4 py-2 rounded-full text-center loginButton">Zaloguj się</a>
                        </span>
                    @endauth
                </div>
            @endif

            <!-- Display preview of panel for guest -->
            {{-- @guest
                <x-manage-finance-panel />
            @endguest --}}
        </div>
    </body>
</html>