<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">

        <header class="page-header">
            <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
        </header>

        <?php
        $args = array(
            'post_type'      => 'projects',
            'posts_per_page' => 6,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );

        $projects_query = new WP_Query($args);

        if ($projects_query->have_posts()) :
            echo '<div class="posts-container">';
            while ($projects_query->have_posts()) :
                $projects_query->the_post();
                ?>
                <div class="post">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <div class="post-content">
                            <h2><?php echo esc_html(get_the_title()); ?></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            echo '</div>';

            // Pagination
            the_posts_pagination(array(
                'prev_text'          => esc_html__('Previous', 'twentytwentyfour'),
                'next_text'          => esc_html__('Next', 'twentytwentyfour'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'twentytwentyfour') . ' </span>',
            ));

            wp_reset_postdata();

        else :
            echo esc_html__('No projects found', 'twentytwentyfour');

        endif;
        ?>

        </div>
    </main>
</div>

<?php
get_footer();
