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
            <p class="text-xl font-bold mb-4"> Prezado(a) {{ $client->name }},</p>
            <p class="mb-4">Bem-vindo ao nosso site! Você foi adicionado como cliente por {{ $client->user->name }}! </p>
            <p class="mb-4">Estamos felizes em tê-lo a bordo e entusiasmados por ter a oportunidade de atendê-lo.</p>
            <p class="mb-4">Como novo cliente, você terá acesso a todos os nossos serviços e produtos!</p>
            <p class="mb-4">Se você tiver alguma dúvida ou preocupação, não hesite em nos contatar. Estamos sempre aqui para ajudar.</p>
            <p class="mb-4">Obrigado por escolher a nossa empresa. Estamos ansiosos para trabalhar com você.</p>
            <p class="mt-8">Atenciosamente,</p>
            <p class="font-bold">Time da Olivas Digital</p>
        </div>
    </body>
</html>
