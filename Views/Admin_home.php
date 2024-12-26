<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .card {
            position: relative;
            width: 90vw;
            height: 90vh;
            background: lightgrey;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            transition: all 1s ease-in-out;
        }

        .background {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 100% 107%, #4158D0 0%, #C850C0 30%, #FFCC70 60%, #62c2fe 100%);
        }

        .welcome-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 1;
            transition: all 0.6s ease-in-out;
        }

        .welcome-message h1 {
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .welcome-message p {
            font-size: 1.5em;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
        }

        .icon .svg {
            fill: rgba(255, 255, 255, 0.797);
            width: 100%;
            transition: all 0.5s ease-in-out;
        }

        .box {
            position: absolute;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.389);
            border-top: 2px solid rgb(255, 255, 255);
            border-right: 1px solid white;
            border-radius: 10% 13% 42% 0%/10% 12% 75% 0%;
            box-shadow: rgba(100, 100, 111, 0.364) -7px 7px 29px 0px;
            transform-origin: bottom left;
            transition: all 1s ease-in-out;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .box::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }

        .box .label {
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            z-index: 1;
        }

        .box:hover .svg {
            fill: white;
        }

        .box1 {
            width: 70%;
            height: 70%;
            bottom: -70%;
            left: -70%;
        }

        .box1::before {
            background: radial-gradient(circle at 30% 107%, #4CAF50 0%, #45a049 90%);
        }

        .box2 {
            width: 50%;
            height: 50%;
            bottom: -50%;
            left: -50%;
            transition-delay: 0.2s;
        }

        .box2::before {
            background: radial-gradient(circle at 30% 107%, #f44336 0%, #da190b 90%);
        }

        .box3 {
            width: 30%;
            height: 30%;
            bottom: -30%;
            left: -30%;
            transition-delay: 0.4s;
        }

        .box3::before {
            background: radial-gradient(circle at 30% 107%, #FFC107 0%, #ffa000 90%);
        }

        .box:hover::before {
            opacity: 1;
        }

        .box:hover .icon .svg {
            filter: drop-shadow(0 0 5px white);
        }

        .card:hover .box {
            bottom: -1px;
            left: -1px;
        }

        .card:hover .welcome-message {
            transform: translate(-50%, -100%);
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="background"></div>
        <div class="welcome-message">
            <h1>Welcome Admin!</h1>
            <p></p>
        </div>
        <a href="/Medira/Views/Add_Users.php" class="box box1">
            <span class="icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="svg">
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 8c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H9zm-3-3v-3h3v-2H6V7H4v3H1v2h3v3z"/>
                </svg>
            </span>
            <span class="label">Add User</span>
        </a>
        <a href="/Medira/Views/deleting_users.php" class="box box2">
            <span class="icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="svg">
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm0 4H9c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2h-6z"/>
                    <path d="M19 12.41L17.59 11 14 14.59 10.41 11 9 12.41 12.59 16 9 19.59 10.41 21 14 17.41 17.59 21 19 19.59 15.41 16z"/>
                </svg>
            </span>
            <span class="label">Delete User</span>
        </a>
        <a href="/Medira/Views/bannnedform.php"> <div class="box box3">
            <span class="icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8 0-1.85.63-3.55 1.69-4.9L16.9 18.31C15.55 19.37 13.85 20 12 20zm6.31-3.1L7.1 5.69C8.45 4.63 10.15 4 12 4c4.42 0 8 3.58 8 8 0 1.85-.63 3.55-1.69 4.9z"/>
                </svg>
            </span>
            <span class="label">Ban User</span>
            
        </div>
    </div>




    
</body>
</html>