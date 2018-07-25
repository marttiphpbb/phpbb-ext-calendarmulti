<?php
/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\acp;

use marttiphpbb\calendarmulti\util\cnst;

class main_info
{
	function module()
	{
		return [
			'filename'	=> '\marttiphpbb\calendarmulti\acp\main_module',
			'title'		=> cnst::L_ACP ,
			'modes'		=> [
				'tag_rendering'	=> [
					'title'	=> cnst::L_ACP . '_TAG_RENDERING',
					'auth'	=> 'ext_marttiphpbb/calendarmulti && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
