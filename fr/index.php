<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/site.php';

$page = [
    'locale' => 'fr',
    'path' => '/fr/',
    'title' => 'Nettoyage et déménagement en Suisse | De Carvalho Service GmbH',
    'meta_description' => 'De Carvalho Service GmbH propose nettoyage, nettoyage de fin de bail, aide au déménagement, transport de meubles et nettoyage de bureaux en Suisse, avec accompagnement en français, allemand et portugais.',
    'structured_services' => [
        'Nettoyage résidentiel',
        'Nettoyage de fin de bail',
        'Aide au déménagement',
        'Transport de meubles',
        'Nettoyage de bureaux',
    ],
    'menu_label' => 'Ouvrir le menu',
    'language_switcher_label' => 'Sélecteur de langue',
    'languages' => [
        ['locale' => 'de-CH', 'storage' => 'de', 'label' => 'Deutsch', 'path' => '/de/'],
        ['locale' => 'pt', 'storage' => 'pt', 'label' => 'Português', 'path' => '/pt/'],
        ['locale' => 'en', 'storage' => 'en', 'label' => 'English', 'path' => '/en/'],
        ['locale' => 'fr', 'storage' => 'fr', 'label' => 'Français', 'path' => '/fr/'],
    ],
    'nav' => [
        ['id' => 'services', 'label' => 'Services'],
        ['id' => 'why', 'label' => 'Pourquoi nous'],
        ['id' => 'process', 'label' => 'Fonctionnement'],
        ['id' => 'contact', 'label' => 'Contact'],
    ],
    'cta_primary' => 'Demander un devis gratuit',
    'cta_call' => 'Appeler',
    'cta_call_short' => 'Appeler',
    'cta_whatsapp' => 'Écrire sur WhatsApp',
    'cta_whatsapp_short' => 'WhatsApp',
    'cta_quote_short' => 'Devis',
    'whatsapp_message' => 'Bonjour, je souhaite demander un devis pour un service de nettoyage ou de déménagement.',
    'hero' => [
        'badge' => 'Nettoyage, déménagement et transport en Suisse',
        'title_start' => 'Votre partenaire de',
        'title_highlight' => 'confiance',
        'title_end' => 'pour le nettoyage, le déménagement et le transport',
        'summary' => 'Services de nettoyage, aide au déménagement, nettoyage de sortie et transport pour particuliers et entreprises, avec communication en français, allemand et portugais.',
        'image_alt' => 'Illustration nettoyage et déménagement pour De Carvalho Service GmbH',
        'stats' => [
            ['value' => 'FR · DE · PT', 'label' => 'Accompagnement en plusieurs langues'],
            ['value' => 'Logements', 'label' => 'Appartements, maisons et déménagements'],
            ['value' => 'Entreprises', 'label' => 'Bureaux et nettoyage régulier'],
        ],
        'floating' => [
            ['title' => 'Organisation claire', 'text' => 'Coordination simple du premier message au jour du service'],
            ['title' => 'Transport soigné', 'text' => 'Aide pour meubles, cartons et trajets planifiés'],
            ['title' => 'Contact souple', 'text' => 'Échange en français, allemand ou portugais'],
        ],
    ],
    'trust' => [
        'label' => 'Aperçu rapide du service',
        'items' => [
            ['icon' => 'chat', 'title' => 'Communication multilingue', 'text' => 'Français, allemand et portugais pour les demandes et l’organisation'],
            ['icon' => 'phone', 'title' => 'Téléphone, e-mail et WhatsApp', 'text' => 'Choisissez le canal de contact le plus pratique'],
            ['icon' => 'home', 'title' => 'Clients privés et professionnels', 'text' => 'Logements, appartements, bureaux et petits espaces commerciaux'],
            ['icon' => 'truck', 'title' => 'Nettoyage et déménagement', 'text' => 'Un seul interlocuteur pour plusieurs types de services'],
        ],
    ],
    'services' => [
        'eyebrow' => 'Nos services',
        'title' => 'Comment nous pouvons vous aider',
        'intro' => 'Du nettoyage régulier à l’aide au déménagement et au transport de meubles, chaque mission est organisée selon le lieu et le rythme du client.',
        'items' => [
            ['icon' => 'home', 'title' => 'Nettoyage résidentiel', 'text' => 'Nettoyage régulier ou ponctuel pour appartements, maisons et espaces habités.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
            ['icon' => 'sparkles', 'title' => 'Nettoyage de fin de bail', 'text' => 'Nettoyage soigné avant un déménagement, une remise de clés ou un changement de logement.', 'color' => '#d62828', 'bg' => '#fee2e2'],
            ['icon' => 'truck', 'title' => 'Déménagement et transport de meubles', 'text' => 'Aide pour déplacer meubles, cartons et autres objets domestiques.', 'color' => '#15803d', 'bg' => '#dcfce7'],
            ['icon' => 'box', 'title' => 'Livraisons et distribution', 'text' => 'Services de transport et de livraison pour besoins privés ou professionnels.', 'color' => '#d4a72c', 'bg' => '#fef3c7'],
            ['icon' => 'building', 'title' => 'Nettoyage de bureaux et bâtiments', 'text' => 'Nettoyage pour bureaux et petits ou moyens espaces commerciaux.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
        ],
    ],
    'why' => [
        'eyebrow' => 'Pourquoi De Carvalho',
        'title' => 'Un contact simple et une exécution organisée',
        'intro' => 'L’objectif est simple: garder une communication fluide, bien cadrer la mission et réaliser le service convenu avec soin.',
        'image_alt' => 'Illustration de soutien au nettoyage et au déménagement',
        'badge' => [
            'title' => 'FR/DE/PT',
            'headline' => 'Communication directe',
            'text' => 'Suivi dans la langue qui vous convient le mieux',
        ],
        'items' => [
            ['title' => 'Devis clairs', 'text' => 'La demande est étudiée et le périmètre du service est expliqué avant confirmation.'],
            ['title' => 'Services liés', 'text' => 'Nettoyage, déménagement et transport peuvent être gérés dans le même échange.'],
            ['title' => 'Contact pratique', 'text' => 'Téléphone, e-mail et WhatsApp restent disponibles pour questions et planification.'],
        ],
    ],
    'process' => [
        'eyebrow' => 'Fonctionnement',
        'title' => 'Quatre étapes pour demander un service',
        'intro' => 'Envoyez votre demande, expliquez votre besoin, confirmez les détails puis planifiez le service adapté à votre situation.',
        'steps' => [
            ['title' => 'Envoyer la demande', 'text' => 'Décrivez le service souhaité via formulaire, téléphone ou WhatsApp.'],
            ['title' => 'Analyser le besoin', 'text' => 'La demande est vérifiée et des précisions sont demandées si nécessaire.'],
            ['title' => 'Confirmer le devis', 'text' => 'Vous recevez les points essentiels du service avant de continuer.'],
            ['title' => 'Planifier le service', 'text' => 'L’intervention est réalisée à la date convenue selon le périmètre validé.'],
        ],
    ],
    'contact' => [
        'eyebrow' => 'Prendre contact',
        'title' => 'Demandez votre devis',
        'intro' => 'Utilisez le formulaire pour envoyer votre demande ou choisissez le canal le plus pratique pour nous contacter directement.',
        'phone_sub' => 'Accompagnement en français, allemand ou portugais',
        'email_label' => 'E-mail',
        'email_sub' => 'Pour devis et demandes générales',
        'whatsapp_label' => 'WhatsApp',
        'whatsapp_sub' => 'Commencez plus vite avec un message prérempli',
        'form_title' => 'Demande rapide',
        'form_intro' => 'Indiquez brièvement le type de service recherché.',
        'honeypot_label' => 'Entreprise',
        'fields' => [
            'name' => 'Nom',
            'contact' => 'E-mail ou téléphone',
            'service' => 'Service',
            'message' => 'Message',
        ],
        'privacy_note' => 'Les coordonnées envoyées sont utilisées uniquement pour répondre à votre demande de devis.',
        'submit' => 'Envoyer la demande',
        'messages' => [
            'success' => 'Merci. Votre demande a bien été envoyée.',
            'generic_error' => 'La demande n’a pas pu être envoyée. Veuillez réessayer ou nous contacter par téléphone ou e-mail.',
            'loading' => 'Envoi de la demande...',
        ],
    ],
    'form_locale' => 'fr',
    'footer' => [
        'tagline' => 'De Carvalho Service GmbH accompagne ses clients pour le nettoyage, le déménagement et le transport en Suisse.',
        'legal' => '© 2026 De Carvalho Service GmbH. Tous droits réservés.',
    ],
];

require __DIR__ . '/../config/render-page.php';
