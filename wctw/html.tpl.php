<!DOCTYPE html>
<html>
<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
	<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!--[if lt IE 9]>
	<script src="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/js/selectivizr.js"></script>
	<script src="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/js/html5shiv.js"></script>
	<![endif]-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/css/ie7.css">
	<![endif]-->
	<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/css/ie_6.css">
	<![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
