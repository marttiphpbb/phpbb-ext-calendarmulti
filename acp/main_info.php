<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\acp;

use marttiphpbb\calendarpoly\util\cnst;

class main_info
{
	function module():array
	{
		return [
			'filename'	=> '\marttiphpbb\calendarpoly\acp\main_module',
			'title'		=> cnst::L_ACP,
			'modes'		=> [
				'forums'	=> [
					'title'	=> cnst::L_ACP . '_FORUMS',
					'auth'	=> 'ext_marttiphpbb/calendarpoly && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
				'data_exchange'	=> [
					'title'	=> cnst::L_ACP . '_DATA_EXCHANGE',
					'auth'	=> 'ext_marttiphpbb/calendarpoly && acl_a_board',
					'cat'	=> [cnst::L_ACP],
				],
			],
		];
	}
}
