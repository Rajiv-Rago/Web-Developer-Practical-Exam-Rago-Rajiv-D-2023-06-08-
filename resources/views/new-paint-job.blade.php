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
            div, h6{
                padding-left: 20px;
            }
            input, select{
                width:200px;
                  
            }
            h1, .images {
                text-align: center;
            }
            form, h3{
                padding-left:40px;
            }
            .label{
                padding-right:40px;
            }
        </style>
    </head>
    <body>
        <h1>New Paint Job</h1>
        <div class="images">
            <img id="current_img" src="{{ URL('img/default.png') }}" style = "margin-right: 200px">
            
            <img id="target_img" src="{{ URL('img/default.png') }}">
        </div>
        <h6>Car Details</h6>
        <form action="/new-paint-job" method="POST"> @csrf
            <table>
                <tr>
                    <td class="label">Plate No.</td>
                    <td><input name="plateNo" type="text"></td>
                </tr>

                <tr>
                    <td class="label">Current Color</td>
                    <td>
                        <select name='currentColor' id="current">
                        <option value="" selected disabled hidden>Choose a color</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Blue">Blue</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Target Color</td>
                    <td>
                        <select name='targetColor' id="target">
                        <option value="" selected disabled hidden>Choose a color</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Blue">Blue</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" class="bg-danger text-white" style="border:none">
        </form>

        <script src="https://code.jquery.com/jquery.js"></script>
        <script>
            $("#current").on('input', function(){
                console.log($(this).val());
                if($(this).val() == "Red"){
                    $("#current_img").attr('src', "{{ URL('img/red.png') }}")
                }else if($(this).val() == "Green"){
                    $("#current_img").attr('src', "{{ URL('img/green.png') }}")
                }else if($(this).val() == "Blue"){
                    $("#current_img").attr('src', "{{ URL('img/blue.png') }}")
                }
                

            });

            $("#target").on('input', function(){
                console.log($(this).val());
                if($(this).val() == "Red"){
                    $("#target_img").attr('src', "{{ URL('img/red.png') }}")
                }else if($(this).val() == "Green"){
                    $("#target_img").attr('src', "{{ URL('img/green.png') }}")
                }else if($(this).val() == "Blue"){
                    $("#target_img").attr('src', "{{ URL('img/blue.png') }}")
                }
                
            });
        </script>
        </body>