<?php

declare(strict_types=1);

if (! isset($config, $page) || ! is_array($config) || ! is_array($page)) {
    throw new RuntimeException('Missing page rendering context.');
}

$baseUrl = rtrim((string) ($config['base_url'] ?? ''), '/');
$companyName = (string) ($config['company_name'] ?? 'De Carvalho Service GmbH');
$phones = $config['phones'] ?? [];
$primaryPhone = $phones[0] ?? ['display' => '', 'href' => ''];
$publicEmail = (string) ($config['public_email'] ?? '');
$whatsAppNumber = (string) ($config['whatsapp_number'] ?? '');
$canonical = $baseUrl . $page['path'];
$rootUrl = $baseUrl . '/';
$ogImage = $baseUrl . '/assets/og-cover.svg';
$whatsAppUrl = 'https://wa.me/' . rawurlencode($whatsAppNumber) . '?text=' . rawurlencode($page['whatsapp_message']);
$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => $companyName,
    'url' => $canonical,
    'email' => $publicEmail,
    'telephone' => $primaryPhone['display'] ?? '',
    'description' => $page['meta_description'],
    'image' => $ogImage,
    'knowsLanguage' => ['de-CH', 'pt', 'en', 'fr'],
    'serviceType' => $page['structured_services'],
];

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function renderIcon(string $name): string
{
    $icons = [
        'home' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/><path d="M9 21v-6h6v6"/></svg>',
        'sparkles' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l1.7 5.3L19 10l-5.3 1.7L12 17l-1.7-5.3L5 10l5.3-1.7L12 3Z"/><path d="M19 3v4"/><path d="M21 5h-4"/><path d="M5 16v3"/><path d="M6.5 17.5h-3"/></svg>',
        'truck' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M1 6h13v9H1z"/><path d="M14 9h4l4 4v2h-8z"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>',
        'box' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 3 7l9 5 9-5-9-5Z"/><path d="M3 7v10l9 5 9-5V7"/><path d="M12 12v10"/></svg>',
        'building' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V5h10v16"/><path d="M14 9h6v12H4"/><path d="M8 9h2"/><path d="M8 13h2"/><path d="M8 17h2"/><path d="M16 13h2"/><path d="M16 17h2"/></svg>',
        'phone' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 11.2 19a19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.4 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3z"/><path d="m4 6 8 6 8-6"/></svg>',
        'chat' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5a8.5 8.5 0 0 1-12.7 7.4L3 20l1.2-4A8.5 8.5 0 1 1 20 11.5Z"/></svg>',
        'check' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 13 4 4L19 7"/></svg>',
    ];

    return $icons[$name] ?? $icons['check'];
}
?>
<!DOCTYPE html>
<html lang="<?= h($page['locale']) ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= h($page['title']) ?></title>
  <meta name="description" content="<?= h($page['meta_description']) ?>" />
  <meta property="og:title" content="<?= h($page['title']) ?>" />
  <meta property="og:description" content="<?= h($page['meta_description']) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= h($canonical) ?>" />
  <meta property="og:image" content="<?= h($ogImage) ?>" />
  <meta name="theme-color" content="#0b2a5b" />
  <link rel="canonical" href="<?= h($canonical) ?>" />
  <link rel="alternate" hreflang="de-CH" href="<?= h($baseUrl . '/de/') ?>" />
  <link rel="alternate" hreflang="pt" href="<?= h($baseUrl . '/pt/') ?>" />
  <link rel="alternate" hreflang="en" href="<?= h($baseUrl . '/en/') ?>" />
  <link rel="alternate" hreflang="fr" href="<?= h($baseUrl . '/fr/') ?>" />
  <link rel="alternate" hreflang="x-default" href="<?= h($rootUrl) ?>" />
  <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/main.css" />
  <script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?></script>
