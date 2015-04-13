<?php
/**
 *    Template Name: La maladie
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>


        <section id="laMaladie">

            <?php the_post_thumbnail( 'full' )   ?>

            <div>
                <?php echo(the_content()); ?>
            </div>
        </section>

        <?php if (get_field('afficher_le_bandeau_dinformations_sur_le_noma_')): ?>

            <?php query_posts('p=73&post_type=informationsnoma');
            while (have_posts()): the_post(); ?>

                <section id="mainInformations">

                        <div class="theNoma">
                            <h2><?php the_title(); ?></h2>

                            <?php the_content(); ?>

                            <?php if (get_field('b_afficher_un_button')): ?>
                                <a href="<?php the_field('url_du_button'); ?>" class="button small">
                                    <?php the_field('texte_du_button'); ?>
                                </a>
                            <?php endif; ?>
                        </div>


                        <div class="general">
                            <?php // check if the repeater field has rows of data
                            if (have_rows('chiffres_du_noma')):

                                // loop through the rows of data
                                while (have_rows('chiffres_du_noma')) : the_row();?>

                                    <?php
                                    $valeur_du_chiffre = get_sub_field('valeur_du_chiffre');
                                    $texte_explicatif = get_sub_field('texte_explicatif');
                                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                                    $couleur_du_texte = get_sub_field('couleur_du_texte');
                                    ?>

                                    <?php if (get_sub_field('quel_type_de_box') == 'chiffre'): ?>

                                        <p style="color: <?php echo($couleur_du_texte); ?>; background-color: <?php echo($couleur_de_fond); ?>;">
                                            <strong class="chiffres"><?php echo($valeur_du_chiffre) ?></strong>
                                            <?php echo($texte_explicatif) ?>
                                        </p>

                                    <?php elseif (get_sub_field('quel_type_de_box') == 'chiffre2'): ?>

                                        <?php $legende = get_sub_field('legende'); ?>


                                        <p style="color: <?php echo($couleur_du_texte); ?>; background-color: <?php echo($couleur_de_fond); ?>;">
                                            <strong class="chiffres special"><?php echo($valeur_du_chiffre) ?></strong>
                                <span class="special left">
                                    <strong class="chiffres"><?php echo($legende) ?></strong>
                                    <strong><?php echo($texte_explicatif) ?></strong>
                                </span>
                                        </p>

                                    <?php endif; ?>

                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php $image = get_field('image'); ?>
                        </div>


                        <div class="map">
                            <h3><?php the_field('titre_de_limage'); ?></h3>

                            <p><?php the_field('legende_de_limage'); ?></p>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>

                </section>


            <?php endwhile;
            wp_reset_query(); ?>

        <?php endif; ?>


        <?php if (get_field('afficher_les_phases_devolution_de_la_maladie')): ?>
            <?php $iterateur = 1; ?>
            <section id="evolution">
                <h3><?php the_field('titre_de_lencart_des_phases_devolution_de_la_maladie'); ?></h3>

                <ul>

                    <?php if (have_rows('phases_devolution_de_la_maladie')):

                        // loop through the rows of data
                        while (have_rows('phases_devolution_de_la_maladie')) : the_row();?>


                            <?php $fieldImage = get_sub_field('photo_de_lencart'); ?>


                            <?php if ($iterateur % 2 == 0) : ?>

                                <li style="color: <?php the_sub_field('couleur_de_lencart'); ?>; background-color: <?php the_sub_field('couleur_de_lencart'); ?>;">
                                    <div class="description">
                                        <div class="wrapper">
                                            <i><?php echo($iterateur); ?></i>

                                            <div>
                                                <h2 class="maladie"><?php the_sub_field('titre'); ?></h2>

                                                <p><?php the_sub_field('texte'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img <?php if(get_sub_field('la_photo_doit_elle_être_floute')){ echo 'blur';}?>">
                                        <img src="<?php  echo $fieldImage["url"]; ?>" alt="<?php  echo $fieldImage["alt"]; ?>">
                                    </div>
                                    <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="28px" viewBox="0 0 64 28" enable-background="new 0 0 64 28" xml:space="preserve">
                                        <polygon points="0,0 32,28 64,0 "/>
                                    </svg>
                                </li>

                            <?php else : ?>

                                <li style="color: <?php the_sub_field('couleur_de_lencart'); ?>; background-color: <?php the_sub_field('couleur_de_lencart'); ?>;">
                                    <div class="img <?php if(get_sub_field('la_photo_doit_elle_être_floute')){ echo 'blur';}?>">
                                        <img src="<?php echo $fieldImage['url']; ?>" alt="<?php  echo $fieldImage["alt"]; ?>">
                                    </div>
                                    <div class="description">
                                        <div class="wrapper">
                                            <i><?php echo($iterateur); ?></i>

                                            <div>
                                                <h2 class="maladie"><?php the_sub_field('titre'); ?></h2>

                                                <p><?php the_sub_field('texte'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="28px" viewBox="0 0 64 28" enable-background="new 0 0 64 28" xml:space="preserve">
                                       <polygon points="0,0 32,28 64,0 "/>
                                    </svg>
                                </li>

                            <?php endif; ?>

                            <?php $iterateur++; ?>



                        <?php endwhile; ?>

                    <?php endif; ?>

                </ul>
            </section>
        <?php endif; ?>
        <?php if (get_field('display_the_catchphrase')): ?>
            <section id="homeCatchPhrase" class="maladie">
                <p>
                    <?php the_field('catchphrase_text'); ?>
                </p>
            </section>
        <?php endif; ?>

    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>