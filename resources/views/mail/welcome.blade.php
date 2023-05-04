<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Welcome to our website!</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <div class="max-w-2xl mx-auto px-4 py-8">
            <p class="text-xl font-bold mb-4">Dear {{ $client->name }},</p>
            <p class="mb-4">Welcome to our website! You've been added as a client by {{ $client->user->name }}! </p>
            <p class="mb-4">We are glad to have you on board and excited to have the opportunity to serve you.</p>
            <p class="mb-4">As a new client, you will have access to all of our services and products!</p>
            <p class="mb-4">If you have any questions or concerns, please do not hesitate to contact us. We are always here to help.</p>
            <p class="mb-4">Thank you for choosing our company. We look forward to working with you.</p>
            <p class="mt-8">Sincerely,</p>
            <p class="font-bold">The Team at Olivas Digital</p>
        </div>
    </body>
</html>
