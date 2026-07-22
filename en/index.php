<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/site.php';

$page = [
    'locale' => 'en',
    'path' => '/en/',
    'title' => 'Cleaning and moving in Switzerland | De Carvalho Service GmbH',
    'meta_description' => 'De Carvalho Service GmbH provides cleaning, move-out cleaning, moving support, furniture transport and office cleaning in Switzerland, with service in English, German and Portuguese.',
    'structured_services' => [
        'Residential cleaning',
        'Move-out cleaning',
        'Moving support',
        'Furniture transport',
        'Office cleaning',
    ],
    'menu_label' => 'Open menu',
    'language_switcher_label' => 'Language selector',
    'languages' => [
        ['locale' => 'de-CH', 'storage' => 'de', 'label' => 'Deutsch', 'path' => '/de/'],
        ['locale' => 'pt', 'storage' => 'pt', 'label' => 'Português', 'path' => '/pt/'],
        ['locale' => 'en', 'storage' => 'en', 'label' => 'English', 'path' => '/en/'],
        ['locale' => 'fr', 'storage' => 'fr', 'label' => 'Français', 'path' => '/fr/'],
    ],
    'nav' => [
        ['id' => 'services', 'label' => 'Services'],
        ['id' => 'why', 'label' => 'Why us'],
        ['id' => 'process', 'label' => 'How it works'],
        ['id' => 'contact', 'label' => 'Contact'],
    ],
    'cta_primary' => 'Request a free quote',
    'cta_call' => 'Call now',
    'cta_call_short' => 'Call',
    'cta_whatsapp' => 'Message on WhatsApp',
    'cta_whatsapp_short' => 'WhatsApp',
    'cta_quote_short' => 'Quote',
    'whatsapp_message' => 'Hello, I would like to request a quote for cleaning or moving services.',
    'hero' => [
        'badge' => 'Cleaning, moving and transport in Switzerland',
        'title_start' => 'Your trusted',
        'title_highlight' => 'partner',
        'title_end' => 'for cleaning, moving and transport',
        'summary' => 'Cleaning services, moving support, move-out cleaning and transport for private clients and businesses, with communication in English, German and Portuguese.',
        'image_alt' => 'Cleaning and moving illustration for De Carvalho Service GmbH',
        'stats' => [
            ['value' => 'EN · DE · PT', 'label' => 'Support in multiple languages'],
            ['value' => 'Homes', 'label' => 'Apartments, houses and moving jobs'],
            ['value' => 'Business', 'label' => 'Offices and recurring cleaning'],
        ],
        'floating' => [
            ['title' => 'Clear planning', 'text' => 'Simple coordination from first message to service day'],
            ['title' => 'Careful transport', 'text' => 'Support with furniture, boxes and planned transport'],
            ['title' => 'Flexible contact', 'text' => 'Reach out in English, German or Portuguese'],
        ],
    ],
    'trust' => [
        'label' => 'Quick service overview',
        'items' => [
            ['icon' => 'chat', 'title' => 'Multilingual communication', 'text' => 'English, German and Portuguese for requests and scheduling'],
            ['icon' => 'phone', 'title' => 'Phone, email and WhatsApp', 'text' => 'Choose the contact channel that suits you best'],
            ['icon' => 'home', 'title' => 'Private and business clients', 'text' => 'Homes, apartments, offices and smaller commercial spaces'],
            ['icon' => 'truck', 'title' => 'Cleaning and moving', 'text' => 'One point of contact for different service types'],
        ],
    ],
    'services' => [
        'eyebrow' => 'Our services',
        'title' => 'How we can help',
        'intro' => 'From regular cleaning to moving support and furniture transport, each job is planned around the property and the client’s schedule.',
        'items' => [
            ['icon' => 'home', 'title' => 'Residential cleaning', 'text' => 'Regular or one-off cleaning for apartments, homes and lived-in spaces.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
            ['icon' => 'sparkles', 'title' => 'Move-out cleaning', 'text' => 'Careful final cleaning before a move, handover or property change.', 'color' => '#d62828', 'bg' => '#fee2e2'],
            ['icon' => 'truck', 'title' => 'Moving and furniture transport', 'text' => 'Support with moving furniture, boxes and other household items.', 'color' => '#15803d', 'bg' => '#dcfce7'],
            ['icon' => 'box', 'title' => 'Deliveries and distribution', 'text' => 'Transport and delivery services for private or business needs.', 'color' => '#d4a72c', 'bg' => '#fef3c7'],
            ['icon' => 'building', 'title' => 'Office and building cleaning', 'text' => 'Cleaning support for offices and small to medium commercial properties.', 'color' => '#0b2a5b', 'bg' => '#dbeafe'],
        ],
    ],
    'why' => [
        'eyebrow' => 'Why De Carvalho',
        'title' => 'Straightforward contact and organised execution',
        'intro' => 'The goal is simple: keep communication easy, align the job clearly and deliver the agreed service with care.',
        'image_alt' => 'Cleaning and moving support illustration',
        'badge' => [
            'title' => 'EN/DE/PT',
            'headline' => 'Direct communication',
            'text' => 'Follow-up in the language that works best for you',
        ],
        'items' => [
            ['title' => 'Clear quotes', 'text' => 'The request is reviewed and the scope is explained before anything is confirmed.'],
            ['title' => 'Connected services', 'text' => 'Cleaning, moving and transport can be handled through the same conversation.'],
            ['title' => 'Practical contact', 'text' => 'Phone, email and WhatsApp stay available for questions and scheduling.'],
        ],
    ],
    'process' => [
        'eyebrow' => 'How it works',
        'title' => 'Four steps to request a service',
        'intro' => 'Send your request, explain what you need, confirm the details and schedule the service that fits your situation.',
        'steps' => [
            ['title' => 'Send your request', 'text' => 'Describe the service you need by form, phone or WhatsApp.'],
            ['title' => 'Review the job', 'text' => 'The request is checked and follow-up questions are asked when needed.'],
            ['title' => 'Confirm the quote', 'text' => 'You receive the main service details before moving forward.'],
            ['title' => 'Schedule the service', 'text' => 'The job is carried out on the agreed date and according to the agreed scope.'],
        ],
    ],
    'contact' => [
        'eyebrow' => 'Get in touch',
        'title' => 'Request your quote',
        'intro' => 'Use the form to send your request or choose the most practical way to contact us directly.',
        'phone_sub' => 'Support in English, German or Portuguese',
        'email_label' => 'Email',
        'email_sub' => 'For quotes and general requests',
        'whatsapp_label' => 'WhatsApp',
        'whatsapp_sub' => 'Start faster with a pre-filled message',
        'form_title' => 'Quick request',
        'form_intro' => 'Tell us briefly which kind of service you are looking for.',
        'honeypot_label' => 'Company',
        'fields' => [
            'name' => 'Name',
            'contact' => 'Email or phone',
            'service' => 'Service',
            'message' => 'Message',
        ],
        'privacy_note' => 'Submitted contact details are used only to reply to your quote request.',
        'submit' => 'Send request',
        'messages' => [
            'success' => 'Thank you. Your request was sent successfully.',
            'generic_error' => 'The request could not be sent. Please try again or contact us by phone or email.',
            'loading' => 'Sending request...',
        ],
    ],
    'form_locale' => 'en',
    'footer' => [
        'tagline' => 'De Carvalho Service GmbH supports clients with cleaning, moving and transport in Switzerland.',
        'legal' => '© 2026 De Carvalho Service GmbH. All rights reserved.',
    ],
];

require __DIR__ . '/../config/render-page.php';
