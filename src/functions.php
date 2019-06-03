<?php

    $page = new \WPUIKIT\Page('Testseite');
    $page->setFunction(function() {

        ?>
        <div class="wrap">
            <h1>Testseite</h1>
        </div>
        <?php
        $a = new \WPUIKIT\Notice\Standard('HAI');
        echo $a;
    });
    $page->addSubpage(new \WPUIKIT\Subpage('Unterseite'));