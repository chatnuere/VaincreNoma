<?php
/**
 *    Template Name: L'association - Qui sommes nous?
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <section id="photoHeader" class="quiSommesNous" style="background-image: url('<?php the_field('uploader_une_image_pour_lentete'); ?>')">
            <div class="wrapper">
                <h1><?php echo(the_title()); ?></h1>
            </div>
        </section>


        <nav id="quiSommesNousNav">
            <?php wp_nav_menu(array('theme_location' => 'association')); ?>
        </nav>


        <section id="associationGeneral">
            <div class="visual">
                <?php the_post_thumbnail('full') ?>

                <?php $noNomaImg = get_field('image_du_logo_nonoma'); ?>
                <img src="<?php echo($noNomaImg['url']); ?>" alt="<?php echo($noNomaImg['alt']); ?>">
            </div>
            <div class="text">
                <?php echo(the_content()); ?>
            </div>
        </section>


        <?php if (get_field('afficher_la_section_conseil_dadministration_/_experts__')): ?>




            <section id="assiciationTeam">

                <div class="wrapper">

                    <div class="administration">
                        <h3><?php the_field('titre_conseil_dadministration'); ?></h3>
                        <ul>
                            <?php if (have_rows('noms_des_membres_du_conseil_dadministration')):

                                // loop through the rows of data
                                while (have_rows('noms_des_membres_du_conseil_dadministration')) :
                                    the_row();?>
                                    <li>
                                        <i></i><p><?php the_sub_field('nom'); ?></p>
                                    </li>

                                <?php endwhile; ?>

                            <?php endif; ?>

                        </ul>
                        <p><?php the_field('paragraphe_de_conclusion_du_conseil_dadministration'); ?></p>
                    </div>

                    <div class="experts">
                        <h3><?php the_field('titre_des_exprerts'); ?></h3>

                        <?php if (have_rows('paragraphe(s_de_presentation_sur_les_experts')):

                            // loop through the rows of data
                            while (have_rows('paragraphe(s_de_presentation_sur_les_experts')) :
                                the_row();?>

                                <p><?php the_sub_field('paragraphe_expert'); ?></p>

                            <?php endwhile; ?>

                        <?php endif; ?>
                    </div>
                </div>

            </section>
        <?php endif; ?>


        <?php if (get_field('afficher_la_section_des_parrains')): ?>

            <section id="parrains">

                <h3><?php the_field('titre_de_la_section_parrains'); ?></h3>

                <?php if (have_rows('parrains')):

                    // loop through the rows of data
                    while (have_rows('parrains')) :
                        the_row();?>

                        <?php $photoParrain = get_sub_field('photo_du_parrain'); ?>

                        <figure>
                            <img src="<?php echo($photoParrain['url']); ?>" alt="<?php echo($photoParrain['alt']); ?>">
                            <figcaption>
                                <h4><?php the_sub_field('nom_du_parrain'); ?></h4>

                                <p><?php the_sub_field('biographie_du_parrain'); ?></p>
                            </figcaption>
                        </figure>
                    <?php endwhile; ?>

                <?php endif; ?>

            </section>

        <?php endif; ?>

        <?php if (get_field('afficher_les_partenaires__')): ?>

        <section id="partners">

            <h5><?php the_field('titre_de_la_section_partenaires'); ?></h5>

            <div class="linkToPartner">

            <?php if (have_rows('partenaires')):

                // loop through the rows of data
                while (have_rows('partenaires')) :
                    the_row();?>

                    <?php $logoPartenaire = get_sub_field('logo_du_partenaire'); ?>

                <a href="<?php the_sub_field('lien_vers_le_partenaire'); ?>" target="_blank"><img src="<?php echo($logoPartenaire['url']); ?>" alt="<?php echo($logoPartenaire['alt']); ?>"></a>

                <?php endwhile; ?>

            <?php endif; ?>

            </div>

        </section>
        <?php endif; ?>





    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>