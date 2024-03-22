<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="csrf-token" content="{{ csrf_token() }}">
    <title>Taskify</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app">
    </div>
</body>
</html>