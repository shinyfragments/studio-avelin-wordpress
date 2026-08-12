<?php
/**
 * Studio Avelin – Single journal article.
 */
if (!defined('ABSPATH')) {
    exit;
}
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

<main id="primary" class="sa-page sa-article">
<?php
while (have_posts()) :
    the_post();

    $sa_terms = get_the_category();
    $sa_label = '';

    if (!empty($sa_terms)) {
        $sa_label = $sa_terms[0]->name;
    } else {
        $sa_tags = get_the_tags();
        if (!empty($sa_tags)) {
            $sa_label = $sa_tags[0]->name;
        }
    }

    $sa_excerpt = has_excerpt() ? get_the_excerpt() : '';
    ?>
  <article <?php post_class(); ?>>
    <section class="sa-page-head">
      <div class="sa-front-grid" aria-hidden="true"></div>
      <div class="sa-page__inner sa-page-head__inner">
        <div class="sa-article__head">
          <div class="sa-journal-meta">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
            <?php if ($sa_label !== '') : ?>
              <span class="sa-journal-terms"><?php echo esc_html($sa_label); ?></span>
            <?php endif; ?>
          </div>
          <h1><?php the_title(); ?></h1>
          <?php if ($sa_excerpt !== '') : ?>
            <p class="sa-article__excerpt"><?php echo esc_html($sa_excerpt); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="sa-page-section">
      <div class="sa-page__inner">
        <?php if (has_post_thumbnail()) : ?>
          <div class="sa-article__cover">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <div class="sa-article__body">
          <?php the_content(); ?>
        </div>

        <div class="sa-article__foot">
          <a class="sa-back-link" href="<?php echo esc_url(home_url('/journal/')); ?>">
            <span aria-hidden="true">&lt;-</span> Back to Journal
          </a>
          <?php
          $sa_prev = get_previous_post();
          $sa_next = get_next_post();
          ?>
          <span class="sa-journal-meta">
            <?php if ($sa_next) : ?>
              <a class="sa-back-link" href="<?php echo esc_url(get_permalink($sa_next)); ?>">Newer note <span aria-hidden="true">-&gt;</span></a>
            <?php endif; ?>
            <?php if ($sa_prev) : ?>
              <a class="sa-back-link" href="<?php echo esc_url(get_permalink($sa_prev)); ?>">Older note <span aria-hidden="true">-&gt;</span></a>
            <?php endif; ?>
          </span>
        </div>
      </div>
    </section>
  </article>
<?php endwhile; ?>
</main>

<?php get_template_part('parts/sa-footer'); ?>

<?php wp_footer(); ?>
</body>
</html>
