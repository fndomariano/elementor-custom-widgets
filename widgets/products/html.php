<?php if ( $products->have_posts() ): ?>

<table>
    <thead>
        <td><b><?php echo 'Photo' ?></b></td>
        <td><b><?php echo 'Name' ?></b></td>
        <td><b><?php _e('Brand') ?></b></td>
        <td><b><?php _e('Price') ?></b></td>
    </thead>
    <tbody>
        <tbody>
            <?php while ( $products->have_posts() ) : $products->the_post();  ?>
                
                <?php $photo = get_field('product_photo', get_the_ID()); ?>

                <tr>
                    <td><img src="<?php echo $photo['url'] ?>"  width="<?php echo $photo['sizes']['thumbnail-width'] ?>" height="<?php echo $photo['sizes']['thumbnail-height'] ?>" /></td>
                    <td><?php echo get_the_title() ?></td>
                    <td><?php echo get_field('product_brand', get_the_ID()) ?></td>
                    <td><?php echo get_field('product_price', get_the_ID()) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </tbody>
</table>

<?php 
    echo paginate_links( [
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total'        => $products->max_num_pages,
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'format'       => '?paged=%#%',
        'prev_next'    => true,
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
    ]); 
?>

<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
