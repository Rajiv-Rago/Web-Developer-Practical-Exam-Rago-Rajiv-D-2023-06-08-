<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Paint Jobs</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
            
            .basic-table,
            .basic-table th,
            .basic-table td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }
            .paint-jobs {
                display: inline-block;
            }
            .shop-performance {
                display: inline-block;
                margin-left:50px;
                width: 500px;
                
            }
            .shop-performance > td{
                padding: 5px;
            }
            .shop-header {
                color: white;
            }
            .num {
                text-align: right;
                padding-left: 60px;
            }
            .gray {
                background-color: lightgray;
            }
        </style>
    </head>
    <body class="antialiased">
        <h1 style="text-align:center">Paint Jobs</h1>
        <div class="paint-jobs"  style="width:50%">
            <h6>Paint Jobs in Progress</h6>
            <table class="basic-table"  style="width:100%">
                <tr class="gray">
                    <td>Plate No.</td>
                    <td>Current Color</td>
                    <td>Target Color</td>
                    <td>Action</td>
                </tr>  
                @foreach($inProgress as $car)
                <tr >
                    <td>{{ $car -> plateNo }}</td>
                    <td>{{ $car -> currentColor }}</td>
                    <td>{{ $car -> targetColor }}</td>
                    <td><a class="text-danger" href="/delete/{{ $car -> id }}">Mark as Completed</a></td>
                </tr> 
                @endforeach
            </table>
        </div>
        <div class="shop-performance">
            <br>
            <table class="gray">
                <tr class="bg-danger text-white" style="width:100%">
                    <th colspan="3">SHOP PERFORMANCE</th>
                <tr>
                <tr>
                    <td>Total Cars Painted:<td>
                    <td id="total" class="num"></td>
                </tr>
                <tr>
                    <td>Breakdown:<td>
                </tr>
                <tr>
                    <td>&emsp;Blue<td> 
                    <td id="blue" class="num"></td>
                </tr>
                <tr>
                    <td>&emsp;Red<td>
                    <td id="red" class="num"></td>
                </tr>
                <tr>
                    <td>&emsp;Green<td>
                    <td id="green" class="num"></td>
                </tr>
            </table>
        </div>
        <div class="paint-squeue">
            <h6>Paint Queue</h6>
            <table class="basic-table" style="width:50%">
                <tr class="gray">
                    <td>Plate No.</td>
                    <td>Current Color</td>
                    <td>Target Color</td>
                </tr>  
                @foreach($queue as $car)
                <tr>
                    <td>{{ $car -> plateNo }}</td>
                    <td>{{ $car -> currentColor }}</td>
                    <td>{{ $car -> targetColor }}</td>
                </tr> 
                @endforeach
            </table>
        </div>
        <a href="/new-paint-job" class="btn btn-primary" style="margin: 10px">New Paint Job</a>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script>
            let cookie = document.cookie
            let csrfToken = cookie.substring(cookie.indexOf('=') + 1)
            function check(){
                $.ajax({
                type: "GET",
                url: "/performance",
                headers: {
                'X-CSRFToken': csrfToken
                },
                })
                .success(function(response){
                    console.log(response);
                    $("#total").text(response.total);
                    $("#blue").text(response.blue);
                    $("#red").text(response.red);
                    $("#green").text(response.green);

                });
            }
            check();
            setInterval("check()", 5000);
        </script>
    </body>
</html>
