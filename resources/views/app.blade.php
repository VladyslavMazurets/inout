<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">

    @routes
    @vite(['resources/js/app/index.ts', 'resources/css/app.css'])
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>