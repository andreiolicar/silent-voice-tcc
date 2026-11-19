@php($heading = $record->exists ? 'Editar registro' : 'Novo registro')

<x-app-layout>
    <x-slot:title>{{ $heading }}</x-slot:title>
    <div class="max-w-3xl">
        <a class="text-link" href="{{ route('dashboard') }}">Voltar ao painel</a>
        <h1 class="page-title mb-7 mt-4">{{ $heading }}</h1>

        <form class="panel grid gap-5 p-6 sm:p-8" method="POST" action="{{ $record->exists ? route('records.update', $record) : route('records.store') }}">
            @csrf
            @if ($record->exists)
                @method('PATCH')
            @endif

            <div>
                <label class="field-label" for="title">Título</label>
                <input class="field" id="title" name="title" value="{{ old('title', $record->title) }}" maxlength="120" required
                    @error('title') aria-invalid="true" aria-describedby="title-error" @enderror>
                @error('title') <p id="title-error" class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="field-label" for="category">Categoria</label>
                <select class="field" id="category" name="category" required
                    @error('category') aria-invalid="true" aria-describedby="category-error" @enderror>
                    <option value="">Selecione uma categoria</option>
                    @foreach (\App\Models\ProjectRecord::CATEGORIES as $category)
                        <option @selected(old('category', $record->category) === $category)>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category') <p id="category-error" class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="field-label" for="summary">Resumo</label>
                <textarea class="field" id="summary" name="summary" rows="2" maxlength="240" required
                    @error('summary') aria-invalid="true" aria-describedby="summary-error" @enderror>{{ old('summary', $record->summary) }}</textarea>
                @error('summary') <p id="summary-error" class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="field-label" for="body">Conteúdo completo</label>
                <textarea class="field" id="body" name="body" rows="5" maxlength="12000" required
                    @error('body') aria-invalid="true" aria-describedby="body-error" @enderror>{{ old('body', $record->body) }}</textarea>
                @error('body') <p id="body-error" class="field-error">{{ $message }}</p> @enderror
            </div>
            <div class="flex flex-wrap gap-3 border-t border-line pt-5">
                <button class="button button-primary" type="submit">{{ $record->exists ? 'Salvar alterações' : 'Publicar registro' }}</button>
                <a class="button button-outline" href="{{ route('dashboard') }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
