<?php
/**
 * Studio Avelin shared subpage footer.
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="sa-front-footer" aria-label="Site footer">
  <div class="sa-front-footer__inner">
    <div class="sa-front-footer__brand">
      <p>Studio Avelin</p>
      <span>Design. Code. Create.</span>
    </div>

    <nav aria-label="Explore">
      <p>Explore</p>
      <a href="<?php echo esc_url(home_url('/#work')); ?>">Work</a>
      <a href="<?php echo esc_url(home_url('/about-me/')); ?>">About</a>
      <a href="<?php echo esc_url(home_url('/experiments/')); ?>">Experiments</a>
      <a href="<?php echo esc_url(home_url('/journal/')); ?>">Journal</a>
    </nav>

    <nav aria-label="Projects">
      <p>Projects</p>
      <a href="https://stan.studio-avelin.com/" target="_blank" rel="noopener noreferrer">STAN</a>
      <a href="<?php echo esc_url(home_url('/maaike-fiebus/')); ?>">Maaike Fiebus</a>
    </nav>

    <nav aria-label="Legal">
      <p>Legal</p>
      <a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a>
      <a href="<?php echo esc_url(home_url('/datenschutzerklaerung/')); ?>">Datenschutzerkl&auml;rung</a>
    </nav>
  </div>

  <div class="sa-front-footer__bottom">
    <span><?php echo esc_html(gmdate('Y')); ?> Studio Avelin</span>
    <span><i aria-hidden="true"></i>Made with care.</span>
  </div>
</footer>
