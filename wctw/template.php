<?php
/*
 *  Preprocess page.tpl.php to inject the $search_box variable back into D7.
 */
function wctw_preprocess_page(&$variables){
  $search_box = drupal_render(drupal_get_form('search_form'));
  $variables['search_box'] = $search_box;
}
/**
 * Implementation of hook form alter
 * Override the search box to add the graphic instead of the button.
 */
function wctw_form_alter(&$form, &$form_state, $form_id) {
	//kpr($form_id);
	if ($form_id == 'search_block_form') {  
			$form['search_block_form']['#attributes']["placeholder"] = "Search...";
			$form['actions']['submit']['#type'] ='image_button';
			$form['actions']['submit']['#src'] = drupal_get_path('theme','wctw').'/images/search.png';
			$form['actions']['submit']['#attributes']['class'][] = 'search_btn';
	
	  }
	if ($form_id == 'search_form') {
			$form['search_form']['#attributes']["placeholder"] = "Search...";
	}
	if (($form['#node']->type == 'calendar_event')&&($form['#node']->uid ==0)) {
		$form['actions']['submit']['#submit'][]= 'custom_node_submit';		
	  }
}

/**
* Alters link url in calendar events block in order to filter events at /events
*
* @see template_preprocess_calendar_datebox()
*/
function wctw_preprocess_calendar_datebox(&$vars) {
  $date = $vars['date'];
  $view = $vars['view'];
  $day_path = calendar_granularity_path($view, 'day');
  $vars['url'] = 'events/' . $date;
  $vars['link'] = !empty($day_path) ? l($vars['day'], $vars['url']) : $vars['day'];
}



function custom_node_submit($form, &$form_state) {
  $form_state['redirect'] = 'node/13492';
}

