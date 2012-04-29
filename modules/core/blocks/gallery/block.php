<?php

/**
 * Parsimony
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@parsimony.mobi so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Parsimony to newer
 * versions in the future. If you wish to customize Parsimony for your
 * needs please refer to http://www.parsimony.mobi for more information.
 *
 * @authors Julien Gras et Benoît Lorillot
 * @copyright  Julien Gras et Benoît Lorillot
 * @version  Release: 1.0
 * @category  Parsimony
 * @package core/blocks
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace core\blocks;

/**
 * Gallery Block Class 
 * Manages Gallery Block
 */

class gallery extends \block {

    public function saveConfigs() {
        $this->setConfig('img', $_POST['img']);
        $this->setConfig('script', $_POST['script']);
        $this->setConfig('width', $_POST['width']);
        $this->setConfig('height', $_POST['height']);
    }

    public function init() {
        $img =  array('Parsimony.png' => array('name' =>'/Parsimony.png', 'title' =>'admin/img/parsimony.png','alt' =>'Parsimony A new Generation of CMS', 'url' =>'admin/img/parsimony.png','description' =>'Helps the web to have talent and share it'));
        $this->setConfig('img', $img);
        $this->setConfig('script', 'swipe');
        $this->setConfig('width', '200');
        $this->setConfig('height', '200');       
    }
    
    public function ajaxRefresh($type = FALSE) {
	if ($type == 'add') {
	    return parent::ajaxRefresh($type);
	} else {
	    return 'document.getElementById("parsiframe").contentWindow.location.reload()';
	}
    }

}
?>
