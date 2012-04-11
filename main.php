<?php if (!defined('CMS')) exit; ?>
<?php echo $this->doctypeDeclaration(); ?>

<html<?php echo $this->htmlAttributes(); ?>>
<head>
<?php
    $site->addCss(BASE_URL.THEME_DIR.THEME.'/site.css');
    $site->addCss(BASE_URL.THEME_DIR.THEME.'/ip_content.css');
    $site->addCss(BASE_URL.LIBRARY_DIR.'js/colorbox/themes/2/colorbox.css');
    echo $site->generateHead();
?>
</head>
<body<?php if ($site->managementState()) { echo ' class="manage"'; } ?>>

<div class="main">

    <div class="pageHead">
        <a href="<?php echo $site->generateUrl(); ?>">
            <img class="headLogo" src="<?php echo BASE_URL.THEME_DIR.THEME; ?>/images/logo.png" alt="<?php echo $parametersMod->getValue('standard', 'configuration', 'main_parameters', 'name'); ?>" />
        </a>
        <div class="right">
            <div class="menuTop">
                <?php
                    require_once (BASE_DIR.LIBRARY_DIR.'php/menu/common.php');
                    $menuTop = new Library\Php\Menu\Common();
                    echo $menuTop->generateSubmenu('top', null, 1); //$zoneName, $parentElementId, $depthLimit
                ?>
            </div>
            <div class="languages">
                <?php echo $site->generateBlock('ipLanguages'); ?>
            </div>
        </div>
        <?php echo $site->generateBlock('ipSearch'); ?>
    </div>

    <div class="side">
        <div class="box leftMenu">
            <?php
                require_once (BASE_DIR.LIBRARY_DIR.'php/menu/common.php');
                $menuLeft = new Library\Php\Menu\Common();
                echo $menuLeft->generateSubmenu('left', null, 2);  //$zoneName, $parentElementId, $depthLimit
            ?>
        </div>
        <?php echo $site->generateBlock('side'); ?>
    </div>

    <div class="breadcrumb">
        <?php echo $site->generateBlock('ipBreadcrumb'); ?>
    </div>

    <div class="menuSub">
        <?php
          //third level menu generation example
          require_once (BASE_DIR.LIBRARY_DIR.'php/menu/common.php');
          $menuLeft = new \Library\Php\Menu\Common();
          echo $menuLeft->generate('left', 3, 1);
        ?>
    </div>

    <div class="content">
        <?php echo $site->generateBlock('main'); ?>
    </div>

    <div class="clear"><!-- --></div>
</div>

<div class="footer clearfix">
    <p class="left">Theme "IP classic"</p>
    <p class="right">Drag &amp; drop with <a href="http://www.impresspages.org">ImpressPages CMS</a></p>
</div>

<?php
    $site->addJavascript(BASE_URL.LIBRARY_DIR.'js/jquery/jquery.js');
    $site->addJavascript(BASE_URL.LIBRARY_DIR.'js/colorbox/jquery.colorbox.js');
    $site->addJavascript(BASE_URL.THEME_DIR.THEME.'/site.js');
    echo $site->generateJavascript();
?>
</body>
</html>
