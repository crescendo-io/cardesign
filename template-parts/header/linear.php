<?php
    $menu = get_field('menu_items', 'option');
?>

<div class="popin-contact">

    <button class="close">
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/cross.svg" alt="Fermeture de la popin de contact">
    </button>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Nous contacter</h2>
                <ul>
                    <li>
                        <p>
                            <strong>Atelier</strong>
                            13 Rue Lavoisier Ozoir la Ferrière 77330 PARIS
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Siège social</strong>
                            88 Avenue des Ternes 17ème
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Téléphone</strong>
                            01 64 40 20 00
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Email</strong>
                            car-design@orange.fr
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2629.7239116427027!2d2.6819807156711715!3d48.768068479278774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e607515bd24ff5%3A0xe1d431431a1469de!2sCar%20Design%20Styling!5e0!3m2!1sfr!2sfr!4v1606619747911!5m2!1sfr!2sfr" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo">
                    <a href="<?= get_site_url(); ?>">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/styles/img/logo.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="burger-menu">
                    <div class="barre"></div>
                    <div class="barre"></div>
                    <div class="barre"></div>
                </div>
                <ul class="main-menu">
                    <?php
                    foreach ($menu as $menu_item):
                        $pageId = $menu_item['menu_items_primary'];
                        $haveSub = $menu_item['menu_items_sub'];
                        $subMenu = $menu_item['menu_items_secondary'];
                        $imageSubMenu = $menu_item['menu_secondary_image'];
                        $imageSubMenuUrl = '';
                        if($imageSubMenu){
                            $imageSubMenuUrl = get_custom_thumb($imageSubMenu, 'large');
                        }

                        $title = get_the_title($pageId);
                        $link = get_the_permalink($pageId);
                        ?>

                        <li>
                            <a href="<?= $link; ?>"><?= $title; ?></a>
                            <?php if($haveSub && $subMenu): ?>
                                <div class="arrow-sub"></div>
                                <ul class="submenu">
                                    <?php if(isset($imageSubMenuUrl['url']) && $imageSubMenuUrl['url']): ?>
                                        <div class="image">
                                            <img src="<?= $imageSubMenuUrl['url']; ?>" width="<?= $imageSubMenuUrl['width']; ?>" height="<?= $imageSubMenuUrl['height']; ?>" class="img" alt="<?= $imageSubMenuUrl['alt']; ?>" loading="lazy">
                                        </div>
                                    <?php endif; ?>

                                    <div class="links">
                                        <li class="intro-link">
                                            <a href="<?= $link; ?>"><?= $title; ?></a>
                                        </li>
                                        <?php
                                        foreach ($subMenu as $subMenuItem):
                                            $title = get_the_title($subMenuItem);
                                            $link = get_the_permalink($subMenuItem);
                                            ?>
                                            <li class="link-sub">
                                                <a href="<?= $link; ?>">
                                                    <?= $title; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </div>
                                </ul>
                            <?php endif; ?>
                        </li>

                    <?php
                    endforeach;
                    ?>
                    <li>
                        <a href="<?= get_site_url(); ?>/galerie/">
                            Galerie
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-4 text-right">
                <a href="#devis" class="button">Demander un devis</a>
            </div>
        </div>
    </div>
</div>

<?php custom_breadcrumb(); ?>
