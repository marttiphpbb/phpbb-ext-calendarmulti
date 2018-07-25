<?php
/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\migrations;

use marttiphpbb\calendarmulti\util\cnst;

class mgr_2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\marttiphpbb\calendarmulti\migrations\mgr_1',
		];
	}

	public function update_schema()
	{
		return [
			'add_columns'        => [
				$this->table_prefix . 'topics'        => [
					cnst::COLUMN_START  => ['UINT', NULL],
					cnst::COLUMN_END 	=> ['UINT', NULL],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'        => [
				$this->table_prefix . 'topics' => [
					cnst::COLUMN_START,
					cnst::COLUMN_END,
				],
			],
		];
	}
}
