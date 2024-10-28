<!DOCTYPE html>
<html class="h-full bg-gray-100/50" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">

    <title>{{ ___('craftable-pro', 'Craftable PRO') }}</title>

    @routes

    @vite(['resources/js/craftable-pro/index.ts', 'resources/css/craftable-pro.css'])

    @inertiaHead
</head>

<body class="h-full">
    @inertia
</body>

</html>