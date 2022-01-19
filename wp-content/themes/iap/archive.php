<?php get_header() ?>

<div class="section section--blog">
    <div class="section-inner">
        <h2 class="section-title">Arhiva</h2>
    </div>
</div>

<div class="container">
    <div class="blog-row">
        <div class="blog-content">
            <?php if (have_posts()): ?>
                <?php while(have_posts()): ?>
                    <?php the_post() ?>
                    <?php get_template_part('template-parts/blog/post'); ?>
                <?php endwhile ?>
            <?php else: ?>
                Niciun articol
            <?php endif ?>
        </div>
        <?php if (is_active_sidebar('sidebar')): ?>
        <div class="blog-sidebar">
            <?php dynamic_sidebar('sidebar'); ?>
        </div>
        <?php endif ?>
    </div>
</div>

<?php get_footer() ?>