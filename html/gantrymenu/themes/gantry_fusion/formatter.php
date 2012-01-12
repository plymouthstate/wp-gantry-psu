<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
class GantryFusionMenuFormatter extends AbstractRokMenuFormatter {

    function format_subnode(&$node) {
        // Format the current node
        if ($node->hasChildren()) {
            $node->addLinkClass("daddy");
        } else {
            $node->addLinkClass("orphan");
        }

        $node->addLinkClass("item");

        if ($node->getLevel() == "0") {
            $node->addListItemClass("root");
        }
    }
}