<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?> | <?php echo get_option( 'location_city' ) . ', ' . get_option('location_state'); ?></title>
    <meta name="description" content="St. Paul's Interior Page Template">
    <meta name="author" content="Virtuosic Media">
    
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>

<div class="container">

    <header class="header">

        <?php get_template_part('templates/utility'); ?>

        <?php get_template_part('templates/main-menu'); ?>

    </header>