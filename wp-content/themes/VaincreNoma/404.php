<?php get_header(); ?>

<section class="p404">
<h1>404</h1>
<p>Oups, il semblerait que la page que vous cherchez n'existe pas<br/>ou n'est plus disponible</p>
    <a class="button small" href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>">Retour à l'accueil</a>
</section>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>