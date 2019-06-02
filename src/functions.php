<?php

    $page = new \WPUIKIT\Page('Testseite');
    $subpage = new \WPUIKIT\Subpage('Unterseite');
    $page->addSubpage($subpage);