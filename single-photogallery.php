<?php get_header(); 
$featured_img_url = get_the_post_thumbnail_url($post->ID); 
if(!$featured_img_url){
   $featured_img_url = get_theme_file_uri('/img/no-thumb.jpg');
}
$data=get_post_meta(get_the_ID(), 'wesoftpress',true ); 
$data = !empty($data)? $data : [];
global $wesoftpress;
global $read_more;
?>
<main id="main-content">
    <section class="box-white photo">
        <div class="custom_container">
            <div class="marginTop20 hidden-print">
                <ol class="breadcrumb no-margin">
                    <li><a href="<?php echo get_post_type_archive_link('photogallery'); ?>"><i
                                class="fa fa-home"></i></a></li>
                    <?php 
                    if ($wesoftpress['time-switch'] == '1') {
                        $photo = 'ফটো গ্যালারি';
                    } else {
                        $photo = 'Photo Gallery';
                    }
                    $terms = get_the_terms( get_the_ID(), 'photogallery-categories' );
                    if(!empty($terms)){
                        foreach($terms as $term){
                            $termname = $term->name;
                            $termid = $term->term_id;
                        }
                        echo '<li><a href="'.get_term_link($termid).'">'.$termname.'</a></li>';
                    }else{
                        echo '<li><a href="'.get_post_type_archive_link('photogallery').'">'.$photo.'</a></li>';
                    } ?>

                </ol>
            </div>
            <div class="row">
                <div class="col-sm-8 main-content photo-print-block">
                    <div class="col-sm-12 photo-title">
                        <h1><?php the_title(); ?></h1>
                        <div class="media">
                            <div class="media-body">
                                <small class="text-muted">
                                    <?php if ($wesoftpress['time-switch'] == '1') {
                                        echo '<i class="far fa-clock"></i> প্রকাশিত: '.bn_number(get_the_date('g:i a, j F Y')).'
                                        <i class="far fa-clock" style="margin-left: 5px;"></i> আপডেট: '.bn_number(get_the_modified_date('g:i a, j F Y')).'';
                                    } else {
                                        echo '<i class="far fa-clock"></i> Published: '.get_the_date('g:i a, j F Y').'
                                        <i class="far fa-clock" style="margin-left: 5px;"></i> Modified: '.get_the_modified_date('g:i a, j F Y').'';
                                    } ?>

                                </small>
                            </div>
                        </div>
                        <?php if($data['Paragraph']){
                            echo '<blockquote>
                                    <p>'.$data['Paragraph'][0].'</p>
                                </blockquote>';
                            }; ?>

                    </div>
                    <div class="padding15 hidden-print w-100 p-3">
                        <div class="custom-social-share d-flex justify-content-between">
                            <!-- <div class="custom_share_count pull-left">
                                <ul class="photo-tags">
                                    <li><i class="fa fa-tags"></i></li>
                                    <li><a href="https://www.jagonews24.com/topic/বলিউড#photo">বলিউড </a></li>
                                </ul>
                            </div> -->
                            <div class="social_share"><?php wcr_share_buttons(); ?></div>
                        </div>
                    </div>
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled">
                            <?php while (have_posts()) : the_post(); ?>
                            <?php if(isset($data['slide_img_link']) && count($data['slide_img_link']) > 0){ ?>
                            <?php $f=0;
                                foreach($data['slide_img_link'] as $slide_img_link){ ?>

                            <li class="col-sm-12" data-responsive="<?php echo $slide_img_link; ?>"
                                data-src="<?php echo $slide_img_link; ?>"
                                data-sub-html="<?php echo $data['pic_title'][$f]; ?>">
                                <div class="single-block auto">
                                    <div class="img-box">
                                        <img src="<?php echo $slide_img_link; ?>"
                                            alt="<?php echo $data['pic_title'][$f]; ?>" class="lazyload img-responsive">
                                        <div class="icon-box">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <p><?php echo $data['pic_title'][$f]; ?></p>
                                </div>
                            </li>

                            <?php $f++; if ($f == count($data['slide_img_link'])) break; } ?>
                            <?php } ?>
                            <?php endwhile; ?>

                        </ul>
                    </div>
                </div>
                <aside class="col-sm-4 aside hidden-print">
                    <div class="row marginTop20">
                        <div class="col-sm-12">
                            <h2 class="catTitle"> <?php echo $read_more; ?> &nbsp; <span class="liner"></span></h2>
                        </div>
                    </div>
                    <div class="row single-media">
                        <div class="col-sm-12">
                            <div class="media-list">
                                <?php $args1 = array(
                                    'post_type' => 'photogallery',
                                    'posts_per_page' => 20,
                                    'order' => 'DESC',
                                );
                                $lastpost = new WP_Query($args1);
                                if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="<?php the_permalink() ?>">
                                            <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                                alt="<?php the_title(); ?>" />
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php the_permalink() ?>"
                                            class="media-heading"><?php the_title(); ?></a>
                                    </div>
                                </div>
                                <?php endwhile;
                                endif ;
                                wp_reset_query();?>

                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="marginBottom20 hidden-print">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="catTitle"><a href="#"><?php echo $read_more; ?></a><span class="liner"></span></h2>
                    </div>
                </div>
                <div class="row">
                    <?php $args1 = array(
                                    'post_type' => 'photogallery',
                                    'posts_per_page' => 8,
                                    'order' => 'DESC',
                                );
                    $lastpost = new WP_Query($args1);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <div class="col-md-3">
                        <div class="single-block auto">
                            <div class="img-box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('custom-size');
                                            } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                        alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                                <div class="icon-box"><i class="fa fa-camera"></i></div>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>"
                                    title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 10); ?></a>
                            </h4>
                        </div>
                    </div>
                    <?php endwhile;
                    endif ;
                    wp_reset_query();?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>