<?php
$this->addJS('vendor/foundation/js/foundation');
$this->addJS('vendor/highlight.js/highlight');
$this->addCSS('vendor/highlight.js/railscasts');
?>
        <div class="row">
            <div class="small-offset-0 large-offset-2">
                <img src="<?=URL('assets/img/wedeto-logo.png');?>" style="width 100%;" />
            </div>
        </div>
        <div class="row">
            <div class="medium-2 small-0 columns" data-sticky-container>
                <nav class="columns sticky" data-sticky data-sticky-on="medium" data-stick-to="top" id="navigation-menu">
                    <ul class="vertical menu" data-magellan>
                        <li><a href="<?=url('')?>">Home</a></li>
                        <li><a href="<?=url('auth')?>">Auth</a></li>
                        <li><a href="<?=url('application')?>">Application</a></li>
                        <li><a href="<?=url('database')?>">DB</a></li>
                        <li><a href="<?=url('html')?>">HTML</a></li>
                        <li><a href="<?=url('http')?>">HTTP</a></li>
                        <li><a href="<?=url('fileformats')?>">FileFormats</a></li>
                        <li><a href="<?=url('internationalization')?>">I18n</a></li>
                        <li><a href="<?=url('io')?>">IO</a></li>
                        <li><a href="<?=url('log')?>">Log</a></li>
                        <li><a href="<?=url('mail')?>">Mail</a></li>
                        <li><a href="<?=url('resolve')?>">Resolve</a></li>
                        <li><a href="<?=url('util')?>">Util</a></li>
                    </ul>
                </nav>
            </div>
            <div class="medium-10 small-12 columns">
