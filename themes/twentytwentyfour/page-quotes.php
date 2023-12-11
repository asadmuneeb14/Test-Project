<?php
/*
 * Template Name: Quotes
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        $api_url = 'https://api.kanye.rest/';
        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            echo 'Error fetching quotes.';
        } else {
            $quotes = json_decode(wp_remote_retrieve_body($response));
            for ($i = 0; $i < 5; $i++) {
                echo '<p>' . esc_html($quotes->quote) . '</p>';
            }
        }
        ?>

    </main>
</div>

<?php get_footer(); ?>
