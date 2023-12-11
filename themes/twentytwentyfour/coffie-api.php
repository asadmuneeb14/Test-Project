<?php
/*
 * Template Name: Coffee API
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
            function hs_give_me_coffee() {
                $coffee_api_url = "https://api.sampleapis.com/coffee/hot";
                $args = array(
                    'method' => 'GET',
                    'timeout' => 15,
                );

                $response = wp_remote_get($coffee_api_url, $args);

                if (is_wp_error($response)) {
                    return $response;
                }

                $coffee_data = json_decode($response['body'], true);
                //echo "<pre>"; print_r($coffee_data);exit;
                if (isset($coffee_data['title'])) {
                    $title = $coffee_data['title'];

                    // Return the title
                    return $title;
                }
            }

            $coffee_link = hs_give_me_coffee();

            if (is_wp_error($coffee_link)) {
                echo '<p>Error: ' . $coffee_link->get_error_message() . '</p>';
            } else {
                echo 'Here is your coffee: <a href="#">Enjoy $coffee_link!</a>';
            }
        ?>

    </main>
</div>

<?php get_footer(); ?>
