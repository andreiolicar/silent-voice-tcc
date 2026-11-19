<x-public-layout>
    <section class="hero" id="projeto" aria-labelledby="project-title">
        <div class="shell hero-grid">
            <div class="hero-copy">
                <p class="eyebrow">TCC · Tecnologia assistiva</p>
                <h1 id="project-title">Uma nova forma<br class="hidden xl:block"> de <span>dar voz.</span></h1>
                <p class="hero-lead">O Silent Voice combina sinais musculares, movimentos dos lábios e contexto sonoro para ajudar a transformar a expressão em voz.</p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a class="button button-primary" href="#acervo">Explorar o acervo</a>
                    <a class="button button-outline" href="#funcionamento">Como funciona</a>
                </div>
            </div>
            <figure class="hero-figure">
                <div class="hero-orbit" aria-hidden="true"></div>
                <img class="hero-photo" src="{{ asset('brand/neckband.webp') }}" width="840" height="1050" fetchpriority="high"
                    alt="Ilustração de uma pessoa usando a neckband Silent Voice, com câmera e eletrodos no rosto.">
                <figcaption class="hero-caption">Ilustração do conceito da neckband Silent Voice</figcaption>
            </figure>
        </div>
    </section>

    <section class="border-y border-line bg-white" id="funcionamento" aria-labelledby="flow-title">
        <div class="shell py-10 sm:py-14">
            <h2 id="flow-title" class="section-title mb-7">Da articulação à voz</h2>
            <div class="grid gap-5 md:grid-cols-3 md:gap-8">
                <div class="flow-step">
                    <h3>Captar</h3>
                    <p>Eletrodos, câmera e microfone coletam pistas da articulação e da conversa.</p>
                </div>
                <div class="flow-step">
                    <h3>Interpretar</h3>
                    <p>Os núcleos de IA combinam as pistas para ajudar a reconhecer a palavra.</p>
                </div>
                <div class="flow-step">
                    <h3>Comunicar</h3>
                    <p>O conceito prevê a reprodução da palavra reconhecida em voz sintetizada.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="shell py-14 sm:py-20" id="nucleos" aria-labelledby="agents-title">
        <h2 id="agents-title" class="section-title">Três núcleos de inteligência</h2>
        <p class="mt-3 max-w-2xl text-muted">Cada núcleo representa uma fonte de informação para o reconhecimento da fala.</p>
        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @foreach ([
                ['Caio', 'Visão computacional', 'Acompanha movimentos dos lábios.', 'caio', 'bg-sky-50'],
                ['Lia', 'Sinais musculares', 'Interpreta a atividade elétrica facial.', 'lia', 'bg-violet-50'],
                ['Ravi', 'Áudio e contexto', 'Acrescenta pistas da conversa.', 'ravi', 'bg-rose-50'],
            ] as [$name, $area, $description, $image, $color])
                <article class="agent-card {{ $color }}">
                    <img src="{{ asset('brand/'.$image.'.webp') }}" alt="" width="96" height="96" loading="lazy">
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-muted">{{ $area }}</p>
                        <h3 class="mt-1 text-xl font-extrabold tracking-tight">{{ $name }}</h3>
                        <p class="mt-1 text-sm leading-relaxed text-muted">{{ $description }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="border-t border-line bg-canvas" id="acervo" aria-labelledby="archive-title">
        <div class="shell py-14 sm:py-20">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 id="archive-title" class="section-title">Acervo do TCC</h2>
                    <p class="mt-3 text-muted">Objetivos, público, tecnologia e metodologia do Silent Voice.</p>
                </div>
                <p class="text-sm font-semibold tabular-nums text-muted">{{ $records->count() }} {{ $records->count() === 1 ? 'registro' : 'registros' }}</p>
            </div>
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($records as $record)
                    <article class="record-card">
                        <p><span class="category">{{ $record->category }}</span></p>
                        <h3 class="mt-3 text-lg font-extrabold leading-snug tracking-tight">{{ $record->title }}</h3>
                        <p class="mb-5 mt-2 grow text-sm leading-relaxed text-muted">{{ $record->summary }}</p>
                        <a class="text-link mt-auto self-start" href="{{ route('records.show', $record) }}" aria-label="Ler registro: {{ $record->title }}">Ler registro</a>
                    </article>
                @empty
                    <p class="text-muted">O acervo está vazio.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-public-layout>
