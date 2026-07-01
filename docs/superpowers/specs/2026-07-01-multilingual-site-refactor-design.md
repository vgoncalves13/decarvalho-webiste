# De Carvalho Service GmbH Multilingual Site Refactor Design

Date: 2026-07-01
Status: Approved for spec review

## Objective

Refactor the current single-file landing page into a multilingual, SEO-oriented website with separate German and Portuguese versions, shared static assets, and a PHP backend for the contact form using PHPMailer when the hosting environment supports PHP.

The current site mixes German and Portuguese in the same interface, keeps CSS and JS inline inside the HTML, and uses a fake contact form submission based on `alert()`. The refactor should preserve the current visual identity while improving maintainability, internationalization, conversion, and local SEO for Switzerland.

## Scope

This work includes:

- Splitting the site into language-specific entry points for `de-CH` and `pt`
- Creating a lightweight root entry page with language detection
- Moving CSS and JS out of inline HTML into shared asset files
- Replacing the fake form with a real email submission endpoint, preferring PHP plus PHPMailer when available
- Adding language switching, localized SEO metadata, hreflang, Open Graph, and JSON-LD
- Preserving the existing visual direction and improving mobile CTA behavior

This work does not include:

- Adding a framework or build pipeline
- Introducing a CMS or admin panel
- Confirming unverified business claims
- Inventing address, registration, or legal data not provided by the client

Environment constraint:

- Before implementation, verify whether the target hosting environment supports PHP
- If PHP is unavailable, switch the contact flow to a static-friendly external form endpoint such as Formspree or Netlify Forms

## Current Site Analysis

The current implementation has these issues:

- The document uses `lang="de"` while mixing German and Portuguese in the same screen
- The `<title>` and meta description are mixed-language and not localized per audience
- Several sections show German as the main text and Portuguese as a secondary line, reducing clarity and weakening SEO
- The page exists only as a single `index.html`
- CSS is embedded in a `<style>` block and JS is embedded inline
- The contact form uses `onsubmit="event.preventDefault(); alert(...)"` and does not send data anywhere
- Images are referenced with ad hoc paths and are not organized under a stable asset structure

The current visual direction is acceptable and should be preserved:

- Navy and white as the primary palette
- Swiss red as a prominent accent
- A light green used as a secondary accent
- Clean institutional presentation with strong hero and service cards

## Recommended Architecture

Use static-like PHP pages with separate URLs per language and a backend endpoint for contact submission.

### File Structure

```txt
/
  index.php
  de/
    index.php
  pt/
    index.php
  api/
    contact.php
  assets/
    css/
      main.css
    js/
      site.js
      language-redirect.js
    favicon.svg
    hero-cleaning-moving.jpg
    cleaning-supplies.jpg
    moving-boxes.jpg
    office-cleaning.jpg
    og-cover.jpg
```

### Why This Structure

- Separate `de/` and `pt/` URLs provide cleaner SEO targeting and straightforward `hreflang`
- Shared assets keep styling and interaction logic centralized
- PHP is used only where it adds value: language entry behavior and contact submission
- No framework or build step keeps deployment simple on common PHP hosting

## Language Strategy

### Root Entry

`/index.php` will act as the site entry point.

Behavior:

- Always show visible links to both language versions
- If the user already chose a language manually, respect that preference
- If there is no saved preference, detect browser language client-side
- If the browser language starts with `pt`, JS may redirect human users to `/pt/`
- Otherwise JS may redirect human users to `/de/`
- Save manual language selection in `localStorage`
- Never prevent the user from switching language manually

SEO constraint:

- The root page must not behave like an opaque forced redirect for crawlers
- It should remain lightweight and predictable, with explicit links to both language versions
- Users and crawlers must always have clear access to `/de/` and `/pt/`

### Language Switcher

Both `/de/` and `/pt/` pages will include a visible language switcher in the header.

Requirements:

- Accessible by keyboard
- Clearly shows the current language
- Navigates to the equivalent page in the other language
- Persists the manual choice in `localStorage`

## Content Strategy

### General Rule

No page should mix languages in the visible interface. The German page will be entirely German. The Portuguese page will be entirely Portuguese.

### Languages

- German page uses `lang="de-CH"`
- Portuguese page uses `lang="pt"`

### Tone

- Professional
- Clear
- Direct
- Trustworthy
- Not exaggerated

### Key Commercial Themes

- Professional cleaning
- End-of-tenancy cleaning with guarantee
- Moving and furniture transport
- Office and building cleaning
- Free quote
- Service in German and Portuguese
- Service in Switzerland

### Claims Requiring Client Validation

These may appear in the current site or desired copy, but must remain subject to later confirmation or be omitted until confirmed:

- `Versichert`
- Service across all Switzerland
- Response within 24 hours
- Formal end-cleaning guarantee wording
- Any legal registration identifiers
- Ratings or review aggregates

## SEO and Metadata

Each language page will have its own localized metadata.

### Head Requirements Per Language Page

- Correct `<html lang="">`
- Localized `<title>`
- Localized `<meta name="description">`
- Canonical URL
- Open Graph title, description, URL, type, and image
- `hreflang` links for:
  - `de-CH`
  - `pt`
  - `x-default`

### URL Placeholders

Use absolute URLs with a clearly replaceable domain placeholder.

Example pattern:

- `https://example.ch/de/`
- `https://example.ch/pt/`
- `https://example.ch/`

### Keyword Focus

Keywords should be used naturally, not stuffed.

German:

- `Reinigung Schweiz`
- `Umzug Schweiz`
- `Endreinigung mit Abnahmegarantie`
- `Möbeltransport Schweiz`
- `Büroreinigung Schweiz`

