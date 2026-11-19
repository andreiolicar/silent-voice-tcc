<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Painel' }} | Silent Voice TCC</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('brand/icone.svg') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-canvas text-ink antialiased">
        <a href="#conteudo" class="skip-link">Pular para o conteúdo</a>
        @include('layouts.navigation')
        <main class="shell py-9 sm:py-12" id="conteudo" tabindex="-1">
            @isset($header)
                <header class="mb-7">{{ $header }}</header>
            @endisset
            {{ $slot }}
        </main>
    </body>
</html>
