<?php
/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\util;

class cnst
{
	const FOLDER = 'marttiphpbb/calendarmulti';
	const ID = 'marttiphpbb_calendarmulti';
	const PREFIX = self::ID . '_';
	const L = 'MARTTIPHPBB_CALENDARMULTI';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const EXT_PATH = 'ext/' . self::FOLDER . '/';
	const COLUMN_PREFIX = 'marttiphpbb_calendar_';
	const COLUMN_START = self::COLUMN_PREFIX . 'start_jd';
	const COLUMN_END = self::COLUMN_PREFIX . 'end_jd';
	const TAG_IS_PREFIX = self::ID . '_tag_is_prefix';
}
