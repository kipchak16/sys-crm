<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Örnek Blade Yapısı</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /*body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #b6f6f3;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 40px;
        }*/



        h2 {
            margin-top: 0;
            color: #f0f0f0;
            display: block;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            margin-top: 20px;
        }

        input[type="text"], textarea {
            width: 97%;
            padding: 12px;

            background-color: #ffffff;
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            resize: vertical;
        }

        textarea {
            height: 200px;
        }

        .button {
            margin-top: 2px;
            margin-bottom: 2px;
            padding: 14px 19px;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
            float: right;
        }

        .button:hover {
            background-color: #357ABD;
        }

        .header-container {
            display: flex;
            justify-content: space-between; /* başlık sola, buton sağa */
            align-items: center; /* dikeyde hizalama */

        }

        .header-kaps {
            display: flex;
            justify-content: center;
            align-content: center;
            flex-direction: row;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="app">
    @include('emirhan-ornek.navbar')
    <main class="py-4">
        @yield('icerik')
    </main>
    {{--@include('emirhan-ornek.footer')--}}
</div>
</body>
</html>
