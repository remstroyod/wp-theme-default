<?php
/**
 * The header for our theme
 * @package default
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="format-detection" content="telephone=no">
    <meta name="google-site-verification" content="mDWCkGFF_0HPMDyfscQWTXzrIA-M12xXQEvIOF_agp4" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <?php wp_head(); ?>

</head>

<body <?php body_class('default'); ?>>

    <?php
    /**
     * Hook: body_after_tag.
     *
     * @hooked preloader - 10
     */
    do_action('body_after_tag');
    ?>

    <!-- MAIN -->
    <main class="main">
        <?php
        /**
         * header_parts hook
         */
        do_action('header_parts');
        ?>