</head>
<body data-locale="<?= h($page['locale']) ?>">
  <nav class="site-nav">
    <div class="nav-inner">
      <a href="<?= h($page['path']) ?>" class="logo" aria-label="<?= h($companyName) ?>">
        <span class="logo-mark"><span class="cross-h"></span></span>
        <span><?= h($companyName) ?></span>
      </a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="nav-links" aria-label="<?= h($page['menu_label']) ?>">
        <span></span><span></span><span></span>
      </button>
      <div class="nav-links" id="nav-links">
        <?php foreach ($page['nav'] as $item): ?>
          <a href="#<?= h($item['id']) ?>"><?= h($item['label']) ?></a>
        <?php endforeach; ?>
        <div class="language-switcher" aria-label="<?= h($page['language_switcher_label']) ?>">
          <?php foreach ($page['languages'] as $language): ?>
            <?php if ($language['locale'] === $page['locale']): ?>
              <span class="lang-switch is-current" aria-current="page"><?= h($language['label']) ?></span>
            <?php else: ?>
              <a href="<?= h($language['path']) ?>" class="lang-switch" data-language-link="<?= h($language['storage']) ?>"><?= h($language['label']) ?></a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <a href="#contact" class="nav-cta"><?= h($page['cta_primary']) ?></a>
      </div>
    </div>
  </nav>

  <main>
    <section class="hero" id="top">
      <div class="hero-bg-pattern"></div>
      <div class="hero-inner">
        <div class="hero-copy fade-in">
          <div class="badge-top">
            <span class="badge-flag"></span>
            <span><?= h($page['hero']['badge']) ?></span>
          </div>
          <h1>
            <?= h($page['hero']['title_start']) ?>
            <span class="underline-accent"><?= h($page['hero']['title_highlight']) ?></span>
            <?= h($page['hero']['title_end']) ?>
          </h1>
          <p class="hero-sub"><?= h($page['hero']['summary']) ?></p>
          <div class="hero-actions">
            <a href="#contact" class="btn-primary"><?= h($page['cta_primary']) ?></a>
            <a href="tel:<?= h($primaryPhone['href']) ?>" class="btn-ghost"><?= h($page['cta_call']) ?></a>
            <a href="<?= h($whatsAppUrl) ?>" class="btn-ghost" target="_blank" rel="noreferrer"><?= h($page['cta_whatsapp']) ?></a>
          </div>
          <div class="hero-stats">
            <?php foreach ($page['hero']['stats'] as $stat): ?>
              <div>
                <div class="stat-val"><?= h($stat['value']) ?></div>
                <div class="stat-label"><?= h($stat['label']) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="hero-visual fade-in">
          <div class="hero-img-wrap">
            <img src="/assets/hero-cleaning-moving.svg" alt="<?= h($page['hero']['image_alt']) ?>" width="1200" height="900" />
          </div>
          <div class="floating-card fc-1">
            <div class="floating-ico"><?= renderIcon('sparkles') ?></div>
            <div>
              <div class="txt-main"><?= h($page['hero']['floating'][0]['title']) ?></div>
              <div class="txt-sub"><?= h($page['hero']['floating'][0]['text']) ?></div>
            </div>
          </div>
          <div class="floating-card fc-2">
            <div class="floating-ico"><?= renderIcon('truck') ?></div>
            <div>
              <div class="txt-main"><?= h($page['hero']['floating'][1]['title']) ?></div>
              <div class="txt-sub"><?= h($page['hero']['floating'][1]['text']) ?></div>
            </div>
          </div>
          <div class="floating-card fc-3">
            <div class="floating-ico"><?= renderIcon('chat') ?></div>
            <div>
              <div class="txt-main"><?= h($page['hero']['floating'][2]['title']) ?></div>
              <div class="txt-sub"><?= h($page['hero']['floating'][2]['text']) ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="trust-strip fade-in" aria-label="<?= h($page['trust']['label']) ?>">
      <div class="trust-inner">
        <?php foreach ($page['trust']['items'] as $item): ?>
          <article class="trust-item">
            <div class="trust-ico"><?= renderIcon($item['icon']) ?></div>
            <div>
              <div class="trust-title"><?= h($item['title']) ?></div>
              <div class="trust-desc"><?= h($item['text']) ?></div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="services">
      <div class="container fade-in">
        <div class="section-eyebrow"><?= h($page['services']['eyebrow']) ?></div>
        <h2><?= h($page['services']['title']) ?></h2>
        <p class="section-intro"><?= h($page['services']['intro']) ?></p>
        <div class="services-grid">
          <?php foreach ($page['services']['items'] as $service): ?>
            <article class="service-card" style="--accent-color: <?= h($service['color']) ?>; --accent-bg: <?= h($service['bg']) ?>;">
              <div class="service-ico"><?= renderIcon($service['icon']) ?></div>
              <h3 class="service-title"><?= h($service['title']) ?></h3>
              <p class="service-desc"><?= h($service['text']) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="why">
      <div class="container why-layout">
        <div class="fade-in">
          <div class="section-eyebrow"><?= h($page['why']['eyebrow']) ?></div>
          <h2><?= h($page['why']['title']) ?></h2>
          <p class="section-intro"><?= h($page['why']['intro']) ?></p>
          <div class="why-list">
            <?php foreach ($page['why']['items'] as $index => $item): ?>
              <article class="why-item">
                <div class="why-num"><?= h(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></div>
                <div class="why-content">
                  <h3><?= h($item['title']) ?></h3>
                  <p><?= h($item['text']) ?></p>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="why-img fade-in">
          <img src="/assets/cleaning-supplies.svg" alt="<?= h($page['why']['image_alt']) ?>" width="1000" height="1200" loading="lazy" />
          <div class="why-img-badge">
            <div class="seal"><?= h($page['why']['badge']['title']) ?></div>
            <div class="seal-text">
              <?= h($page['why']['badge']['headline']) ?>
              <span><?= h($page['why']['badge']['text']) ?></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="process">
      <div class="container process-wrap fade-in">
        <div class="section-eyebrow center"><?= h($page['process']['eyebrow']) ?></div>
        <h2 class="center"><?= h($page['process']['title']) ?></h2>
        <p class="section-intro center narrow"><?= h($page['process']['intro']) ?></p>
        <div class="process-grid">
          <?php foreach ($page['process']['steps'] as $index => $step): ?>
            <article class="process-step">
              <div class="process-num"><?= h((string) ($index + 1)) ?></div>
              <h3 class="process-title"><?= h($step['title']) ?></h3>
              <p class="process-desc"><?= h($step['text']) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container fade-in">
        <div class="section-eyebrow"><?= h($page['contact']['eyebrow']) ?></div>
        <h2><?= h($page['contact']['title']) ?></h2>
        <p class="section-intro"><?= h($page['contact']['intro']) ?></p>
        <div class="contact-grid">
          <div class="contact-info">
            <?php foreach ($phones as $phone): ?>
              <a href="tel:<?= h($phone['href']) ?>" class="contact-card">
                <div class="contact-ico"><?= renderIcon('phone') ?></div>
                <div>
                  <div class="contact-label"><?= h($phone['label']) ?></div>
                  <div class="contact-val"><?= h($phone['display']) ?></div>
                  <div class="contact-val-sub"><?= h($page['contact']['phone_sub']) ?></div>
                </div>
              </a>
            <?php endforeach; ?>

            <a href="mailto:<?= h($publicEmail) ?>" class="contact-card">
              <div class="contact-ico"><?= renderIcon('mail') ?></div>
              <div>
                <div class="contact-label"><?= h($page['contact']['email_label']) ?></div>
                <div class="contact-val"><?= h($publicEmail) ?></div>
                <div class="contact-val-sub"><?= h($page['contact']['email_sub']) ?></div>
              </div>
            </a>

            <a href="<?= h($whatsAppUrl) ?>" class="contact-card" target="_blank" rel="noreferrer">
              <div class="contact-ico"><?= renderIcon('chat') ?></div>
              <div>
                <div class="contact-label"><?= h($page['contact']['whatsapp_label']) ?></div>
                <div class="contact-val"><?= h($page['cta_whatsapp']) ?></div>
                <div class="contact-val-sub"><?= h($page['contact']['whatsapp_sub']) ?></div>
              </div>
            </a>
          </div>

          <form class="quote-form" method="post" action="/api/contact.php" data-contact-form data-success-message="<?= h($page['contact']['messages']['success']) ?>" data-error-message="<?= h($page['contact']['messages']['generic_error']) ?>" data-loading-message="<?= h($page['contact']['messages']['loading']) ?>">
            <h3><?= h($page['contact']['form_title']) ?></h3>
            <p class="form-sub"><?= h($page['contact']['form_intro']) ?></p>
            <input type="hidden" name="locale" value="<?= h($page['form_locale']) ?>" />
            <div class="honeypot" aria-hidden="true">
              <label for="company"><?= h($page['contact']['honeypot_label']) ?></label>
              <input type="text" id="company" name="company" tabindex="-1" autocomplete="off" />
            </div>
            <div class="form-row">
              <label for="name"><?= h($page['contact']['fields']['name']) ?></label>
              <input type="text" id="name" name="name" maxlength="120" required />
            </div>
            <div class="form-row">
              <label for="contact-detail"><?= h($page['contact']['fields']['contact']) ?></label>
              <input type="text" id="contact-detail" name="contact" maxlength="160" required />
            </div>
            <div class="form-row">
              <label for="service"><?= h($page['contact']['fields']['service']) ?></label>
              <select id="service" name="service" required>
                <?php foreach ($page['services']['items'] as $service): ?>
                  <option value="<?= h($service['title']) ?>"><?= h($service['title']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-row">
              <label for="message"><?= h($page['contact']['fields']['message']) ?></label>
              <textarea id="message" name="message" maxlength="2000" minlength="12" required></textarea>
            </div>
            <p class="privacy-note"><?= h($page['contact']['privacy_note']) ?></p>
            <div class="form-status" role="status" aria-live="polite"></div>
            <button type="submit" class="form-submit">
              <span><?= h($page['contact']['submit']) ?></span>
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <div class="mobile-cta-bar">
    <a href="<?= h($whatsAppUrl) ?>" target="_blank" rel="noreferrer"><?= h($page['cta_whatsapp_short']) ?></a>
    <a href="tel:<?= h($primaryPhone['href']) ?>"><?= h($page['cta_call_short']) ?></a>
    <a href="#contact"><?= h($page['cta_quote_short']) ?></a>
  </div>

  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-logo"><?= h($companyName) ?></div>
      <p class="footer-tag"><?= h($page['footer']['tagline']) ?></p>
      <div class="footer-bottom"><?= h($page['footer']['legal']) ?></div>
    </div>
  </footer>

  <script src="/assets/js/site.js" defer></script>
</body>
</html>
