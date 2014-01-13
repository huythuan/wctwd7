<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */

?>
<div id="page-wrap">
		<div id="header">
			<div id="top_navigation">
					<?php if ($secondary_menu): ?>			        
				        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu','class' => 'tiny_navigation'))); ?>
				    <?php endif; ?>
			</div>
			<div id="search">
				<?php print render($page['search_box']); ?>
			</div>		
		</div><!--END header-->
		<div id="banner">
			<div id="logo">
				 <?php if ($logo): ?>
			        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
					  <p>wine country this week</p>
			          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			        </a>
			      <?php endif; ?>
			</div>
			<blockquote>
				<p>The most comprehensive resource for</p> 
				<p>wine tasting and touring in California since 1981</p>
			</blockquote>
			<div id="follow">
					<ul>
						<li>
							<a  target="_blank" title="facebook" href="http://www.facebook.com/">							
									<img src="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/images/facebook.png" alt="facebook">							  
							</a>
						</li>
						
						<li>
						   <a target="_blank" title="twitter" href="http://twitter.com/">
									<img src="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/images/twitter.png" alt="twitter">								
							</a>
						</li>
						<li>
						   <a target="_blank" title="bebo" href="http://bebo.com/">
							<img src="<?php print $GLOBALS['base_url']."/".path_to_theme() ?>/images/bebo.png" alt="bebo">								
							</a>
						</li>					
					</ul>								
			</div><!--END follow-->
		</div><!--END banner-->
		<!-- #navigation -->
        <div id="page_navigation">        
            	<?php if ($main_menu): ?>
			      <div id="nav">
			        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main_menu', 'class' => 'tiny_navigation'))); ?>				       
			      </div> <!-- /#navigation -->
			    <?php endif; ?>            
        </div><!-- /#navigation -->
		<div id="main_content">
			<div id="sidebar_left" class="rc_content">
		        <?php print render($title_prefix); ?>
		        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
		        <?php //print render($title_suffix); ?>
		        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
		        <?php //print render($page['help']); ?>
		        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				 <?php print !empty($region_nav) ? $region_nav : ''; ?>
		        <?php print render($page['content']); ?>
		        <?php print $feed_icons; ?>
			</div><!--END content_nav-->
			<div id="sidebar_right">
				<?php print render($page['sidebar_right_top']); ?>	
				<ul>
					<li>
						<a href="<?php print $GLOBALS['base_url']?>/newsletter/signup">
							<div id="sign_up">
								<p class="custome_header_1">sign up for our</p>
								<h2 class="custome_header_2">email newsletter</h2>
								<p class="custome_header_3">for wine country news, news &amp;events!</p>
							</div>
						</a>
					 </li>
				</ul>
				<?php print render($page['sidebar_right_bottom']); ?>
				<?php print render($page['second_sidebar_right_bottom']); ?>					
			</div><!--END sidebar right-->	
		
		</div><!-- END Main Content -->
		
		<footer>	
			<div id ="footer_ads">
				<?php print render($page['footer']); ?>			
			</div>
			<div class="copyright"><p> &copy; Copyright Gold Country Media | <a href="<?php print $GLOBALS['base_url']?>/contact-us">Contact Us</a></p></div>
		</footer>
		<div class="clearboth"></div>

		
</div> <!-- END Page Wrap -->	
