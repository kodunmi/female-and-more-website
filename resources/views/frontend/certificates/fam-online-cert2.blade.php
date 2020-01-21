<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        @page {
            margin: 0px;
            size: 611pt 842pt landscape;
        }

        body {
            margin: 0px;
            font-family: 'Ubuntu', sans-serif;
        }

        img {
            object-fit: cover;
            width: 100%;
        }

        .pr {
            position: relative;
        }

        .pa {
            position: absolute;
        }

        .t1 {
            font-weight: bold;
            top: 130px;
            right: 450px;
            line-height: 29px;
            height: 29px;
            font-size: 24px;
            color: rgb(112, 111, 111);
        }

        .t2 {
            top: 180px;
            font-weight: 700;
            line-height: 72px;
            height: 72px;
            font-size: 50px;
        }

        .t2--1 {
            left: 233px;
        }

        .t2--2 {
            left: 230px;
            color: #be169a;
        }

        .t3 {
            top: 330px;
            font-weight: 600;
            line-height: 58px;
            height: 58px;
            font-size: 60px;
            transform: translate(0%);
            text-align: center;
            width: 100%;
            text-transform: capitalize;
        }

        .t4 {
            top: 450px;
            right: 50%;
            transform: translate(50%);
        }

        .t4--text {
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: rgb(58, 55, 55);
        }

        .t5 {
            top: 630px;
            transform: translate(70%);
            font-size: large;
            font-style: italic;
            font-weight: 600;
        }

        .t6 {
            right: 50%;
            transform: translate(50%);
            top: 750px;
            font-size: large;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="pr">
        <img class="pa" src="images/certificate/fam-cert.jpg" alt="cert">
        <div class="pa t1">Online Level {{ $level_number }}</div>
        <div class="pa t2 t2--1">PARTICIPANT CERTIFICATE</div>
        <div class="pa t2 t2--2 ">PARTICIPANT CERTIFICATE</div>
        <p class="pa t3">{{ $name }} </p>
        <div class="pa t4">
            <p class="t4--text">For participating in the FEMALE AND MORE 30 days self-esteem and leadership program for youngfemales across Africa</p>
        </div>
        <div class="pa t5">
            <p class="t5--text">Kingsley N.T. Bangwell </p>
            <p class="t5--text">CEO/Executive Director,</p>
            <p class="t5--text">Youngstars Dev. Initiative</p>
        </div>
        <div class="pa t6">This 2nd day of January, 2020</div>
    </div>
</body>

</html>
