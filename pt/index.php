<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/site.php';

$page = [
    'locale' => 'pt',
    'path' => '/pt/',
    'title' => 'Limpeza e mudanças na Suíça | De Carvalho Service GmbH',
    'meta_description' => 'A De Carvalho Service GmbH oferece limpeza, limpeza final, mudanças, transporte de móveis e limpeza de escritórios na Suíça, com atendimento em português e alemão.',
    'structured_services' => [
        'Limpeza residencial',
        'Limpeza final',
        'Mudanças',
        'Transporte de móveis',
        'Limpeza de escritórios',
    ],
    'menu_label' => 'Abrir menu',
    'language_switcher_label' => 'Seletor de idioma',
    'languages' => [
        ['locale' => 'de-CH', 'storage' => 'de', 'label' => 'Deutsch', 'path' => '/de/'],
        ['locale' => 'pt', 'storage' => 'pt', 'label' => 'Português', 'path' => '/pt/'],
        ['locale' => 'en', 'storage' => 'en', 'label' => 'English', 'path' => '/en/'],
        ['locale' => 'fr', 'storage' => 'fr', 'label' => 'Français', 'path' => '/fr/'],
    ],
    'nav' => [
        ['id' => 'services', 'label' => 'Serviços'],
        ['id' => 'why', 'label' => 'Porquê nós'],
        ['id' => 'process', 'label' => 'Como funciona'],
        ['id' => 'contact', 'label' => 'Contacto'],
    ],
    'cta_primary' => 'Pedir orçamento gratuito',
    'cta_call' => 'Ligar agora',
    'cta_call_short' => 'Ligar',
    'cta_whatsapp' => 'Falar no WhatsApp',
    'cta_whatsapp_short' => 'WhatsApp',
    'cta_quote_short' => 'Orçamento',
    'whatsapp_message' => 'Olá, gostaria de pedir um orçamento para limpeza ou mudança.',
    'hero' => [
        'badge' => 'Limpeza, mudanças e transporte na Suíça',
        'title_start' => 'O seu parceiro de',
        'title_highlight' => 'confiança',
        'title_end' => 'para limpeza, mudanças e transporte',
        'summary' => 'Serviços de limpeza, apoio em mudanças, limpeza final e transporte para clientes particulares e empresas, com atendimento em português e alemão.',
        'image_alt' => 'Ilustração de limpeza e mudanças da De Carvalho Service GmbH',
        'stats' => [
            ['value' => 'PT · DE', 'label' => 'Atendimento em duas línguas'],
            ['value' => 'Casas', 'label' => 'Apartamentos, moradias e mudanças'],
            ['value' => 'Empresas', 'label' => 'Escritórios e limpeza recorrente'],
        ],
        'floating' => [
            ['title' => 'Organização clara', 'text' => 'Coordenação simples desde o primeiro pedido até ao dia do serviço'],
            ['title' => 'Transporte cuidado', 'text' => 'Apoio com móveis, caixas e deslocações programadas'],
            ['title' => 'PT e DE', 'text' => 'Comunicação adaptada ao idioma do cliente'],
        ],
    ],
    'trust' => [
        'label' => 'Resumo rápido do serviço',
        'items' => [
            ['icon' => 'chat', 'title' => 'Português e alemão', 'text' => 'Comunicação clara para pedidos, orçamento e agendamento'],
            ['icon' => 'phone', 'title' => 'Telefone, e-mail e WhatsApp', 'text' => 'Várias formas de contacto no dia a dia'],
            ['icon' => 'home', 'title' => 'Particular e empresarial', 'text' => 'Casas, apartamentos, escritórios e espaços pequenos'],
            ['icon' => 'truck', 'title' => 'Limpeza e mudanças', 'text' => 'Um único contacto para diferentes tipos de serviço'],
        ],
    ],
    'services' => [
        'eyebrow' => 'Os nossos serviços',
        'title' => 'Como podemos ajudar',
        'intro' => 'Desde limpezas regulares até mudanças e transporte de móveis, adaptamos cada pedido ao tipo de imóvel e ao ritmo do cliente.',
        'items' => [
            ['icon' => 'home', 'title' => 'Limpeza residencial', 'text' => 'Limpezas regulares ou pontuais para apartamentos, moradias e espaços habitados.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
            ['icon' => 'sparkles', 'title' => 'Limpeza final de saída', 'text' => 'Limpeza cuidadosa para mudança, entrega de imóvel ou preparação do espaço.', 'color' => '#d62828', 'bg' => '#fee2e2'],
            ['icon' => 'truck', 'title' => 'Mudanças e transporte de móveis', 'text' => 'Apoio no transporte de móveis, caixas e outros volumes entre moradas.', 'color' => '#15803d', 'bg' => '#dcfce7'],
            ['icon' => 'box', 'title' => 'Entregas e distribuição', 'text' => 'Serviços de transporte e entrega para necessidades particulares ou empresariais.', 'color' => '#d4a72c', 'bg' => '#fef3c7'],
            ['icon' => 'building', 'title' => 'Limpeza de escritórios e edifícios', 'text' => 'Manutenção de ambientes de trabalho e espaços comerciais de pequena e média dimensão.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
        ],
    ],
    'why' => [
        'eyebrow' => 'Porquê De Carvalho',
        'title' => 'Atendimento próximo e execução organizada',
        'intro' => 'A proposta é simples: facilitar a comunicação, alinhar bem o trabalho e executar o serviço com atenção ao que foi pedido.',
        'image_alt' => 'Materiais de limpeza e mudança em ilustração de apoio',
        'badge' => [
            'title' => 'PT/DE',
            'headline' => 'Contacto direto',
            'text' => 'Acompanhamento no idioma preferido do cliente',
        ],
        'items' => [
            ['title' => 'Orçamentos claros', 'text' => 'O pedido é analisado e o serviço é explicado de forma objetiva antes da confirmação.'],
            ['title' => 'Vários serviços ligados', 'text' => 'Limpeza, mudanças e transporte podem ser tratados na mesma conversa.'],
            ['title' => 'Contacto prático', 'text' => 'Telefone, e-mail e WhatsApp ficam disponíveis para dúvidas e agendamento.'],
        ],
    ],
    'process' => [
        'eyebrow' => 'Como funciona',
        'title' => 'Quatro passos para pedir o serviço',
        'intro' => 'Envie o seu pedido, explique o que precisa, confirme os detalhes e marque o serviço mais adequado para a sua situação.',
        'steps' => [
            ['title' => 'Enviar pedido', 'text' => 'Descreva o serviço pretendido pelo formulário, telefone ou WhatsApp.'],
            ['title' => 'Analisar necessidade', 'text' => 'O pedido é revisto e, se necessário, são colocadas questões de detalhe.'],
            ['title' => 'Confirmar orçamento', 'text' => 'Recebe um resumo do serviço e dos pontos principais antes de avançar.'],
            ['title' => 'Realizar o serviço', 'text' => 'No dia combinado, a equipa executa o trabalho segundo o combinado.'],
        ],
    ],
    'contact' => [
        'eyebrow' => 'Entrar em contacto',
        'title' => 'Peça o seu orçamento',
        'intro' => 'Use o formulário para enviar o pedido ou escolha o canal mais prático para falar connosco diretamente.',
        'phone_sub' => 'Atendimento em português ou alemão',
        'email_label' => 'E-mail',
        'email_sub' => 'Para orçamentos e pedidos gerais',
        'whatsapp_label' => 'WhatsApp',
        'whatsapp_sub' => 'Mensagem pré-preenchida para começar mais rápido',
        'form_title' => 'Pedido rápido',
        'form_intro' => 'Conte-nos brevemente que tipo de serviço procura.',
        'honeypot_label' => 'Empresa',
        'fields' => [
            'name' => 'Nome',
            'contact' => 'E-mail ou telefone',
            'service' => 'Serviço',
            'message' => 'Mensagem',
        ],
        'privacy_note' => 'Os dados enviados serão usados apenas para responder ao seu pedido de orçamento.',
        'submit' => 'Enviar pedido',
        'messages' => [
            'success' => 'Obrigado. O seu pedido foi enviado com sucesso.',
            'generic_error' => 'Não foi possível enviar o pedido. Tente novamente ou contacte-nos por telefone ou e-mail.',
            'loading' => 'A enviar pedido...',
        ],
    ],
    'form_locale' => 'pt',
    'footer' => [
        'tagline' => 'A De Carvalho Service GmbH apoia clientes com limpeza, mudanças e transporte na Suíça.',
        'legal' => '© 2026 De Carvalho Service GmbH. Todos os direitos reservados.',
    ],
];

require __DIR__ . '/../config/render-page.php';
