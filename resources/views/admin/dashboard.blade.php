@extends('admin.layouts.main')

@section('container')

<!DOCTYPE html>
<html>
<head>
    <title>Example of a blinking text using CSS within a marquee</title>
    <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <h3>Dashboard</h3>


</body>
</html>
    
@endsection