Portuguese:

- `Limpeza na Suíça`
- `Mudanças na Suíça`
- `Limpeza final com garantia`
- `Transporte de móveis na Suíça`
- `Limpeza de escritórios na Suíça`

### Structured Data

Add JSON-LD using `LocalBusiness` or `CleaningService`.

Rules:

- Include business name, website, contact details already known, and service category
- Do not invent address or geographic details
- Do not invent registration number, aggregate rating, opening hours, or precise service areas
- Omit unsupported fields rather than fabricating them

## UX and Conversion

### Hero

The hero should immediately communicate:

- Cleaning services
- Moving and transport services
- German and Portuguese support
- Free quotes
- Coverage in Switzerland

### CTAs

German examples:

- `Kostenlose Offerte anfordern`
- `Jetzt anrufen`
- `WhatsApp schreiben`

Portuguese examples:

- `Pedir orçamento gratuito`
- `Ligar agora`
- `Falar no WhatsApp`

### Mobile CTA Bar

Add a sticky mobile action bar with:

- WhatsApp
- Phone
- Quote jump link

### WhatsApp CTA

Use prefilled message links via:

- `https://wa.me/<number>?text=<encoded-message>`

This is a quick-contact CTA, not the primary lead capture mechanism.

## Contact Form Design

### Submission Method

The form will submit asynchronously to `/api/contact.php`.

### Backend Behavior

`api/contact.php` will:

- Accept only `POST`
- Validate required fields
- Sanitize user input
- Apply input length limits
- Reject obviously empty or suspicious submissions
- Check a honeypot field and reject submissions that fill it
- Build an email body with the submitted data
- Prefer sending with PHPMailer over SMTP when available
- Allow the destination email to be configured in one obvious location
- Use PHP `mail()` only as a minimal fallback when the hosting provider is already configured for reliable delivery
- Return JSON success or error responses

### Frontend Behavior

The frontend JS will:

- Submit with `fetch`
- Disable the submit button during submission
- Show localized success and error messages
- Preserve a fallback contact route if the request fails
- Show localized validation errors from JSON responses

### Fields

Minimum fields:

- Name
- Email or phone
- Service type
- Message

Optional:

- Preferred language
- Honeypot field kept hidden from human users

### Email Destination

Initial implementation may use a placeholder destination such as `info@decarvalhoservice.ch`, to be replaced once confirmed.

### Operational Risk

Reliable contact delivery depends on hosting support for PHP and mail transport. Even correct code can fail if SMTP credentials are missing, PHPMailer is unavailable, or server mail transport is not configured.

### Privacy Notice

Add a short privacy notice below the form stating that submitted contact data will only be used to respond to the quote request.

## Asset Strategy

The codebase will be prepared for real images under `/assets/`.

Target filenames:

- `hero-cleaning-moving.jpg`
- `cleaning-supplies.jpg`
- `moving-boxes.jpg`
- `office-cleaning.jpg`
- `og-cover.jpg`
- `favicon.svg` or `favicon.png`

Guidance:

- Prefer real client photos whenever available
- If temporary stock images are needed, use stable filenames so assets can be replaced without changing markup
- Comments may mention Unsplash or Pexels as interim sources

## Accessibility and Performance

Requirements:

- Meaningful `alt` text on images
- `loading="lazy"` for below-the-fold images
- Width and height or predictable containers to reduce layout shift
- Good text/background contrast
- Keyboard-accessible language switcher
- Respect `prefers-reduced-motion`
- No heavy front-end libraries

## Visual Direction

The refactor must preserve the current design language:

- Navy as the core brand color
- Swiss red as a strong accent
- Green as a supporting accent
- Clean local-business presentation

Allowed improvements:

- Cleaner hierarchy
- Better CTA emphasis
- Better mobile usability
- More professional separation of sections

Avoid:

- Generic theme-like redesign
- Unnecessary visual overhaul
- Template aesthetics disconnected from the current brand feel

## Implementation Plan Outline

The later implementation plan should cover, in order:

1. Create the new folder structure and move the current page into shared static assets and language-specific pages
2. Extract and clean the shared CSS into `assets/css/main.css`
3. Extract shared JS and language redirect logic into separate files
4. Build `/de/index.php` and `/pt/index.php` with localized copy and metadata
5. Build `/index.php` as the lightweight entry and language detector
6. Verify PHP support in the target environment and confirm the mail transport strategy
7. Implement `/api/contact.php` with PHPMailer, validation, honeypot, and JSON responses
8. Wire the localized forms and CTA actions
9. Verify links, `hreflang`, accessibility, privacy notice, and responsive behavior

## Open Client Confirmations

These must be confirmed with the client after implementation or before launch:

- Final destination email address
- Real WhatsApp number to use publicly
- Exact service region or city coverage
- Whether `Versichert` is formally accurate
- Whether `Endreinigung mit Abnahmegarantie` is a formal guaranteed offer
- Business registration details, if intended to appear on the site
- Whether “response within 24 hours” is a real commitment
- Whether ratings or testimonials are available and approved for publication

## Acceptance Criteria

The refactor is successful when:

- The site has separate German and Portuguese versions
- No visible page mixes German and Portuguese copy
- CSS and JS are no longer inline in the page markup
- The root page provides lightweight language entry behavior
- The language switcher is visible and persists manual choice
- The contact form performs a real backend submission
- The contact form includes basic anti-spam protection
- The site exposes localized SEO metadata and `hreflang`
- The visual identity remains consistent with the current site
