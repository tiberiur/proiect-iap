<?php get_header() ?>

<div class="section section--blog">
    <div class="section-inner">
        <h2 class="section-title"><?= single_post_title() ?></h2>
        <div class="section-intro">We provide to you the best choiches for you. Adjust it to your health needs and make sure your undergo treatment with our highly qualified doctors you can consult with us which type of service is suitable for your health</div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()): ?>
                <?php while(have_posts()): ?>
                    <?php the_post() ?>
                    <?php get_template_part('template-parts/blog/post'); ?>
                <?php endwhile ?>
            <?php else: ?>
                Niciun articol
            <?php endif ?>
        </div>
        <div class="col-md-4">
            <?php if (is_active_sidebar('sidebar')): ?>
                <div class="blog-sidebar">
                    <?php dynamic_sidebar('sidebar'); ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php get_footer() ?>