<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="initial-scale=1.0">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?>
<?php
    if(is_front_page()){
        bloginfo('description');
    }else{
        echo" | ";
        wp_title('');
    }
    ?>
</title>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Sanchez:400italic,400' rel='stylesheet' type='text/css'>
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

    <script type="text/javascript">
        function autoResize(id){
            var newheight;
            var newwidth;

            if(document.getElementById){
                newheight=document.getElementById(id).contentWindow.document.body.scrollHeight;
                newwidth=document.getElementById(id).contentWindow.document.body.scrollWidth;
            }

            document.getElementById(id).height=(newheight) + "px";
            document.getElementById(id).width=(newwidth) + "px";
        }
    </script>


</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

    <!-- Code Google de la balise de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 952023227;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/952023227/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<header>
    <div>

        <?php if ( is_home() )  :?>

        <h1>
            <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>">
                <img src="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'logo' );} ?>" alt="Logo Vaincre noma">
            </a>
        </h1><!--

        <?php else: ?>

		<h2>
            <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>">
                <img src="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option( 'logo' );} ?>" alt="Logo Vaincre noma">
            </a>
        </h2><!--
        <?php endif ?>

        --><nav>
           <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav>
    </div>
</header>

<main>