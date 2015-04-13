<?php
/**
 *    Template Name: L'association - Notre action
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <section id="photoHeader" class="notreAction" style="background-image: url('<?php the_field('uploader_une_image_pour_lentete'); ?>')">
            <div class="wrapper">
                <h1><?php echo(the_title()); ?></h1>
            </div>
        </section>


        <nav id="quiSommesNousNav">
            <?php wp_nav_menu(array('theme_location' => 'association')); ?>
        </nav>


        <?php if (get_field('afficher_les_objectifs_')): ?>

            <section id="nosObjectifs">
                <h3><?php the_field('titre_de_la_section_des_objectifs'); ?></h3>
                <ul>
                    <?php if (have_rows('objectifs_:_')):

                        // loop through the rows of data
                        while (have_rows('objectifs_:_')) :
                            the_row();?>

                            <li><i style="background-image: url('<?php the_sub_field('picto'); ?>')"></i>

                                <p><?php the_sub_field('objectif'); ?></p></li>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </section>
        <?php endif; ?>



        <?php if (get_field('afficher_la_section_programme_')): ?>
            <section id="programm">
                <div class="theProgram">
                    <h3><?php the_field('titre_de_la_sous_section_programme'); ?></h3>

                    <p><?php the_field('paragraphe_presentation_programme'); ?></p>
                    <ul>
                        <?php if (have_rows('checklist_programme')):

                            // loop through the rows of data
                            while (have_rows('checklist_programme')) :
                                the_row();?>
                                <li><i class="icon-ok"></i><p><?php the_sub_field('item_checklist'); ?></p></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nexStep">
                    <h3><?php the_field('titre_de_la_sous_section_prochaine_etape'); ?></h3>
                    <ul>
                        <?php if (have_rows('checklist_prochaine_etape')):

                            // loop through the rows of data
                            while (have_rows('checklist_prochaine_etape')) :
                                the_row();?>
                                <li><i class="icon-ok"></i><p><?php the_sub_field('item_de_la_checklist_prochaine_etape'); ?></p></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>
        <?php endif; ?>





    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>