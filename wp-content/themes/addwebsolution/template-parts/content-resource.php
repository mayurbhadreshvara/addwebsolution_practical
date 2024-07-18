<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 0; margin-top: 0;">
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
    </header>

    <div class="entry-content" style="margin-bottom: 0;">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer" style="margin-bottom: 0";>
<!--        <a class="btn" href="<?php the_permalink(); ?>">Read More</a>-->
        <a href="<?php the_permalink(); ?>">
            <button>Read More</button>
        </a>

    </footer>
</article>
