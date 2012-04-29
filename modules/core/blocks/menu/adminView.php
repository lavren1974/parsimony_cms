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
?>

<script type="text/javascript" src="<?php echo BASE_PATH; ?>lib/nestedSortable/jquery.ui.nestedSortable.js"></script>
<script type="text/javascript" src="http://jquery-json.googlecode.com/files/jquery.json-2.2.min.js" ></script>
<link rel="stylesheet" type="text/css" href="/modules/core/blocks/menu/menu.css">
<style>
    fieldset{background: #EDEFF4;}
    .placeholder {background-color: #fff;border: 1px #ccc dashed}
    .ui-nestedSortable-error {background:#fbe3e4;color:#8a1f11;}
    ol {margin: 0;padding: 0;padding-left: 30px;}
    ol.sortable, ol.sortable ol {margin: 0 0 0 15px;padding: 0;list-style-type: none;}
    .sortable li {margin: 7px 0 0 0;padding: 0;}
    .sortable li > div  {background: #CBDDF3 url(img/arrow_move.png) no-repeat 7px 6px;border: 1px solid #2E63A5;padding: 3px;margin: 2px;cursor: move;line-height: 30px;padding-left:40px;border-radius: 4px;}
    .sortable li > div  input{background: transparent;}
    .ui-icon-closethick{margin-top: 7px;}
    #design-menu{border-radius:8px;color: #174F69;border: 1px solid #99BBE8;box-shadow: #F4F8FD 0 1px 0px 0 inset;font-weight: bold;padding-bottom: 5px;font-size: 13px;}
    legend{letter-spacing: 1.2px;font-size: 16px;}
    .parsimenu ul{top: 20px;left: -12px;}
    #linkmenu{border :1px solid #99BBE8;margin:10px; padding-bottom: 10px;border-radius: 8px;}
    linkmenuAdd{position: relative;top: 0px;margin-left: 25px;margin-top: 10px;margin-bottom: 10px;}
    #addPageItem{margin-left: 25px;background: #EBEBEB -webkit-linear-gradient(#FEFEFE, #F8F8F8 40%, #E9E9E9);}
    #addPageItem li{border-right: 1px #CCC solid;text-transform: capitalize;margin: 0 0 0 11px;padding: 4px;font-weight: normal;text-shadow: 0 1px 1px rgba(255, 255, 255, .9);color: #666;}
    #previewmenu{border :1px solid #99BBE8;margin:10px;border-radius: 8px;}
    .title1{text-align: left;margin: 10px 25px;color: #777;}
    .title2{text-align: left;position: relative;top: 8px;margin-left: 27px;margin-bottom: 15px;border-radius: 8px;color: #777;}
    .positionMenu{padding:11px 11px 0}
    .positionMenu{color: #777;}
    
    /* Overridde css for test */
    #linkmenu{padding-left: 15px;}
    #previewmenu legend{margin-left: 15px;}
    #design-menu legend{margin-left: 15px;}
    #design-menu{font-family: sans-serif;font-size: 12px;color:#585858}
    .title1{margin: 10px 0;}
    .title2{margin-left: 0;}
    #addPageItem{margin-left: 0;}
    #addPageItem li {cursor: pointer;}
    #addPageItem li li{padding: 0;margin: 0}
    #addPageItem li li a{padding: 4px;}
    .menutextfix{position: relative;top: -4px;}
    .sortable li > div{
	border: 1px solid #ccc ;font-weight: bold;color: #222 ;text-shadow: 0  1px  0  #ffffff ;
	background: #eee url(img/arrow_move.png) no-repeat 7px 6px;
	background: url(img/arrow_move.png) no-repeat 7px 6px, -webkit-gradient(linear, left top, left bottom, from( #ffffff), to( #f1f1f1));
	background: url(img/arrow_move.png) no-repeat 7px 6px, -webkit-linear-gradient( #ffffff, #f1f1f1); 
	background: url(img/arrow_move.png) no-repeat 7px 6px, -moz-linear-gradient( #ffffff, #f1f1f1);
	background: url(img/arrow_move.png) no-repeat 7px 6px, -ms-linear-gradient( #ffffff, #f1f1f1);
	background: url(img/arrow_move.png) no-repeat 7px 6px, -o-linear-gradient( #ffffff, #f1f1f1);
	background: url(img/arrow_move.png) no-repeat 7px 6px, linear-gradient( #ffffff, #f1f1f1);
    }
</style>
<div id="item-menu-template" class="none">
    <?php
    echo $this->drawadminmenu(array(array('id' => ' ', 'title' => ' ', 'url' => ' ')));
    ?>
</div>
<fieldset id="design-menu">
    <legend><?php echo t('Menu', FALSE); ?></legend>
    <div class="positionMenu"><span class="menutextfix"><?php echo t('Menu', FALSE); ?></span> <select name="position"><option value="0">Horizontal</option><option value="1" <?php if ($this->getConfig('position') == 1) echo ' selected="selected"'; ?>>Vertical</option></select></div>
    <fieldset id="linkmenu">
        <legend><?php echo t('Add Links', FALSE); ?></legend>
        <fieldset id="linkmenuAdd">
            <div class="title1"><?php echo t('Add A Link Manually', FALSE); ?></div>
            <input type="text" id="input_title" placeholder="<?php echo t('Title', FALSE); ?>" />
            <input type="text" id="input_url"  placeholder="http://" />
            <input type="button" value="<?php echo t('Add', FALSE); ?>" id="add-menu-item">
        </fieldset>
        <div class="title2"><?php echo t('Choose An Existing Link', FALSE); ?></div>
        <ul id="addPageItem" class="parsimenu">
	    <?php
	    foreach (\app::$activeModules as $module => $mode) {
		$moduleObj = \app::getModule($module);
		$pagesMod = $moduleObj->getPages();
		if (!empty($pagesMod)) {
		    ?>
		    <li class="inline-block"><?php echo $module; ?><ul>
			    <?php
			    foreach ($moduleObj->getPages() as $key => $page) {
				if (count($page->getURLcomponents()) == 0)
				    echo '<li><a data-title="' . htmlentities($page->getTitle()) . '" data-url="' . $page->getURL() . '" href="' . $page->getURL() . '">' . $page->getTitle() . '</a></li>';
			    }
			    ?>
			</ul>
		    </li>
		    <?php
		}
	    }
	    ?>
        </ul>
    </fieldset>
    <fieldset id="previewmenu">
        <legend><?php echo t('Preview Menu', FALSE); ?></legend>
        <ol class="sortable">
	    <?php
	    $menu = json_decode($this->getConfig('menu'), true);
	    if (is_array($menu)) {
		$this->drawadminmenu($menu);
	    }
	    ?>
        </ol>
        <input type="hidden" name="toHierarchy" id="toHierarchy">
    </fieldset>
</fieldset>
<script>
    function refreshPos(){
        $('#toHierarchy').val($.toJSON($('ol.sortable').nestedSortable('toHierarchy')));
    }
    $(document).ready(function() {
        function addLink(title,url){
            var maxnb = 0;
            $("ol.sortable li").each(function(i) {
                var tab = $(this).attr("id").split(/itemlist_/);
                if(parseInt(tab[1]) > maxnb) maxnb = parseInt(tab[1]);
            });
            maxnb++;
            var obj = $('#item-menu-template > li').clone().attr("id","itemlist_" + maxnb);
            obj.find(".input_title").val(title).attr("name","title[" + maxnb + "]");
            obj.find(".input_url").val(url).attr("name","url[" + maxnb + "]");
            obj.find(".input_active").attr("name","active[" + maxnb + "]");
            $("#input_title").val('');
            $("#input_url").val('');
            $("ol.sortable").append(obj);
            refreshPos();
        }
        $("#add-menu-item").click(function(){
            addLink($("#input_title").val(),$("#input_url").val());
        });
        $("#addPageItem a").click(function(){
            addLink($(this).data('title'),$(this).data('url'));
            return false;
        });
        $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper:	'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            update:function(){
                refreshPos();
            }
        });
        refreshPos();
    });
</script>