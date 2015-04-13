<?php
/**
 *    Template Name: Home Page
 */
?>

<?php $myvar = 'home';?>

<?php get_header();?>

<?php if (have_posts()) :?>

    <?php while (have_posts()) : the_post();?>


    <section id="child">
        <div class="wrapper">
            <div class="loader">
                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                <path opacity="0.2" fill="#FFF" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
                    <path fill="#FFF" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z">
                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite"/>
                    </path>
            </svg>
            </div>
            <div class="first">
                <p><?php the_field('texte_gauche'); ?></p>
            </div>
            <div class="last">
                <p><?php the_field('texte_droit'); ?></p>
            </div>
            <video id="videotest" preload="auto">
                <source src="<?php the_field('video_en_.mp4'); ?>" type="video/mp4"/>
                <source src="<?php the_field('video_en_.webm'); ?>" type="video/webm"/>
                <source src="<?php the_field('video_en_.ogg'); ?>" type="video/ogg"/>
                Votre navigateur ne supporte pas les vidéos HTML5, pour votre confort, nous vous invitons à le mettre à jour.
            </video>

            <div class="styledSlider" id="childVideo">
                <input type="range" value="<?php the_field('valeur_initiale_du_slider_en_€'); ?>" min="<?php the_field('valeur_minimale_du_slider_en_€'); ?>" max="<?php the_field('valeur_maximale_du_slider_en_€'); ?>" class="controlls" step="<?php the_field('step_du_slider'); ?>">
            </div>

            <p><?php the_field('catch_phrase'); ?></p>
        </div>

    </section>

        <?php if (get_field('afficher_le_bandeau_dinformations_sur_le_noma_')): ?>




            <?php query_posts('p=16&post_type=informationsnoma');
            while (have_posts()): the_post(); ?>

                <section id="mainInformations">


                        <div class="theNoma">
                            <h2><?php the_title(); ?></h2>

                            <?php the_content(); ?>

                            <?php if (get_field('b_afficher_un_button')): ?>
                                <a href="<?php the_field('url_du_button'); ?>" class="button small ga-tracking" data-category="Call to action" data-action="En savoir plus" data-label="La maladie">
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

    <?php if (get_field('afficher_une_video_youtube')): ?>
        <section id="mainVid">
            <iframe width="<?php the_field('largeur_de_la_video'); ?>" height="<?php the_field('hauteur_de_la_video'); ?>" src="<?php the_field('url_de_la_video_youtube_homepage'); ?>" frameborder="0" allowfullscreen></iframe>
        </section>
    <?php endif; ?>

    <?php if (get_field('afficher_le_schemas')): ?>
        <?php $imageSchemas = get_field('image_du_schemas'); ?>
        <section id="shemas">
            <h2><?php the_field('titre_du_schemas'); ?></h2>
            <img src="<?php echo $imageSchemas["url"]; ?>" alt="<?php echo $imageSchemas["alt"]; ?>">
        </section>

    <?php endif; ?>


    <?php if (get_field('display_the_catchphrase')): ?>
        <section id="homeCatchPhrase" class="maladie">
            <p>
                <?php the_field('catchphrase_text'); ?>
            </p>
        </section>
    <?php endif; ?>


    <?php if (get_field('afficher_presentation_association_home_')): ?>
        <section id="ourAction">
            <div>
                <h3><?php the_field('titre_presentation_association_home'); ?></h3>

                <p><strong><?php the_field('sous_titre__presentation_association_home'); ?></strong></p>
                <ul>

                    <?php if (have_rows('liste__presentation_association_home')):

                        // loop through the rows of data
                        while (have_rows('liste__presentation_association_home')) : the_row();?>

                            <li><i class="icon-ok"></i><p><?php the_sub_field('objet_de_liste__presentation_association_home'); ?></p></li>

                        <?php endwhile; ?>

                    <?php endif; ?>
                </ul>

                <?php if (get_field('afficher_un_bouton___presentation_association_home')): ?>
                    <a href="<?php the_field('lien_du_bouton__presentation_association_home'); ?>" class="button small ga-tracking" data-category="Call to action" data-action="En savoir plus" data-label="association">
                        <?php the_field('texte_du_bouton__presentation_association_home'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div>

                <?php if (have_rows('encart_chifre__presentation_association_home')):

                    // loop through the rows of data
                    while (have_rows('encart_chifre__presentation_association_home')) : the_row();?>
                        <p>
                            <span class="chiffres"><?php the_sub_field('chiffre_de_lencart'); ?></span><?php the_sub_field('legende_du_chiffre_'); ?>
                        </p>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
            <img src="<?php the_field('image__presentation_association_home'); ?>" alt="">

        </section>
    <?php endif; ?>



    <?php if (get_field('afficher_les_articles_sur_la_homepage')): ?>

        <section id="archiveCarousel">
            <h3><?php the_field('titre_de_la_section_articles'); ?></h3>

            <nav class="owl-carousel">

            </nav>
        </section>
    <?php endif; ?>


        <?php if (get_field('afficher_la_video_slider_homepage_2_')): ?>
            <section id="videoMap">
                <video id="MapChildrens" preload="auto">
                    <source src="<?php the_field('video_slider_homepage_2__au_format_.mp4'); ?>" type="video/mp4"/>
                    <source src="<?php the_field('video_slider_homepage_2__au_format_.webm'); ?>" type="video/webm"/>
                    <source src="<?php the_field('video_slider_homepage_2__au_format_.ogg'); ?>" type="video/ogg"/>
                    Votre navigateur ne supporte pas les vidéos HTML5, pour votre confort, nous vous invitons à le mettre à jour.
                </video>
                <div class="loader">
                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                <path opacity="0.2" fill="#FFF" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
                        <path fill="#FFF" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z">
                            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite"/>
                        </path>
            </svg>
                </div>

                <h2><?php the_field('titre_de_la_section_video_slider_homepage_2_'); ?></h2>
                <aside class="left">
                    <h3><?php the_field('titre_sidebar_gauche_video_slider_homepage_2'); ?></h3>
                    <ul>

                        <?php if (have_rows('contenu_sidebar_gauche_video_slider_homepage_2')):

                        // loop through the rows of data
                        while (have_rows('contenu_sidebar_gauche_video_slider_homepage_2')) :
                        the_row();?>


                        <li>
                            <div style="background-image: url('<?php the_sub_field('icone'); ?>')"></div>
                            <p><?php the_sub_field('texte_descriptif'); ?></p></li>
                        <li>

                            <?php endwhile; ?>

                            <?php endif; ?>
                    </ul>
                </aside>
                <aside class="right">
                    <h3><?php the_field('titre_de_la_section_articles'); ?></h3>
                    <ul>
                        <?php if (have_rows('contenu_sidebar_droite_video_slider_homepage_2')):

                            // loop through the rows of data
                            while (have_rows('contenu_sidebar_droite_video_slider_homepage_2')) : the_row();?>
                                <li><p><?php the_sub_field('texte_descriptif'); ?></p>

                                    <div style="background-image: url('<?php the_sub_field('icone'); ?>')"></div>
                                </li>
                            <?php endwhile; ?>

                        <?php endif; ?>
                    </ul>
                </aside>

                <div class="styledSlider" id="MapChildrensSlider">
                    <input type="range" value="<?php the_field('valeur_initiale_en_euro_du_slider_video_slider_homepage_2'); ?>" min="<?php the_field('valeur_minimale_en_euro_du_slider_video_slider_homepage_2'); ?>" max="<?php the_field('valeur_maximale_en_euro_du_slider_video_slider_homepage_2'); ?>" class="controlls" step="<?php the_field('step_du_slider_video_slider_homepage_2'); ?>">
                </div>

                <p class="catchPhrase"><?php the_field('catch_phrase_video_slider_homepage_2'); ?></p>
                <a href="<?php the_field('url_du_bouton_video_slider_homepage_2'); ?>" class="button ga-tracking" data-category="Conversion" data-action="Don" data-label="Bouton Vidéo home">
                    <?php the_field('texte_du_bouton_video_slider_homepage_2'); ?>
                </a>
            </section>

            <div style="display: none" id="urlPageArticle"><?php the_field('lien_de_la_page_daffichage_des_article'); ?></div>
        <?php endif; ?>

<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>