# Studio Avelin Child Theme

Child theme for **Twenty Twenty-Four**. German-only Ich-Marke site for
studio-avelin.com (rebuilt 2026-09).

## Upload

Upload the folder `studio-avelin-child/` to:

    /wp-content/themes/studio-avelin-child/

Requirements: the parent theme **Twenty Twenty-Four** must be installed (it does
not need to be activated). Then activate "Studio Avelin Child" under
Appearance > Themes.

Use `../deploy.sh` (production) or `../deploy-staging.sh` (staging) to push the
maintained files over SFTP.

## Routing

`functions.php` renders most routes itself via a `template_redirect` hook:

    /                         front-page.php (person-centred homepage)
    /work/                    page-work.php (client projects + own products)
    /work/<slug>/             page-work-<slug>.php  (project notes)
    /services/                page-services.php (Website- / Branding-Projekt, Begleitung)
    /about-me/                page-about-me.php
    /contact/                 page-contact.php (enquiry form, email only)
    /journal/                 native sa_journal post type (inc/sa-journal.php)
    /experiments/             page-experiments.php
    /impressum/, /datenschutzerklaerung/

The homepage template is standalone: it prints its own `<head>`, calls
`wp_head()` / `wp_body_open()` / `wp_footer()` and deliberately does **not** call
`get_header()` / `get_footer()`, so the Twenty Twenty-Four block header/footer
never appears.

## Files

    style.css                 Theme header + global brand tokens
    functions.php             Routing, asset loading, fonts, favicons, contact form, SMTP
    front-page.php            Homepage (portrait hero, offer arc, project cards, journal, CTA)
    theme.json                Brand palette / typography for the block editor
    parts/sa-header.php       Flat header: A/ wordmark, nav, "Projekt besprechen" CTA
    parts/sa-footer.php       Editorial footer
    parts/sa-project-note.php Shared project-note renderer for /work/<slug>/
    inc/sa-journal.php        Native Journal content model + templates in journal/
    assets/css/               sa-base.css (chrome), home.css (homepage), pages.css (inner pages)
    assets/js/home.js         Reveals, sticky header, sliding nav indicator, mobile nav, hero drift
    assets/img/favicons/      Favicon set (lime variant) + site.webmanifest
    assets/img/portrait.jpg   Portrait used on the homepage and About page

## Editing content

Homepage project cards, the offer arc and the work-page project lists are plain
PHP arrays at the top of the respective templates. Header/footer navigation is
hardcoded in `parts/sa-header.php` and `parts/sa-footer.php`.

## Brand

- Colours: Off White `#F2F2F2`, Charcoal `#3D3D3D`, Lime `#C7F000`
- Type: Poppins (display), Raleway (body)
- Animations are deliberately restrained: scroll reveals, hover transitions and a
  single hero-portrait drift, all disabled under `prefers-reduced-motion`.
