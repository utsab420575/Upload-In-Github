<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <menu>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            <li><a href="{{route('login')}}">Login Form</a></li>
        </menu>
    </header>

    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} My Laravel Application. All rights reserved.</p>
        @yield('extra-footer-content')
    </footer>
</body>
</html>
