<?php
/**
 *    Template Name: L'association - Actualités
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <section id="photoHeader" class="actualite" style="background-image: url('<?php the_field('uploader_une_image_pour_lentete');?>')">
            <div class="wrapper">
                <h2><?php echo(the_title()); ?></h2>
            </div>
        </section>


        <nav id="quiSommesNousNav">
            <?php wp_nav_menu( array( 'theme_location' => 'association' ) ); ?>
        </nav>


        <section class="articleContainer">

            <nav class="archive">
                <input type='hidden' class='current_page' />
                <input type='hidden' class='show_per_page' />
                <h3>Archive</h3>
                <ul>

                </ul>
                <div class='page_navigation'></div>

            </nav>


            <section class="article">
                <h2><?php echo(the_title()); ?></h2>
                <article>



        <?php

        if (isset($_GET["post"])){
            $postId = htmlspecialchars($_GET["post"]);
            query_posts('p='.$postId.'&post_type=post');
        }else{
            query_posts('posts_per_page=1&post_type=post');
        }




        while (have_posts()): the_post(); ?>

            <?php the_post_thumbnail( 'full' )   ?>


            <div class="content">
                <nav class="social">
                    <p>Partager</p>
                    <ul>
                        <li>
                            <a class="windowed ga-tracking" data-category="social" data-action="Partager" data-label="Twitter"   href="http://twitter.com/intent/tweet/?url=<?php the_permalink(); ?>"><i class="icon-twitter"></i></a>
                        </li><!--


                        --><li>
                            <a class="windowed ga-tracking" data-category="social" data-action="Partager" data-label="Facebook"   href=https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icon-facebook"></i></a>
                        </li><!--


                        --><li><a class=" ga-tracking" data-category="social" data-action="Partager" data-label="Mail"   href="mailto:?subject=Site Internet&amp;body=<?php the_permalink(); ?>"><i class="icon-mail"></i></a>
                        </li>
                    </ul>
                </nav>

                <?php the_date('F d, Y', '<p class="date">', '</p>'); ?>

                <h1><?php echo(the_title()); ?></h1>

                <div class="text">
                    <?php echo(the_content()); ?>
                </div>
            </div>



        <?php endwhile;?>

        <?php wp_reset_query(); ?>

                </article>
            </section>
        </section>





    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>