<?php
get_header();

$real_title = get_field('real_title');
$real_subtitle = get_field('real_subtitle');
$real_title_intro = get_field('real_title_intro');
$real_text_intro = get_field('real_text_intro');

$intro_image = get_field('galerie_photo');
if($intro_image){
    $intro_image_url = get_custom_thumb($intro_image, 'relsize');
}


$real_before = get_field('real_before');
if($real_before){
    $real_before_url = get_custom_thumb($real_before, 'relsize');
}

$real_after = get_field('real_after');

if($real_after){
    $real_after_url = get_custom_thumb($real_after, 'relsize');
}
?>
    <div class="strate-hero middle dark">
        <?php if(isset($intro_image_url) && $intro_image_url) : ?>
        <img src="<?= $intro_image_url['url']; ?>" class="strate-hero_image" alt="" width="2560" height="1431">
        <?php endif; ?>

        <?php if($real_title): ?>
        <div class="strate-hero_inner">
            <h1><?= $real_title; ?></h1>
            <h2><?= $real_subtitle; ?></h2>
        </div>
        <?php else: ?>
        <div class="strate-hero_inner">
            <h1><?= get_the_title(); ?></h1>
        </div>
        <?php endif; ?>
    </div>

    <div class="strate marge-small"></div>

    <?php if($real_title_intro || $real_text_intro) : ?>
    <div class="strate">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 mx-auto text-center">
                    <h2>
                        <?= $real_title_intro; ?>
                    </h2>
                    <?= $real_text_intro; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(isset($real_before_url['url']) && $real_before_url['url'] && isset($real_after_url['url']) && $real_after_url['url']): ?>
    <div class="strate">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="beforeAfter">
                    <img src="<?= $real_before_url['url']; ?>" />
                    <img src="<?= $real_after_url['url']; ?>" />
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
    $real_steps = get_field('real_steps');
    if($real_steps):
    ?>
    <div class="strate container-pushs-articles">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>
                        Les différentes étapes
                    </h2>
                </div>
            </div>

            <div class="row steps-content">

                <?php
                    foreach ($real_steps as $real_step):
                        if(isset($real_step['real_step_image']) && $real_step['real_step_image']){
                            $real_step_img = get_custom_thumb($real_step['real_step_image'], 'relsize');
                        }
                        $real_step_text = $real_step['real_step_text'];
                ?>
                <div class="col-sm-6">
                    <div class="container-pushs-article dynamics">
                        <img src="<?= $real_step_img['url']; ?>" class="pushs-article-image" alt="" width="2560" height="1431" loading="lazy">

                        <?php if($real_step_text): ?>
                        <div class="pushs-article-description">
                            <p><?= $real_step_text; ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <div class="strate container-slider-cards ">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Ces réalisations pourraient vous intéresser</h2>
                    <p>Découvrez ces réalisations, elles pourraient vous intéresser si vous recherchez des services similaires.</p>
                </div>
                <div class="col-sm-4 text-right">
                    <div class="container-buttons">
                        <a href="https://contact.com" target="" class="button primary ">
                            Nous Contacter        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="swiper" data-itemsdesk="3.4" data-itemstablet="3" data-itemsmobile="1.3">
            <div class="swiper-wrapper">
                <?php
                // ID du post courant (par exemple, dans une boucle single)
                $current_post_id = get_the_ID();

                // Configuration de la requête WP_Query
                $args = array(
                    'post_type'      => 'galerie',
                    'posts_per_page' => 5,
                    'post__not_in'   => array($current_post_id),
                    'orderby'        => 'rand',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'typo_product',
                            'field'    => 'term_id',
                            'terms'    => wp_get_post_terms($current_post_id, 'typo_product', array('fields' => 'ids')), // Termes liés au post courant
                        ),
                    ),
                );

                // Requête WP_Query
                $related_posts_query = new WP_Query($args);

                if ($related_posts_query->have_posts()) :
                    while ($related_posts_query->have_posts()) : $related_posts_query->the_post();
                        $intro_image_url = '';
                        $intro_image = get_field('galerie_photo');
                        if($intro_image){
                            $intro_image_url = get_custom_thumb($intro_image, 'crosslink');
                        }

                    ?>

                        <div class="swiper-slide">
                            <div class="card-slide">
                                <a href="<?= get_the_permalink() ?>" >
                                    <img src="<?= $intro_image_url['url']; ?>" alt="<?= $intro_image_url['alt']; ?>" width="<?= $intro_image_url['width']; ?>" height="<?= $intro_image_url['height']; ?>" loading="lazy">
                                    <div class="text">
                                        <p><?= get_the_title(); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata(); // Réinitialiser les données
                else :
                    echo '<p>Aucun post trouvé.</p>';
                endif;
                ?>
            </div>
        </div>

    </div>

<?php get_footer();
