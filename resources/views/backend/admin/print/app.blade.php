<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
        }
        .container{
            width: 80%;
            margin: 0 auto;
        }
        .logo img{
            width:120px;
        }
        .hospital-info {
            display: flex;
            align-items: center;
        }

        .hospital_name {
            margin-right: 10px;
            display: inline;
        }

        .header h2,
        .header p {
            margin: 0;
            padding: 0;
        }

        .last_div {
            margin-top: 80px;
            display: flex;
            align-items: center;
            font-size: 16px;
            color: black;
        }

        .last_div hr {
            height: 1px;
            border: none;
            background-color: black;
            margin-right: 10px;
            flex-shrink: 0;
            width: 25%;
            text-align: left;
            display: inline-block;
        }

        .last_div p {
            margin: 0;
            flex-grow: 1;
        }

        .address {
            overflow: hidden;
            display: inline;
        }
        table {
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,
        table td {
            padding: 5px;
            text-align: left;
            border: 1px solid #ccc;
            font-size: 12px;
        }

        table th {
            background-color: #f5f5f5;
        }

        table .active-row {
            background-color: #eeeef3;
        }

        .total-row td {
            font-weight: bold;
            font-size: 14px;
        }

        .total-label {
            text-align: right;
        }

        .in_words {
            font-size: 13px;
        }
    </style>
    @stack('printcss')
</head>

<body>
    <div class="container">
        <div class="header" style="width: 100%;min-height:120px;overflow:hidden">

                    <div class="logo" style="width: 50%;float:left;margin:0 auto">
                        <img src="{{ asset($webinfo->logo) }}" alt="perfumesomahar.logo">
                    </div>
            <div class="info"
                style="width: 50%;float:right;margin:0 auto;overflow:hidden;display:inline-block;text-align:right">
                <h2> {{ $webinfo->name }} </h2>
                <p> {{ $webinfo->number }} </p>
                <p> {{ $webinfo->email }} </p>
                <p> {{ $webinfo->title }} </p>
                <p> {{ $webinfo->address }} </p>
            </div>
        </div>
        <div style="margin-top: 10px"></div>
        @yield('content')

        <div class="last_div">
            <hr>
            <p>Signature</p>
        </div>
    </div>
    @stack('printjs')
</body>

</html>
