<?php
/**
 *    Template Name: Merci
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>


    <?php while (have_posts()) : the_post(); ?>

        <section id="photoHeader" class="actualite" style="background-image: url('<?php the_field('image_de_fond_de_lentete_merci'); ?>')">
            <div class="wrapper">
                <h2><?php the_field('titre_a_afficher_sur_la_pages'); ?></h2>
            </div>
        </section>
        <section class="merci">
            <h1><?php echo(the_title()); ?></h1>

            <div><?php echo(the_content()); ?></div>

            <?php if (get_field('afficher_des_boutons_apres_le_contenu')): ?>


                <?php if (have_rows('boutons_merci')):

                    // loop through the rows of data
                    while (have_rows('boutons_merci')) :
                        the_row();?>

                            <?php (get_sub_field('type_de_lien') == "interne") ? $url = get_sub_field('page_de_destination_du_bouton') : $url = get_sub_field('lien_texte_personalise');?>

                            <a class="button small" href="<?php echo($url); ?>"><?php the_sub_field('texte_du_bouton'); ?></a>

                    <?php endwhile; ?>

                <?php endif; ?>

            <?php endif; ?>
        </section>






    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

<!-- Google Code for Don : formulaire valid&eacute; (page de retour) Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 952023227;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "P1EMCOj68loQu_H6xQM";
var google_conversion_value = <?php echo((intval($_GET["Montant"])/100));?>;
var google_conversion_currency = "EUR";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/952023227/?value=<?php echo((intval($_GET["Montant"])/100));?>&amp;currency_code=EUR&amp;label=P1EMCOj68loQu_H6xQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>