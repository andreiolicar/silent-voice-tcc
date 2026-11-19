<x-public-layout :title="$record->title">
    <div class="shell py-10 sm:py-16">
        <article class="panel mx-auto max-w-3xl p-6 sm:p-12">
            <div class="mb-7 flex flex-wrap items-center gap-x-5 gap-y-2">
                <a class="text-link" href="{{ route('home') }}#acervo">Voltar ao acervo</a>
                @auth
                    <a class="text-link" href="{{ route('dashboard') }}">Voltar ao painel</a>
                @endauth
            </div>
            <p><span class="category">{{ $record->category }}</span></p>
            <h1 class="page-title mt-4 break-words">{{ $record->title }}</h1>
            <p class="mt-5 break-words text-lg leading-relaxed text-muted">{{ $record->summary }}</p>
            <div class="mt-6 whitespace-pre-line break-words border-t border-line pt-6 leading-relaxed">{{ $record->body }}</div>
            @can('manage-records')
                <a class="button button-outline mt-8" href="{{ route('records.edit', $record) }}">Editar registro</a>
            @endcan
        </article>
    </div>
</x-public-layout>
