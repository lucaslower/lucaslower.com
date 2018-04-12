<?php
// the HEADER.PHP file
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


  <?php
  // wordpress header script
  wp_head();
  ?>

  <!-- stylesheet, favicon, etc -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700|Playfair+Display:400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quattrocento:400,700" rel="stylesheet">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png"/>
</head>
<body>

<header id="page_header" class="wrap">
  <h1 class="site_title"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg">Lucas Lower</h1>
</header>

<section id="page" class="wrap">
  <aside id="sidebar">
    
  </aside>
