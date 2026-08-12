<?php
/**
 * Studio Avelin – shared project note renderer.
 * Expects $sa_project (array) to be defined before including this part:
 *   title, status, role, stack, state, description (array of paragraphs),
 *   link (url|''), link_label
 */
if (!defined('ABSPATH')) {
    exit;
}

if (empty($sa_project) || !is_array($sa_project)) {
    return;
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

<main id="primary" class="sa-page">
  <section class="sa-page-head" aria-labelledby="sa-project-title">
    <div class="sa-front-grid" aria-hidden="true"></div>
    <div class="sa-page__inner sa-page-head__inner">
      <p class="sa-front-eyebrow sa-front-eyebrow--line">Project Note</p>
      <h1 id="sa-project-title"><?php echo esc_html($sa_project['title']); ?></h1>
      <p class="sa-page-head__lead"><?php echo esc_html($sa_project['summary']); ?></p>
      <div class="sa-front-actions">
        <span class="sa-status"><?php echo esc_html($sa_project['status']); ?></span>
        <?php if (!empty($sa_project['link'])) : ?>
          <a class="sa-front-button" href="<?php echo esc_url($sa_project['link']); ?>"<?php echo (strpos($sa_project['link'], 'http') === 0) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
            <?php echo esc_html($sa_project['link_label']); ?> <span aria-hidden="true">-&gt;</span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="sa-page-section" aria-label="Project details">
    <div class="sa-page__inner">
      <div class="sa-project-body">
        <?php foreach ($sa_project['description'] as $sa_paragraph) : ?>
          <p><?php echo esc_html($sa_paragraph); ?></p>
        <?php endforeach; ?>

        <ul class="sa-detail-list">
          <li><span class="sa-detail-label">Status</span><span><?php echo esc_html($sa_project['status']); ?></span></li>
          <li><span class="sa-detail-label">Role</span><span><?php echo esc_html($sa_project['role']); ?></span></li>
          <li><span class="sa-detail-label">Stack</span><span><?php echo esc_html($sa_project['stack']); ?></span></li>
          <li><span class="sa-detail-label">Current state</span><span><?php echo esc_html($sa_project['state']); ?></span></li>
          <?php if (!empty($sa_project['link'])) : ?>
            <li><span class="sa-detail-label">Live</span><span><a class="sa-front-link" href="<?php echo esc_url($sa_project['link']); ?>"<?php echo (strpos($sa_project['link'], 'http') === 0) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html($sa_project['link_display']); ?> <span aria-hidden="true">-&gt;</span></a></span></li>
          <?php endif; ?>
        </ul>

        <?php
        while (have_posts()) :
            the_post();
            $sa_content = trim(get_the_content());
            if ($sa_content !== '') {
                the_content();
            }
        endwhile;
        ?>
      </div>

      <div class="sa-page-foot">
        <a class="sa-back-link" href="<?php echo esc_url(home_url('/#work')); ?>"><span aria-hidden="true">&lt;-</span> Back to Work</a>
        <a class="sa-front-link" href="<?php echo esc_url(home_url('/about-me/')); ?>">About the studio <span aria-hidden="true">-&gt;</span></a>
      </div>
    </div>
  </section>
</main>

<?php get_template_part('parts/sa-footer'); ?>

<?php wp_footer(); ?>
</body>
</html>
