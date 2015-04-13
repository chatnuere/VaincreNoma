<?php
/**
 *    Template Name: L'association - Media
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <section id="photoHeader" class="media" style="background-image: url('<?php the_field('uploader_une_image_pour_lentete'); ?>')">
            <div class="wrapper">
                <h1><?php echo(the_title()); ?></h1>
            </div>
        </section>


        <nav id="quiSommesNousNav">
            <?php wp_nav_menu(array('theme_location' => 'association')); ?>
        </nav>


        <?php if (get_field('afficher_une_iframe_youtube')): ?>
        <section id="mediaVideo">
            <h3><?php the_field('titre_de_liframe'); ?></h3>

            <div class="container">
                <iframe width="<?php the_field('largeur_de_liframe'); ?>" height="<?php the_field('hauteur_de_liframe'); ?>" src="<?php the_field('url_de_liframe_youtube'); ?>" frameborder="0" allowfullscreen class="video"></iframe>
            </div>
        </section>
            <?php endif; ?>

        <section id="mediaImg">
            <div class="wrapper">
                <h3><?php the_field('titre_des_photos'); ?></h3>

                <ul>
                    <ul>
                        <?php if (have_rows('images_')):

                            // loop through the rows of data
                            while (have_rows('images_')) :
                                the_row();?>

                                <?php $mediaImg = get_sub_field('image'); ?>
                                <li>
                                    <figure>
                                        <img src="<?php echo($mediaImg['url']); ?>" alt="<?php echo($mediaImg['alt']); ?>">
                                        <figcaption>
                                            <p><?php the_sub_field('legende_de_limage'); ?></p>
                                        </figcaption>
                                    </figure>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
            </div>
        </section>





    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>