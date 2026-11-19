@props(['title' => 'Tecnologia assistiva para comunicação'])

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Conheça o Silent Voice, um projeto de TCC sobre tecnologia assistiva para comunicação.">
        <title>{{ $title }} | Silent Voice TCC</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('brand/icone.svg') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-ink antialiased">
        <a href="#conteudo" class="skip-link">Pular para o conteúdo</a>
        <x-site-header />
        <main id="conteudo" tabindex="-1">
            {{ $slot }}
        </main>
        <x-site-footer />
    </body>
</html>
