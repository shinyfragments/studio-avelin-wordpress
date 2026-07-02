<?php
/**
 * Studio Avelin Front Page
 */

$sa_portrait_url = esc_url(get_stylesheet_directory_uri() . '/assets/img/portrait.jpg');
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('sa-front-page'); ?>>
<?php wp_body_open(); ?>

<header class="sa-front-header" aria-label="Studio Avelin homepage navigation">
  ...
</header>

<main id="primary" class="sa-front">
  ...
</main>

<footer class="sa-front-footer" aria-label="Site footer">
  ...
</footer>

<?php wp_footer(); ?>
</body>
</html>