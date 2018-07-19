<?php
// This file will contain meta information and loaded in header template.
?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php  wp_title('|', true, 'right'); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- animate css -->
<link rel="stylesheet" href=" <?php bloginfo('template_url') ?>/animate.css">
<!-- stylesheets should be enqueued in functions.php -->

<!-- Open Graph General (Facebook & Pinterest) -->
<meta property="og:title" content="Ksenia Veriguina | Front End Developer">
<meta property="og:url" content="http://kseniacodes.io">
<meta property="og:description" content="Ksenia is a front end developer with a passion for building efficient, beautiful and accessible websites">
<meta property="og:image" content="http://kseniacodes.io/wp-content/uploads/2016/09/meta.png">
<meta property="og:image:url" content="http://kseniacodes.io/wp-content/uploads/2016/09/meta.png">

<!-- Twitter card meta -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:creator" content="@ksenia_codes">
<meta name="twitter:title" content="Ksenia Veriguina | Front End Developer">
<meta name="" ="twitter:description" content="Ksenia is a front end developer with a passion for building efficient, beautiful and accessible websites">
<meta name="twitter:image" content="http://kseniacodes.io/wp-content/uploads/2016/09/metaTwitter.png">
<?php