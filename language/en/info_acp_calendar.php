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

	'ACP_MARTTIPHPBB_CALENDARPOLY'					=> 'Calendar Poly',
	'ACP_MARTTIPHPBB_CALENDARPOLY_FORUMS'			=> 'Forums',
	'ACP_MARTTIPHPBB_CALENDARPOLY_DATA_EXCHANGE'	=> 'Data Exchange',
]);
