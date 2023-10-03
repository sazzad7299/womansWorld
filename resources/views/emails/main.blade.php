<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.5;
        background-color: #ffffff;
        color: #444444;
        text-align: left;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }

      .logo {
        display: block;
        margin: 0 auto;
        margin-bottom: 20px;
        width: 200px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      }

      th,
      td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dddddd;
      }

      th {
        background-color: #f8f8f8;
        font-weight: bold;
      }

      h1 {
        margin: 0 0 20px;
        font-size: 24px;
        font-weight: bold;
        color: #333333;
        text-align: center;
      }

      h2 {
        margin: 0 0 10px;
        font-size: 18px;
        font-weight: bold;
        color: #333333;
        text-align: left;
      }

      p {
        margin: 0 0 10px;
        font-size: 14px;
        line-height: 1.5;
        color: #444444;
        text-align: left;
      }
      .footer{
        width: 60%;
        float: right;
      }

      @media only screen and (max-width: 600px) {
        .container {
          max-width: 100%;
          padding: 10px;
        }
        .logo {
          width: 100%;
          margin: 0 auto;
          overflow: hidden;
          display: inline;
        }

        h1 {
          font-size: 20px;
          margin-bottom: 10px;
        }

        h2 {
          font-size: 16px;
          margin-bottom: 5px;
        }

        table {
          font-size: 12px;
        }

        th,
        td {
          padding: 5px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
       {{-- <div class="logo"><img src="data:image/png;base64,{{ $logo }}" width="40%" alt=""></div> --}}
        @yield('content')
    </div>
  </body>
</html>
