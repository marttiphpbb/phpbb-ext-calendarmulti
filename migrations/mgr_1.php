<?php
/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\migrations;

use marttiphpbb\calendarmulti\util\cnst;

class mgr_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\phpbb\db\migration\data\v32x\v321',
		];
	}

	public function update_schema()
	{
		return [
			'add_tables'    => [
				$this->table_prefix . cnst::TABLE => [
					'COLUMNS'	=> [
						'id'		=> ['UINT', NULL, 'auto_increment'],
						'topic_id'	=> ['UINT', NULL],
						'start_jd'	=> ['UINT', NULL],
						'end_jd'	=> ['UINT', NULL],
					],
					'PRIMARY_KEY' 	=> 'id',
					'KEYS'		=> [
						'cmutid'	=> ['INDEX', ['topic_id']],
					],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_tables'			=> [
				$this->table_prefix . cnst::TABLE,
			],
	   ];
	}
}
