<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\migrations;

use marttiphpbb\calendarpoly\util\cnst;

class mgr_2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendarpoly\migrations\mgr_1',
		];
	}

	public function update_data()
	{
		$data = [
			'forums'	=> [],
		];

		return [
			['config_text.add', [cnst::ID, serialize($data)]],
		];
	}
}
