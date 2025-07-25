<!DOCTYPE html>
<html lang="{{config("app.locale")}}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Örnek Blade Yapısı</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    @vite(['resources/js/app.js'])


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
          rel="stylesheet">
    <style>
         :root {
             --color-primary: #7380ec;
             --color-danger: #ff7782;
             --color-success: #41f1b6;
             --color-warning: #ffbb55;
             --color-white: #fff;
             --color-info-dark: #7d8da1;
             --color-info-light: #dce1eb;
             --color-dark: #363949;
             --color-light: rgba(132, 139, 200, 0.18);
             --color-primary-variant: #111e88;
             --color-dark-variant: #677483;
             --color-background: #f6f6f9;


             --card-border-radius: 2rem;
             --border-radius-1: 0.4rem;
             --border-radius-2: 0.8rem;
             --border-radius-3: 1.2rem;

             --card-padding: 1.8rem;
             --padding-1: 1.2rem;

             --box-shadow: 0 2rem 3rem var(--color-light);
         }
        *{
            margin: 0;
            padding: 0;
            outline: 0;
            appearance: none;
            border: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }

        html{
            font-size: 14px;
        }

        body{
            width: 100vw;
            height: 100vh;
            font-family: poppins, sans-serif;
            font-size: 0.88rem;
            background: var(--color-background);
            user-select: none;
            overflow-x: hidden;
            color: var(--color-dark);
        }


        .custom_container{
            display: grid;
            width: 98%;
            margin: 0 auto;
            gap: 1.8rem;
            grid-template-columns: 19rem auto;

        }

        a{
            color: var(--color-dark);
        }

        img{
            display: block;
            width: 100%;
        }


        h1{
            font-weight: 800;
            font-size: 1.8rem;
        }

        h2{
            font-size: 1.4rem;
        }
        h3{
            font-size: 0.87rem;
        }

        h4{
            font-size: 0.8rem;
        }

        h5{
            font-size: 0.77rem;
        }

        small{
            font-size: 0.75rem;
        }

        .profile-photo{
            width: 2.8rem;
            height: 2.8rem;
            border-radius: 50%;
            overflow: hidden;
        }


        .text-muted{
            color: var(--color-info-dark);
        }

        p{
            color: var(--color-dark-variant);
        }

        b{
            color: var(--color-dark);
        }

        .primary{
            color: var(--color-primary);
        }
        .danger{
            color: var(--color-danger);
        }
        .success{
            color: var(--color-success);
        }
        .warning{
            color: var(--color-warning);
        }

        aside{
            height: 100vh;
            width:18%;
            position: fixed;
            /*overflow-y: scroll;*/
        }



        .logo{
            width: 50px;
            height: auto;
            margin-left: 15px;
        }

        aside .top{
            background: var(--color-background);
            display: flex;
            align-items: center;
            margin-top: 1.4rem;



        }

        aside .logo{
            display: flex;
            gap: 0.8rem;
        }

        aside .logo img{
            width: 1rem;
            height: 1rem;
        }

        aside .close{
            display: none;
        }

        aside .side{
            display: flex;
            flex-direction: column;
            height: 86vh;
            position: relative;
            top: 3rem;
        }

        aside h3{
            font-weight: 700;
        }

        aside .side a{
            display: flex;
            color: var(--color-info-dark);
            margin-left: 2rem;
            gap: 1rem;
            align-items: center;
            position: relative;
            height: 3.7rem;
            transition: all 300ms ease;
        }

        aside .side a span{
            font-size: 1.8rem;
            transition: all 300ms ease;
        }

        aside .side a:last-child{
            position: absolute;
            bottom: 2rem;
            width: 100%;
        }

        aside .side a.active{
            background: var(--color-light);
            color: var(--color-primary);
            margin-left: 0;
        }

        aside .side a.active:before{
            content: "";
            width: 6px;
            height: 100%;
            background: var(--color-primary);
        }

        aside .side a.active span{
            color: var(--color-primary);
            margin-left: calc(1rem - 3px);
        }

        aside .side a:hover{
            color: var(--color-primary);
            text-decoration: none;
        }

        aside .side a:hover span{
            margin-left: 1rem;
        }

        aside .side .message-count{
            background: var(--color-danger);
            color: var(--color-white);
            padding: 2px 10px;
            font-size:11px;
            border-radius: var(--border-radius-1);
        }

        /*-------------------MAİN-------------------*/

        main{
            margin-top: 1.4rem;
        }

        main .insights{

            grid-template-columns: repeat(3,1fr);
            gap:1.6rem;

        }

        main .insights > div{
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 5.4rem;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        main .insights > div:hover{
            box-shadow: none;
        }

        tr{
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            transition: all 300ms ease;
        }



        .custom-tr{
            background: var(--color-white);
        }

        .custom-list-option:hover{
            text-decoration: none;
            color: coral;
            transition: all 600ms ease;
        }
         .custom-list-option{
            text-decoration: none;
             font-weight: bolder;
        }

         .custom-header{
             position: sticky;
             top: 0;
             background-color: white; /* sticky olduğu için zemin rengi gerekir */
             z-index: 1000;

         }

         .normal-header {
             position: relative;
             transition: all 0.3s ease;
         }

         .fixed-header {
             position: fixed;
             top: 0;
             width: 100%;
             background-color: white;
             box-shadow: 0 2px 4px rgba(0,0,0,0.1);
             z-index: 1000;
         }





    </style>

    <script>
        window.addEventListener("scroll", function() {
            const header = document.getElementById("mainHeader");
            if (window.scrollY > 100) { // 100px aşağı kayınca sabitle
                header.classList.add("fixed-header");
            } else {
                header.classList.remove("fixed-header");
            }
        });

    </script>
</head>

<body>
<div class="custom_container"> <!-- Bu satır dışarı alındı -->
    @include("layouts.partials.navbar")

    <main>





        <header id="mainHeader" class="normal-header">
             <div>
                <h2>dashboard</h2>
            </div>
        </header>





        @yield("content")
    </main>
</div> <!-- custom_container burada kapanıyor -->
@yield('scripts')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</body>











</html>

