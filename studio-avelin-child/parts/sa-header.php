<?php
/**
 * Studio Avelin shared subpage header.
 * Mirrors the homepage header markup so subpages stay visually identical.
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<header class="sa-front-header" aria-label="Studio Avelin navigation">
  <div class="sa-front-header__inner">
    <a class="sa-front-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Studio Avelin home">Studio Avelin</a>

    <nav class="sa-front-nav" aria-label="Primary navigation">
      <a href="<?php echo esc_url(home_url('/#work')); ?>">Work</a>
      <a href="<?php echo esc_url(home_url('/#about')); ?>">About</a>
      <a href="<?php echo esc_url(home_url('/experiments/')); ?>">Experiments</a>
      <a href="<?php echo esc_url(home_url('/journal/')); ?>">Journal</a>
      <a href="<?php echo esc_url(home_url('/#contact')); ?>">Say Hello</a>
    </nav>

    <a class="sa-front-header__hello" href="<?php echo esc_url(home_url('/#contact')); ?>">Hello</a>
  </div>
</header>
