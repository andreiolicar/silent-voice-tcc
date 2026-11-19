<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Acesso | Silent Voice TCC</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('brand/icone.svg') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-canvas text-ink antialiased">
        <x-site-header />
        <main class="shell grid justify-items-center py-12 sm:py-20">
            <section class="panel w-full max-w-md p-6 sm:p-9">
                <h1 class="mb-6 text-3xl font-extrabold tracking-tight">{{ $heading ?? 'Acesso ao painel' }}</h1>
                {{ $slot }}
            </section>
        </main>
    </body>
</html>
