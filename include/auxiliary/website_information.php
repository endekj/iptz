<?php
function website_title(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='title' limit 1");
	$website_title=$row['option_value'];
	return $website_title;
}

function website_subtitle(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='subtitle' limit 1");
	$website_subtitle=$row['option_value'];
	return $website_subtitle;
}

function website_keywords(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='keywords' limit 1");
	$website_keywords=$row['option_value'];
	return $website_keywords;
}

function website_description(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='description' limit 1");
	$website_description=$row['option_value'];
	return $website_description;
}

function website_code_bottom(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='bottom_code' limit 1");
	$website_bottom_code=$row['option_value'];
	return $website_bottom_code;
}

function website_code_probe_add_top(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='code_probe_add_top' limit 1");
	$website_code_probe_add_top=$row['option_value'];
	return $website_code_probe_add_top;
}

function website_code_probe_query_top(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='code_probe_query_top' limit 1");
	$website_code_probe_query_top=$row['option_value'];
	return $website_code_probe_query_top;
}

function website_background_img(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='background_img' limit 1");
	$website_background_img=$row['option_value'];
	return $website_background_img;
}

function website_background_music(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='background_music' limit 1");
	$website_background_music=$row['option_value'];
	return $website_background_music;
}
?>