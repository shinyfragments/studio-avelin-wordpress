# Studio Avelin Child Theme

Child theme for **Twenty Twenty-Four** containing the Studio Avelin homepage.

## Upload

Upload the folder `studio-avelin-child/` to:

    /wp-content/themes/studio-avelin-child/

Requirements: the parent theme **Twenty Twenty-Four** must be installed
(it does not need to be activated). Then activate "Studio Avelin Child"
under Appearance > Themes.

## Homepage

WordPress uses `front-page.php` automatically for the site front page —
no page assignment needed. Under Settings > Reading either option works
("Your latest posts" or a static page).

The template is standalone: it prints its own `<head>`, calls `wp_head()`,
`wp_body_open()` and `wp_footer()`, and deliberately does **not** call
`get_header()` / `get_footer()`, so the Twenty Twenty-Four block header and
footer (and "Proudly powered by WordPress") never appear on the homepage.

## Files

    style.css                 Theme header + global brand tokens
    functions.php             Asset loading, fonts, navigation data
    front-page.php            Standalone homepage (header, hero, sections, footer)
    theme.json                Brand palette / typography for the block editor
    assets/css/home.css       Homepage stylesheet (all .sa-* classes)
    assets/js/home.js         Canvas hero + reveals + smooth scroll + mobile nav
    assets/img/portrait.jpg   About portrait

Optional: place a `js/sa-work-slider.js` in the theme root and it is
enqueued automatically on the homepage only.

## Editing content

Projects, experiments and journal teaser entries are plain PHP arrays at the
top of `front-page.php` (`$sa_projects`, `$sa_experiments`, `$sa_posts`).
Navigation lives in `sa_child_nav_items()` in `functions.php`.

## Expected URLs

    /experiments/
    /experiments/matrix/
    /experiments/avelin-signal-grid/
    /experiments/poster-generator/
    /journal/
    /about-me/
    /datenschutzerklaerung/
    /impressum/

## Hero animation

`assets/js/home.js` draws a generative Canvas 2D field (flow-field particles,
layered ribbons, technical structure lines, pulsing lime signal nodes).
It is full-bleed inside the hero and reaches the right viewport edge.
It pauses when the tab is hidden or the hero scrolls out of view, and respects
`prefers-reduced-motion` (single static frame instead of animation).
