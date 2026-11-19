<x-app-layout>
    <x-slot:title>Acervo do TCC</x-slot:title>
    <div class="mb-7 flex flex-wrap items-end justify-between gap-5">
        <div>
            <p class="eyebrow">Painel do projeto</p>
            <h1 class="page-title mt-2">Acervo do TCC</h1>
            <p class="mt-3 max-w-xl text-muted">Consulte as informações publicadas no site Silent Voice.</p>
        </div>
        @can('manage-records')
            <a class="button button-primary" href="{{ route('records.create') }}">Novo registro</a>
        @endcan
    </div>

    @if (session('status'))
        <p class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-900" role="status">{{ session('status') }}</p>
    @endif

    <section class="panel" aria-labelledby="records-heading">
        <div class="flex flex-wrap items-baseline justify-between gap-4 border-b border-line px-5 py-5 sm:px-7">
            <h2 id="records-heading" class="text-lg font-extrabold tracking-tight">Registros publicados</h2>
            <p class="text-sm font-semibold tabular-nums text-muted">{{ $records->count() }} {{ $records->count() === 1 ? 'registro' : 'registros' }}</p>
        </div>
        <ul class="divide-y divide-line">
            @forelse ($records as $record)
                <li class="grid gap-3 px-5 py-4 sm:grid-cols-[minmax(0,1fr)_8.2rem_auto] sm:items-center sm:gap-4 sm:px-7">
                    <div class="min-w-0">
                        <h3 class="break-words font-bold">{{ $record->title }}</h3>
                        <p class="mt-1 break-words text-sm text-muted">{{ $record->summary }}</p>
                    </div>
                    <p><span class="category">{{ $record->category }}</span></p>
                    <div class="flex items-center gap-3">
                        <a class="text-link" href="{{ route('records.show', $record) }}" aria-label="Ver: {{ $record->title }}">Ver</a>
                        @can('manage-records')
                            <a class="text-link" href="{{ route('records.edit', $record) }}" aria-label="Editar: {{ $record->title }}">Editar</a>
                            <div x-data>
                                <button class="text-link-danger" type="button" aria-label="Excluir: {{ $record->title }}" x-on:click="$refs.confirmation.showModal()">Excluir</button>
                                <dialog x-ref="confirmation" class="delete-dialog" aria-labelledby="delete-heading-{{ $record->id }}">
                                    <h4 id="delete-heading-{{ $record->id }}" class="text-xl font-extrabold">Excluir registro?</h4>
                                    <p class="mt-3 break-words text-muted">“{{ $record->title }}” será removido do painel e do acervo público.</p>
                                    <div class="mt-6 flex flex-wrap justify-end gap-3">
                                        <form method="dialog">
                                            <button class="button button-outline" autofocus>Cancelar</button>
                                        </form>
                                        <form method="POST" action="{{ route('records.destroy', $record) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button button-danger" type="submit">Excluir registro</button>
                                        </form>
                                    </div>
                                </dialog>
                            </div>
                        @endcan
                    </div>
                </li>
            @empty
                <li class="px-5 py-8 text-muted sm:px-7">Nenhum registro publicado.</li>
            @endforelse
        </ul>
    </section>
</x-app-layout>
