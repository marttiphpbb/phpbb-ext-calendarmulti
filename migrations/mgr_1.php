<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\migrations;

use marttiphpbb\calendarpoly\util\cnst;

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
						'topic_id'	=> ['UINT', 0],
						'start_jd'	=> ['UINT', 0],
						'end_jd'	=> ['UINT', 0],
					],
					'PRIMARY_KEY' 	=> 'id',
					'KEYS'		=> [
						'cmu_topic_id'	=> ['INDEX', ['topic_id']],
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
