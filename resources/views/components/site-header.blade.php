<header class="relative z-10 border-b border-line bg-white">
    <div class="shell flex min-h-[4.5rem] flex-wrap items-center justify-between gap-x-6 gap-y-3 py-3">
        <x-brand />
        <nav aria-label="Navegação principal" class="order-3 flex w-full flex-wrap items-center gap-x-6 gap-y-2 text-sm font-semibold text-muted sm:order-none sm:w-auto sm:gap-7">
            <a class="nav-link" href="{{ route('home') }}#projeto">O projeto</a>
            <a class="nav-link" href="{{ route('home') }}#nucleos">Núcleos de IA</a>
            <a class="nav-link" href="{{ route('home') }}#acervo">Acervo</a>
        </nav>
        @auth
            <a class="button button-outline button-small" href="{{ route('dashboard') }}">Painel</a>
        @else
            <a class="button button-outline button-small" href="{{ route('login') }}">Entrar</a>
        @endauth
    </div>
</header>
