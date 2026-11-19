<?php

namespace Database\Seeders;

use App\Models\ProjectRecord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectRecordSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'Visão geral do Silent Voice',
                'Projeto',
                'Tecnologia assistiva para apoiar a comunicação de pessoas com limitações na fala.',
                'O Silent Voice investiga como transformar movimentos de articulação em voz sintetizada. A proposta reúne um dispositivo vestível de pescoço e núcleos de inteligência artificial que interpretam sinais musculares, movimentos dos lábios e contexto sonoro.',
            ],
            [
                'Público e problema de pesquisa',
                'Acessibilidade',
                'Barreiras à comunicação para pessoas com perda total ou parcial da voz e dificuldades na fala.',
                'O projeto é pensado para pessoas cuja voz ou articulação limita a participação em conversas. A questão de pesquisa é como combinar sinais disponíveis durante a articulação para apoiar a comunicação em situações do cotidiano.',
            ],
            [
                'Objetivos do TCC',
                'Projeto',
                'Estudar e prototipar uma interface capaz de captar, interpretar e reproduzir a fala articulada.',
                'O objetivo geral é investigar o reconhecimento de palavras com múltiplas fontes de informação. Os objetivos específicos incluem captar sinais musculares e visuais, avaliar como o contexto sonoro ajuda a distinguir palavras e explorar a reprodução do resultado em voz.',
            ],
            [
                'Dispositivo vestível de pescoço',
                'Tecnologia',
                'A neckband reúne os elementos de captura e a saída de áudio da proposta.',
                'O conceito de hardware prevê eletrodos para eletromiografia, uma câmera voltada aos lábios, um microfone para contexto e um alto-falante para reproduzir o resultado. O formato de pescoço permite posicionar os componentes próximos à face.',
            ],
            [
                'Caio · visão computacional',
                'Tecnologia',
                'A câmera acompanha o contorno e a abertura dos lábios durante a articulação.',
                'Caio representa o núcleo visual do Silent Voice. Ele usa o movimento dos lábios como pista temporal para ajudar a distinguir as palavras articuladas e complementar a informação capturada pelos eletrodos.',
            ],
            [
                'Lia · sinais musculares',
                'Tecnologia',
                'A eletromiografia registra a atividade elétrica dos músculos da face.',
                'Lia representa o núcleo de eletromiografia (EMG). Eletrodos na face registram a atividade muscular gerada durante a articulação. Esses sinais acrescentam informação sobre o esforço e o padrão temporal dos movimentos.',
            ],
            [
                'Ravi · áudio e contexto',
                'Tecnologia',
                'O microfone acrescenta pistas sobre o contexto da conversa.',
                'Ravi representa o núcleo de áudio e contexto. A proposta é usar informações como o assunto recente da conversa para complementar os sinais visual e muscular. Se alguém oferecer água ou café, por exemplo, esse contexto ajuda a delimitar as respostas prováveis.',
            ],
            [
                'Fluxo multimodal de reconhecimento',
                'Metodologia',
                'O fluxo combina a captura de sinais, a interpretação conjunta e a comunicação em áudio.',
                'A primeira etapa coleta os sinais disponíveis durante a articulação. Na interpretação, as modalidades fornecem pistas complementares para o reconhecimento da palavra. Na última etapa, o sistema prevê a reprodução da palavra reconhecida por meio de voz sintetizada.',
            ],
            [
                'Aplicativo e reprodução de voz',
                'Tecnologia',
                'O aplicativo integra a experiência do dispositivo e o protótipo prevê saída sonora.',
                'O aplicativo é a interface de apoio à experiência com o Silent Voice. O conceito completo prevê que palavras reconhecidas sejam reproduzidas em voz sintetizada pelo alto-falante do dispositivo.',
            ],
            [
                'Metodologia e avaliação do protótipo',
                'Metodologia',
                'Ensaios controlados ajudam a investigar a contribuição de cada modalidade.',
                'A proposta de avaliação envolve observar a qualidade da captura de cada sinal, comparar o reconhecimento com diferentes combinações e registrar limitações. Precisão, tempo de resposta e conforto do dispositivo são aspectos a investigar nos ensaios.',
            ],
        ];

        DB::transaction(function () use ($records) {
            foreach ($records as [$title, $category, $summary, $body]) {
                ProjectRecord::firstOrCreate(compact('title'), compact('category', 'summary', 'body'));
            }
        });
    }
}
