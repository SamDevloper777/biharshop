<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') {{env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
<!-- <style>
        /* Custom styles for the card */
        .card {
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .card.selected {
            border-color: #4ade80; /* Tailwind green-400 */
            background-color: #d1fae5; /* Tailwind green-100 */
        }
        .card input[type="radio"] {
            display: none; /* Hide the radio button */
        }
    </style> -->
    <x-home-navbar/>

    @section('content')
    
    @show

    
    
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>