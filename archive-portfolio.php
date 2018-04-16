<?php
// the HOME.PHP file (blog list)

get_header();
?>
<section class="content">

<?php
$port_query = new WP_Query(array('post_type' => 'portfolio','posts_per_page' => '-1','order' => 'ASC', 'orderby' => 'menu_order'));
if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post();
?>

<article class="item">
  <table>
    <tr>
<?php if(has_post_thumbnail()) : ?>
<td class="image">
<?php the_post_thumbnail('large'); ?>
</td>
<?php endif; ?>
<td class='content'>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<h2>Date: <span><?php the_field('date'); ?></span></h2>
<h2>Platform: <span><?php the_field('platform'); ?></span></h2>
<?php
if(get_field('site_url')){
  echo '<a class="read" href="' . get_field('site_url') . '">Visit Site &rarr;</a>';
}
else if(has_post_thumbnail()){
  echo '<a class="read" href="' . get_the_post_thumbnail_url($post->post_id,'full') . '">View Larger &rarr;</a>';
}
?>
</td>
</tr>
</table>
</article>

<?php
endwhile; endif; wp_reset_postdata();
?>

</section>
<?php
get_footer();
?>
