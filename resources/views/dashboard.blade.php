<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


        .ccontainer{
            display: grid;
            width: 96%;
            margin: 0 auto;
            gap: 1.8rem;
            grid-template-columns: 14rem auto 23rem;

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
        }

        aside .top{
            background: var(--color-background);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.4rem;
        }

        aside .logo{
            display: flex;
            gap: 0.8rem;
        }

        aside .logo img{
            width: 2rem;
            height: 2rem;
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
            font-weight: 500;
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
            font-size: 1.6rem;
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
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap:1.6rem;

        }

        main .insights > div{
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: all 300ms ease;
        }

        main .insights > div:hover{
            box-shadow: none;
        }







    </style>































</head>
<body>
<div class="ccontainer" >
    <aside>
        <div class="top">
            <img src="" alt="">
            <h2>SYS <span class="danger">CRM</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>

        <div class="side">
            <a href="#">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="#" class="active">
                <span class="material-icons-sharp">person_outline</span>
                <h3>Customers</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">receipt_long</span>
                <h3>Orders</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">insights</span>
                <h3>Analytics</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Messages</h3>
                <span class="message-count">26</span>
            </a>
            <a href="#">
                <span class="material-icons-sharp">inventory</span>
                <h3>Products</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">report</span>
                <h3>Reports</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">settings</span>
                <h3>Settings</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">add</span>
                <h3>Add Product</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-----------------END OF ASİDE---------------->
            <main>
                <h1>Dashboard</h1>

                <div class="date">
                    <input type="date">
                </div>

                <div class="insights">
                    <div class="sales">
                        <span class="material-icons-sharp">analytics</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Sales</h3>
                                <h1>$25,024</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="number">
                                    <p>%81</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>
