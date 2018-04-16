<?php
// the HOME.PHP file (blog list)

get_header();
?>
<section class="content">

<section class="about">
<h1>Hi, I'm Lucas.</h1>
I'm a web designer and developer, small business owner, and a computer science major at Eastern Illinois University. Below you will find things that interest me, which may or may not interest you too. Read and find out!
</section>

<?php
if( have_posts() ) : while( have_posts() ) : the_post();
?>

<article class="post">
<h1><span>#<?php echo get_post_meta($post->ID, $key = 'post_sequence', $single = true) ?>.</span><?php the_title(); ?></h1>
<ul class="tags">
  <li class="date">
    <?php echo get_the_date(); ?>
  </li>
<?php
        $tags = get_the_tags();
            if($tags){
                foreach($tags as $tag){
                    echo '<li class="tag"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                }
            }
        ?>
</ul>
<?php the_excerpt(); ?><a class="read" href="<?php the_permalink(); ?>">Read More &rarr;</a>
</article>

<?php
endwhile; endif;
?>

</section>
<?php
get_footer();
?>
