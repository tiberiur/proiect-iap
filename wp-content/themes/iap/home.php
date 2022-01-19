<?php get_header() ?>

<div class="section section--blog">
    <div class="section-inner">
        <h2 class="section-title"><?= single_post_title() ?></h2> <!-- Afisam titlul paginii setate pe post de "home posts" -->
        <div class="section-intro">We provide to you the best choiches for you. Adjust it to your health needs and make sure your undergo treatment with our highly qualified doctors you can consult with us which type of service is suitable for your health</div>
    </div>
</div>

<div class="container">
    <div class="blog-row">
        <div class="blog-content">
            <?php if (have_posts()): ?> <!-- daca exista posturi -->
                <?php while(have_posts()): ?> <!-- parcurgem posturile -->
                    <?php the_post() ?> <!-- incarcam postul curent in "memorie" -->
                    <?php get_template_part('template-parts/blog/post'); ?> <!-- include continutul fisierului din ./template-parts/blog/post.php -->
                <?php endwhile ?>
            <?php else: ?>
                Niciun articol
            <?php endif ?>
        </div>
        <?php if (is_active_sidebar('sidebar')): ?> <!-- daca exista widget-uri in zona denumite  "sidebar" -->
        <div class="blog-sidebar">
            <?php dynamic_sidebar('sidebar'); ?> <!-- afisam widget-urile din zona "sidebar" -->
        </div>
        <?php endif ?>
    </div>
</div>

<?php get_footer() ?>