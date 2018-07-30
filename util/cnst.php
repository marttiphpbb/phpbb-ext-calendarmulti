<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\util;

class cnst
{
	const FOLDER = 'marttiphpbb/calendarpoly';
	const ID = 'marttiphpbb_calendarpoly';
	const PREFIX = self::ID . '_';
	const CACHE_ID = '_' . self::ID;
	const L = 'MARTTIPHPBB_CALENDARPOLY';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const EXT_PATH = 'ext/' . self::FOLDER . '/';
	const TABLE = self::ID;
	const COLUMN_START = 'start_jd';
	const COLUMN_END = 'end_jd';
}
