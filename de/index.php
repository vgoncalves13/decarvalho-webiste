<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/site.php';

$page = [
    'locale' => 'de-CH',
    'path' => '/de/',
    'title' => 'Reinigung und Umzug in der Schweiz | De Carvalho Service GmbH',
    'meta_description' => 'De Carvalho Service GmbH bietet Reinigung, Endreinigung, Umzug, Möbeltransport und Büroreinigung in der Schweiz mit Betreuung auf Deutsch, Portugiesisch, Englisch und Französisch.',
    'structured_services' => [
        'Reinigung',
        'Endreinigung',
        'Umzug',
        'Möbeltransport',
        'Büroreinigung',
    ],
    'menu_label' => 'Menü öffnen',
    'language_switcher_label' => 'Sprachauswahl',
    'languages' => [
        ['locale' => 'de-CH', 'storage' => 'de', 'label' => 'Deutsch', 'path' => '/de/'],
        ['locale' => 'pt', 'storage' => 'pt', 'label' => 'Português', 'path' => '/pt/'],
        ['locale' => 'en', 'storage' => 'en', 'label' => 'English', 'path' => '/en/'],
        ['locale' => 'fr', 'storage' => 'fr', 'label' => 'Français', 'path' => '/fr/'],
    ],
    'nav' => [
        ['id' => 'services', 'label' => 'Leistungen'],
        ['id' => 'why', 'label' => 'Warum wir'],
        ['id' => 'process', 'label' => 'Ablauf'],
        ['id' => 'contact', 'label' => 'Kontakt'],
    ],
    'cta_primary' => 'Kostenlose Offerte anfordern',
    'cta_call' => 'Jetzt anrufen',
    'cta_call_short' => 'Anrufen',
    'cta_whatsapp' => 'WhatsApp schreiben',
    'cta_whatsapp_short' => 'WhatsApp',
    'cta_quote_short' => 'Offerte',
    'whatsapp_message' => 'Guten Tag, ich möchte eine Offerte für Reinigung oder Umzug anfragen.',
    'hero' => [
        'badge' => 'Reinigung, Umzug und Transport in der Schweiz',
        'title_start' => 'Ihr zuverlässiger',
        'title_highlight' => 'Partner',
        'title_end' => 'für Reinigung, Umzug und Transporte',
        'summary' => 'Professionelle Reinigung, Wohnungsabgaben, Umzugshilfe und Transportlösungen für Privat- und Geschäftskunden mit Betreuung auf Deutsch, Portugiesisch, Englisch und Französisch.',
        'image_alt' => 'Illustration für Reinigung und Umzug von De Carvalho Service GmbH',
        'stats' => [
            ['value' => 'DE · PT · EN · FR', 'label' => 'Betreuung in vier Sprachen'],
            ['value' => 'Privat', 'label' => 'Wohnungen, Häuser und Umzüge'],
            ['value' => 'Gewerbe', 'label' => 'Büros und laufende Reinigung'],
        ],
        'floating' => [
            ['title' => 'Saubere Abläufe', 'text' => 'Klare Kommunikation vom ersten Kontakt bis zum Termin'],
            ['title' => 'Sorgfältiger Transport', 'text' => 'Unterstützung bei Umzug, Möbeln und Lieferfahrten'],
            ['title' => 'DE · PT · EN · FR', 'text' => 'Kontaktaufnahme in Deutsch, Portugiesisch, Englisch oder Französisch'],
        ],
    ],
    'trust' => [
        'label' => 'Kurze Übersicht über den Service',
        'items' => [
            ['icon' => 'chat', 'title' => 'Vier Sprachen', 'text' => 'Klare Kommunikation für Anfrage und Termin auf Deutsch, Portugiesisch, Englisch oder Französisch'],
            ['icon' => 'phone', 'title' => 'Telefon, E-Mail und WhatsApp', 'text' => 'Direkter Kontakt über den passenden Kanal'],
            ['icon' => 'home', 'title' => 'Privat und Gewerblich', 'text' => 'Wohnungen, Häuser, Büros und kleinere Gebäude'],
            ['icon' => 'truck', 'title' => 'Reinigung und Umzug', 'text' => 'Ein Ansprechpartner für mehrere Servicearten'],
        ],
    ],
    'services' => [
        'eyebrow' => 'Unsere Dienstleistungen',
        'title' => 'Was wir für Sie übernehmen können',
        'intro' => 'Ob regelmässige Reinigung, Wohnungsabgabe oder Möbeltransport: Wir planen den Einsatz sorgfältig und stimmen den Service auf Ihren Bedarf ab.',
        'items' => [
            ['icon' => 'home', 'title' => 'Wohnungsreinigung', 'text' => 'Regelmässige oder einmalige Reinigung für Wohnungen und Häuser.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
            ['icon' => 'sparkles', 'title' => 'Endreinigung für Wohnungsabgaben', 'text' => 'Sorgfältige Schlussreinigung für Umzug, Übergabe und Objektwechsel.', 'color' => '#d62828', 'bg' => '#fee2e2'],
            ['icon' => 'truck', 'title' => 'Umzug und Möbeltransport', 'text' => 'Unterstützung beim Transport von Möbeln, Kartons und Einrichtung.', 'color' => '#15803d', 'bg' => '#dcfce7'],
            ['icon' => 'box', 'title' => 'Lieferung und Verteilung', 'text' => 'Geordnete Transport- und Lieferfahrten für private und geschäftliche Aufträge.', 'color' => '#d4a72c', 'bg' => '#fef3c7'],
            ['icon' => 'building', 'title' => 'Büro- und Gebäudereinigung', 'text' => 'Saubere Arbeitsumgebungen für Büros, Praxen und kleinere Gewerbeflächen.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
        ],
    ],
    'why' => [
        'eyebrow' => 'Warum De Carvalho',
        'title' => 'Strukturiert, freundlich und verlässlich im Alltag',
        'intro' => 'Sie erhalten einen direkten Ansprechpartner, eine nachvollziehbare Offerte und einen Service, der auf einfache Abstimmung und saubere Ausführung setzt.',
        'image_alt' => 'Materialien für Reinigung und Umzug als Platzhaltergrafik',
        'badge' => [
            'title' => '4 Sprachen',
            'headline' => 'Persönlicher Kontakt',
            'text' => 'Abstimmung in Deutsch, Portugiesisch, Englisch oder Französisch je nach Wunsch',
        ],
        'items' => [
            ['title' => 'Klare Offerten', 'text' => 'Leistungsumfang und gewünschter Termin werden sauber abgestimmt, bevor der Einsatz startet.'],
            ['title' => 'Breiter Servicefokus', 'text' => 'Reinigung, Umzug und Transport lassen sich über einen Ansprechpartner koordinieren.'],
            ['title' => 'Praktische Erreichbarkeit', 'text' => 'Telefon, E-Mail und WhatsApp stehen für Rückfragen und Terminabsprachen bereit.'],
        ],
    ],
    'process' => [
        'eyebrow' => 'So läuft es ab',
        'title' => 'In vier Schritten zur Anfrage',
        'intro' => 'Sie schildern den Bedarf, wir prüfen den Auftrag, stimmen Details ab und organisieren den passenden Termin.',
        'steps' => [
            ['title' => 'Anfrage senden', 'text' => 'Beschreiben Sie Reinigung, Umzug oder Transport kurz per Formular, Telefon oder WhatsApp.'],
            ['title' => 'Bedarf prüfen', 'text' => 'Wir sichten den Auftrag und klären bei Bedarf offene Punkte mit Ihnen.'],
            ['title' => 'Offerte bestätigen', 'text' => 'Sie erhalten die wichtigsten Eckdaten für Termin und Leistungsumfang.'],
            ['title' => 'Einsatz durchführen', 'text' => 'Am bestätigten Termin wird der Service wie abgesprochen ausgeführt.'],
        ],
    ],
    'contact' => [
        'eyebrow' => 'Kontakt aufnehmen',
        'title' => 'Kostenlose Offerte anfragen',
        'intro' => 'Nutzen Sie das Formular für Ihre Anfrage oder kontaktieren Sie uns direkt per Telefon, E-Mail oder WhatsApp.',
        'phone_sub' => 'Kontakt in Deutsch, Portugiesisch, Englisch oder Französisch',
        'email_label' => 'E-Mail',
        'email_sub' => 'Für Offerten und allgemeine Anfragen',
        'whatsapp_label' => 'WhatsApp',
        'whatsapp_sub' => 'Schneller Kontakt mit vorbereiteter Nachricht',
        'form_title' => 'Schnelle Anfrage',
        'form_intro' => 'Teilen Sie uns kurz mit, welche Art von Service Sie benötigen.',
        'honeypot_label' => 'Firmenname',
        'fields' => [
            'name' => 'Name',
            'contact' => 'E-Mail oder Telefon',
            'service' => 'Dienstleistung',
            'message' => 'Nachricht',
        ],
        'privacy_note' => 'Ihre Angaben werden ausschliesslich verwendet, um Ihre Anfrage zu beantworten.',
        'submit' => 'Offerte absenden',
        'messages' => [
            'success' => 'Vielen Dank. Ihre Anfrage wurde erfolgreich gesendet.',
            'generic_error' => 'Die Anfrage konnte nicht gesendet werden. Bitte versuchen Sie es erneut oder nutzen Sie Telefon oder E-Mail.',
            'loading' => 'Anfrage wird gesendet...',
        ],
    ],
    'form_locale' => 'de',
    'footer' => [
        'tagline' => 'De Carvalho Service GmbH unterstützt bei Reinigung, Umzug und Transport in der Schweiz.',
        'legal' => '© 2026 De Carvalho Service GmbH. Alle Rechte vorbehalten.',
    ],
];

require __DIR__ . '/../config/render-page.php';
