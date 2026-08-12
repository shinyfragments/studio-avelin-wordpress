<?php
/**
 * Studio Avelin – Journal overview (Posts Page).
 * Standalone template: no get_header()/get_footer(), no Twenty Twenty-Four chrome.
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

<main id="primary" class="sa-page sa-journal">
  <section class="sa-page-head" aria-labelledby="sa-journal-title">
    <div class="sa-front-grid" aria-hidden="true"></div>
    <div class="sa-page__inner sa-page-head__inner">
      <p class="sa-front-eyebrow sa-front-eyebrow--line">Journal</p>
      <h1 id="sa-journal-title">Notes from the <span class="sa-front-highlight">studio</span>.</h1>
      <p class="sa-page-head__lead">
        Notes on design, code, webwork, process and small creative ideas.
      </p>
    </div>
  </section>

  <section class="sa-page-section" aria-label="Journal entries">
    <div class="sa-page__inner">
      <?php if (have_posts()) : ?>
        <ul class="sa-journal-list">
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
              ?>
              <li class="sa-journal-item">
                <a class="sa-journal-entry" href="<?php the_permalink(); ?>">
                  <div class="sa-journal-meta">
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                    <?php if ($sa_label !== '') : ?>
                      <span class="sa-journal-terms"><?php echo esc_html($sa_label); ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="sa-journal-entry__body">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 34, '&hellip;')); ?></p>
                    <span class="sa-journal-more">Read more <span aria-hidden="true">-&gt;</span></span>
                  </div>
                </a>
              </li>
          <?php endwhile; ?>
        </ul>

        <?php
        $sa_pagination = paginate_links(array('type' => 'array', 'prev_text' => 'Previous', 'next_text' => 'Next'));
        if (!empty($sa_pagination)) :
            ?>
            <nav class="sa-pagination" aria-label="Journal pagination">
              <?php foreach ($sa_pagination as $sa_link) {
                  echo wp_kses_post($sa_link);
              } ?>
            </nav>
        <?php endif; ?>

      <?php else : ?>
        <p class="sa-journal-empty">No journal entries published yet.</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_template_part('parts/sa-footer'); ?>

<?php wp_footer(); ?>
</body>
</html>
