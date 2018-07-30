<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\service;

use phpbb\db\driver\factory as db;
use phpbb\content_visibility;
use phpbb\auth\auth;
use phpbb\user;
use marttiphpbb\calendarpoly\util\cnst;

class repo
{
	protected $db;
	protected $auth;
	protected $user;
	protected $topics_table;

	public function __construct(
		db $db,
		content_visibility $content_visibility,
		auth $auth,
		user $user,
		string $table_prefix,
		string $topics_table
	)
	{
		$this->db = $db;
		$this->content_visibility;
		$this->auth = $auth;
		$this->user = $user;
		$this->topics_table = $topics_table;
		$this->events_table = $table_prefix . cnst::TABLE;

	}

	public function get_current_events_for_topics(int $now_jd, array $topic_ids):array
	{






	}

	public function get_events_by_topic(int $topic_id):array
	{
		$events = [];

		$sql = 'select c.start_jd, c.end_jd
			from ' . $this->events_table . ' c
			where c.topic_id = ' . $topic_id . '
			order by c.start_jd';
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$events[] = $row;
		}

		$this->db->sql_freeresult($result);

		return $events;
	}

	public function get_all_visible_by_period(int $start_jd, int $end_jd):array
	{
		$ary = [];

		$forum_ids = array_keys($this->auth->acl_getf('f_read', true));

		$sql = 'select t.topic_id, t.forum_id, t.topic_reported, t.topic_title,
				c.start_jd, c.end_jd
			from ' . $this->topics_table . ' t, ' . cnst::TABLE . ' c
			where c.topic_id = t.topic_id
				and (c.start_jd <= ' . $end_jd . ' and c.end_jd >= ' . $start_jd . ')
				and ' . $this->db->sql_in_set('t.forum_id', $forum_ids, false, true) . '
				and ' . $this->content_visibility->get_forums_visibility_sql('topic', $forum_ids, 't.') . '
				and ' . $this->db->sql_in_set('t.topic_type', [POST_NORMAL, POST_STICKY]) . '
			order by c.start_jd';
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!isset($ary[$row['topic_id']]))
			{
				$ary[$row['topic_id']] = [
					'data'	=> [
						'forum_id'			=> $row['forum_id'],
						'topic_reported'	=> $row['topic_reported'],
						'topic_title'		=> $row['topic_title'],
					],
				];
			}

			$ary[$row['topic_id']]['events'][] = [
				'start_jd'	=> $row['start_jd'],
				'end_jd'	=> $row['end_jd'],
			];
		}

		$this->db->sql_freeresult($result);

		return $ary;
	}
}
