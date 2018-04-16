<?php
// the SINGLE.PHP file

get_header();
?>
<section class="content">

  <?php
  if( have_posts() ) : while( have_posts() ) : the_post();
  ?>

<article class="post single">
  <h1><span>#<?php echo get_post_meta($post->ID, $key = 'post_sequence', $single = true) ?>.</span><?php the_title(); ?></h1>
  <ul class="tags">
    <li class="date">
      <?php the_date(); ?>
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
  <div class="content">
<?php the_content(); ?>
</div>
</article>

<?php
endwhile; endif;
?>

</section>
<?php
get_footer();
?>
