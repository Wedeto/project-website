<?php
$this->addJS('vendor/foundation/js/foundation', 'jquery');
$this->addJS('vendor/highlight.js/highlight');
$this->addCSS('vendor/highlight.js/railscasts');
$this->addJS('wedeto', 'foundation');
$this->addCSS('wedeto');

$menu_items = [
    'Home' => url(''),
    'Application' => url('application'),
    'DB' => url('database'),
    'HTML' => url('html'),
    'HTTP' => url('http'),
    'FileFormats' => url('fileformats'),
    'Internationalization' => url('internationalization'),
    'IO' => url('io'),
    'Log' => url('log'),
    'Mail' => url('mail'),
    'Resolve' => url('resolve'),
    'Util' => url('util')
];

$current = $request->url->path;
?>
        <div class="row">
            <div class="small-offset-0 large-offset-2">
                <img src="<?=URL('assets/img/wedeto-logo.png');?>" style="width 100%;" />
            </div>
        </div>
        <div class="row">
            <div class="title-bar" data-responsive-toggle="navigation-menu" data-hide-for="medium" style="padding-left: 1rem; display: none;">
                <button class="menu-icon" type="button" data-toggle="navigation-menu">&nbsp;</button>
                <div class="title-bar-title">Navigation</div>
            </div>
            <div id="navigation-menu" class="medium-2 small-0 columns" data-sticky-container>
                <nav class="columns" data-sticky data-sticky-on="medium" data-top-anchor="main-content" data-btm-anchor="footer" data-stick-to="top" id="navigation-menu">
                    <ul class="vertical menu">
                        <?php foreach ($menu_items as $name => $url): ?>
                        <?php if ($url === $current): ?>
                        <li class="is-active"><a href="<?=$url?>"><?=$name?></a></li>
                        <?php if (!empty($submenu)): ?>
                        <ul class="nested vertical menu" data-magellan>
                        <?php foreach ($submenu as $sub_name => $sub_url): ?>
                        <li><a href="<?=$sub_url?>"><?=$sub_name?></a></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php else: ?>
                        <li><a href="<?=$url?>"><?=$name?></a></li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <div class="medium-10 small-12 columns" id="main-content">
