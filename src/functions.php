<?php

    if(is_admin()) {
        /*
        $page = new \WPUIKIT\Page('Testseite');
        $page->addSubpage(new \WPUIKIT\Subpage('Unterseite'));

        $page->setUi(new \WPUIKIT\UI\Body(array(
            new \WPUIKIT\UI\Typography\Headline('Page')
        )));
        */

        $adminMenu = new \WPUIKIT\Menu('WPUIKIT');
        $adminMenu->setSubmenus(array(
            new \WPUIKIT\Submenu('Sub #1'),
            new \WPUIKIT\Submenu('Sub #2')
        ));

        $adminMenu->setRenderElement(
            new \WPUIKIT\UI\Page(array(
                new \WPUIKIT\UI\Headline('Hi'),
                new \WPUIKIT\UI\Headline('Hi111')
            ))
        );

        new \WPUIKIT\Notice('Hi');

    }