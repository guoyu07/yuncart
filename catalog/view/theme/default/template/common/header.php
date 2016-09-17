<?php 
/* @var $this \Template\PHP */
/* @var $url \Url */
$url = $this->registry->get('url');
/* @var $lang \Language */
$lang = $this->registry->get('language');
/* @var $loader \Loader */
$loader = $this->registry->get('load');
/* @var $document \Document */
$document = $this->registry->get('document');
?><!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $lang->get('direction'); ?>" lang="<?php echo $lang->get('code'); ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $lang->get('direction'); ?>" lang="<?php echo $lang->get('code'); ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $lang->get('direction'); ?>" lang="<?php echo $lang->get('code'); ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $document->getTitle(); ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($document->getDescription()) { ?>
<meta name="description" content="<?php echo $document->getDescription(); ?>" />
<?php } ?>
<?php if ($document->getKeywords()) { ?>
<meta name="keywords" content= "<?php echo $document->getKeywords(); ?>" />
<?php } ?>
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
<link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">
<?php foreach ($document->getStyles() as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<?php foreach ($document->getLinks() as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($document->getScripts() as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>
</head>
<body class="<?php echo $class; ?>">
<nav id="top">
  <div class="container">
    <?php echo $loader->controller('common/currency'); ?>
    <?php echo $loader->controller('common/language'); ?>
    <div id="top-links" class="nav pull-right">
      <ul class="list-inline">
        <li><a href="<?php echo $url->link('information/contact'); ?>"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md"><?php echo $telephone; ?></span></li>
        <li class="dropdown"><a href="<?php echo $url->link('account/account', '', true); ?>" title="<?php echo $lang->get('text_account'); ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $lang->get('text_account'); ?></span> <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <?php if ($logged) { ?>
            <li><a href="<?php echo $url->link('account/account', '', true); ?>"><?php echo $lang->get('text_account'); ?></a></li>
            <li><a href="<?php echo $url->link('account/order', '', true); ?>"><?php echo $lang->get('text_order'); ?></a></li>
            <li><a href="<?php echo $url->link('account/transaction', '', true); ?>"><?php echo $lang->get('text_transaction'); ?></a></li>
            <li><a href="<?php echo $url->link('account/download', '', true); ?>"><?php echo $lang->get('text_download'); ?></a></li>
            <li><a href="<?php echo $url->link('account/logout', '', true); ?>"><?php echo $lang->get('text_logout'); ?></a></li>
            <?php } else { ?>
            <li><a href="<?php echo $url->link('account/register', '', true); ?>"><?php echo $lang->get('text_register'); ?></a></li>
            <li><a href="<?php echo $url->link('account/login', '', true); ?>"><?php echo $lang->get('text_login'); ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="<?php echo $url->link('account/wishlist', '', true); ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_wishlist; ?></span></a></li>
        <li><a href="<?php echo $url->link('checkout/cart'); ?>" title="<?php echo $lang->get('text_shopping_cart'); ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $lang->get('text_shopping_cart'); ?></span></a></li>
        <li><a href="<?php echo $url->link('checkout/checkout', '', true); ?>" title="<?php echo $lang->get('text_checkout'); ?>"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $lang->get('text_checkout'); ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="logo">
          <?php if ($logo) { ?>
          <a href="<?php echo $url->link('common/home'); ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
          <?php } else { ?>
          <h1><a href="<?php echo $url->link('common/home'); ?>"><?php echo $name; ?></a></h1>
          <?php } ?>
        </div>
      </div>
      <div class="col-sm-5"><?php echo $loader->controller('common/search'); ?>
      </div>
      <div class="col-sm-3"><?php echo $loader->controller('common/cart'); ?></div>
    </div>
  </div>
</header>
<?php if ($categories) { ?>
<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header"><span id="category" class="visible-xs"><?php echo $lang->get('text_category'); ?></span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($categories as $category) { ?>
        <?php if ($category['children']) { ?>
        <li class="dropdown"><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?></a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">
              <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
              <ul class="list-unstyled">
                <?php foreach ($children as $child) { ?>
                <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
            </div>
            <a href="<?php echo $category['href']; ?>" class="see-all"><?php echo $lang->get('text_all'); ?> <?php echo $category['name']; ?></a> </div>
        </li>
        <?php } else { ?>
        <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>
<?php } ?>
