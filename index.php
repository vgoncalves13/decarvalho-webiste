<?php

declare(strict_types=1);

$config = require __DIR__ . '/config/site.php';
$baseUrl = rtrim((string) $config['base_url'], '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($config['company_name'], ENT_QUOTES, 'UTF-8') ?> | Language Selection</title>
  <meta name="description" content="Choose German, Portuguese, English or French to browse the De Carvalho Service GmbH website." />
  <link rel="canonical" href="<?= htmlspecialchars($baseUrl . '/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="alternate" hreflang="de-CH" href="<?= htmlspecialchars($baseUrl . '/de/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="alternate" hreflang="pt" href="<?= htmlspecialchars($baseUrl . '/pt/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="alternate" hreflang="en" href="<?= htmlspecialchars($baseUrl . '/en/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="alternate" hreflang="fr" href="<?= htmlspecialchars($baseUrl . '/fr/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($baseUrl . '/', ENT_QUOTES, 'UTF-8') ?>" />
  <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/main.css" />
</head>
<body class="entry-body" data-page="language-entry">
  <main class="language-entry">
    <div class="language-card">
      <div class="badge-top">
        <span class="badge-flag"></span>
        <span>Choose your language</span>
      </div>
      <h1>Deutsch, Português, English or Français</h1>
      <p class="language-intro">Select the version you want to visit. Automatic redirection may happen based on your browser language, but every version stays available here.</p>
      <div class="language-actions">
        <a href="/de/" class="language-link" data-language-link="de">Deutsch</a>
        <a href="/pt/" class="language-link" data-language-link="pt">Português</a>
        <a href="/en/" class="language-link" data-language-link="en">English</a>
        <a href="/fr/" class="language-link" data-language-link="fr">Français</a>
      </div>
      <p class="language-note" data-auto-redirect-note>Checking your saved preference and browser language.</p>
      <div class="entry-contact">
        <a href="tel:<?= htmlspecialchars($config['phones'][0]['href'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($config['phones'][0]['display'], ENT_QUOTES, 'UTF-8') ?></a>
        <a href="mailto:<?= htmlspecialchars($config['public_email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($config['public_email'], ENT_QUOTES, 'UTF-8') ?></a>
      </div>
    </div>
  </main>
  <script src="/assets/js/language-redirect.js" defer></script>
</body>
</html>
