<?php
/**
 * Template Name: Studio Avelin – Experiments
 * Studio Avelin – Experiments overview (/experiments/).
 */
if (!defined('ABSPATH')) {
    exit;
}

$sa_experiments = array(
    array(
        'index' => '01',
        'title' => 'Matrix',
        'type'  => 'Generative Type Grid',
        'text'  => 'A shifting grid of characters and noise. A study in rhythm, density and motion in the browser.',
        'url'   => '/experiments/matrix/',
        'state' => 'Live',
    ),
    array(
        'index' => '02',
        'title' => 'Avelin Signal Grid',
        'type'  => 'Canvas Study',
        'text'  => 'Signals travelling across a fine grid. Small rules, quiet interference patterns, no framework.',
        'url'   => '/experiments/avelin-signal-grid/',
        'state' => 'Live',
    ),
    array(
        'index' => '03',
        'title' => 'Poster Generator',
        'type'  => 'Design Tool',
        'text'  => 'A tiny tool for generating editorial posters from type, spacing and a single accent colour.',
        'url'   => '/experiments/poster-generator/',
        'state' => 'Live',
    ),
    array(
        'index' => '04',
        'title' => 'Future Experiments',
        'type'  => 'In Progress',
        'text'  => 'New sketches land here as they become presentable. Mostly canvas, type and small interactions.',
        'url'   => '/experiments/',
        'state' => 'Soon',
    ),
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('sa-subpage'); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('parts/sa-header'); ?>

<main id="primary" class="sa-page">
  <section class="sa-page-head" aria-labelledby="sa-experiments-title">
    <div class="sa-front-grid" aria-hidden="true"></div>
    <div class="sa-page__inner sa-page-head__inner">
      <p class="sa-front-eyebrow sa-front-eyebrow--line">Experiments</p>
      <h1 id="sa-experiments-title">Small studies, built to <span class="sa-front-highlight">learn</span>.</h1>
      <p class="sa-page-head__lead">
        Sketches in code: generative grids, type studies and tiny tools. Each one exists to try a single idea properly.
      </p>
    </div>
  </section>

  <section class="sa-page-section" aria-label="Experiment list">
    <div class="sa-page__inner">
      <ul class="sa-card-grid sa-card-grid--four">
        <?php foreach ($sa_experiments as $sa_item) : ?>
          <li>
            <a class="sa-card<?php echo ($sa_item['state'] === 'Soon') ? ' sa-card--soon' : ''; ?>" href="<?php echo esc_url($sa_item['url']); ?>">
              <span class="sa-card__index"><?php echo esc_html($sa_item['index']); ?> &middot; <?php echo esc_html($sa_item['type']); ?></span>
              <h3><?php echo esc_html($sa_item['title']); ?></h3>
              <p><?php echo esc_html($sa_item['text']); ?></p>
              <span class="sa-card__more"><?php echo ($sa_item['state'] === 'Soon') ? 'Coming soon' : 'Open experiment'; ?> <span aria-hidden="true">-&gt;</span></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <?php
      while (have_posts()) :
          the_post();
          $sa_content = trim(get_the_content());
          if ($sa_content !== '') :
              ?>
              <div class="sa-project-body" style="margin-top:3.5rem;">
                <?php the_content(); ?>
              </div>
      <?php
          endif;
      endwhile;
      ?>

      <div class="sa-page-foot">
        <a class="sa-back-link" href="<?php echo esc_url(home_url('/')); ?>"><span aria-hidden="true">&lt;-</span> Back to home</a>
        <a class="sa-front-link" href="<?php echo esc_url(home_url('/journal/')); ?>">Read the Journal <span aria-hidden="true">-&gt;</span></a>
      </div>
    </div>
  </section>
</main>

<?php get_template_part('parts/sa-footer'); ?>

<?php wp_footer(); ?>
</body>
</html>
