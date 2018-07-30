<?php

/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_MARTTIPHPBB_CALENDARPOLY_SETTINGS_SAVED'
		=> 'Settings have been saved successfully!',

// extension dependency

	'ACP_MARTTIPHPBB_CALENDARPOLY_EXTENSION_DEPENDENCY'
		=> 'This extension depends on the %s extension. Please install it.',

// render_forums

	'ACP_MARTTIPHPBB_CALENDARPOLY_FORUMS_EXPLAIN'
		=> 'Select the forums for which events will be rendered.',
	'ACP_MARTTIPHPBB_CALENDARPOLY_FORUMS_ENABLED'
		=> 'Enabled',

// data_exchange

	'ACP_MARTTIPHPBB_CALENDARPOLY_DATA_EXCHANGE_EXPLAIN'
		=> 'Move single events to the Calendar Mono extension
		and vica versa.',

]);
