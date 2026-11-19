<header class="border-b border-line bg-white">
    <div class="shell flex min-h-[4.5rem] flex-wrap items-center justify-between gap-x-7 gap-y-3 py-3">
        <div class="flex flex-wrap items-center gap-x-6 gap-y-3">
            <x-brand />
            <a class="nav-link text-sm font-semibold" href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>Painel</a>
            <a class="nav-link text-sm font-semibold" href="{{ route('home') }}">Ver site</a>
        </div>
        <nav class="flex flex-wrap items-center gap-4" aria-label="Conta">
            <a class="nav-link text-sm font-semibold" href="{{ route('profile.edit') }}">Minha conta</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button button-small button-outline">Sair</button>
            </form>
        </nav>
    </div>
</header>
