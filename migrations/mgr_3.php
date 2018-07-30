<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\migrations;

use marttiphpbb\calendarpoly\util\cnst;

class mgr_3 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendarpoly\migrations\mgr_2',
		];
	}

	public function update_data()
	{
		return [
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				cnst::L_ACP
			]],
			['module.add', [
				'acp',
				cnst::L_ACP,
				[
					'module_basename'	=> '\marttiphpbb\calendarpoly\acp\main_module',
					'modes'				=> [
						'forums',
						'data_exchange',
					],
				],
			]],
		];
	}
}
