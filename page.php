<?php
// the PAGE.PHP file

get_header();
?>
<section class="content">

  <?php
  if( have_posts() ) : while( have_posts() ) : the_post();
  ?>

<?php the_content(); ?>

<?php
endwhile; endif;
?>

</section>
<?php
get_footer();
?>
