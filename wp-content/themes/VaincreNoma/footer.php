</main>
<footer>
    <div class="footerWrapper">
        <div>
            <img src="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'logo' );} ?>" alt="Logo Vaincre noma">
            <p>Site de l'association</p>
        </div>
        <div>
            <nav>
                <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
            </nav>
        </div>
        <div>
            <nav class="social">
                <a href="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'lien_twitter_footer' );} ?>" class="icon-twitter ga-tracking" data-category="social" data-action="Afficher page de l'association" data-label="Twitter" target="_blank"></a>
                <a href="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'lien_facebook_footer' );} ?>" class="icon-facebook ga-tracking" data-category="social" data-action="Afficher page de l'association" data-label="Facebook" target="_blank"></a>
                <a href="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'lien_google_plus_footer' );} ?>" class="icon-gplus ga-tracking" data-category="social" data-action="Afficher page de l'association" data-label="Google Plus" target="_blank" rel="publisher"></a>

            </nav>
            <p><span class="uppercase">Adresse</span><br>
                <?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'adresse' );} ?><br>
                <?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'adresse_ligne_2' );} ?></p>

        </div>
    </div>
    <p class="copyright">&copy; 2015 vaincre NOMA</p>
</footer>

<?php wp_footer();
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website.
// Removing this fxn call will disable all kinds of plugins.
// Move it if you like, but keep it around.
?>

</body>
</html>