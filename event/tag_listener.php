<?php
/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\event;

use phpbb\event\data as event;
use marttiphpbb\calendarmulti\service\repo;
use marttiphpbb\calendarmulti\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class tag_listener implements EventSubscriberInterface
{
	protected $repo;

	public function __construct(repo $repo)
	{
		$this->repo = $repo;
	}

	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.calendartag.data'	=> 'marttiphpbb_calendartag_data',
		];
	}

	public function marttiphpbb_calendartag_data(event $event)
	{
		$total = $event['total'];

		if ($total)
		{
			return;
		}

		$topic_data = $event['topic_data'];
		$start_jd = $event['start_jd'];
		$end_jd = $event['end_jd'];
		$now_jd = $event['now_jd'];

		if ($start_jd || $end_jd)
		{
			return;
		}

		if (!(isset($topic_data[cnst::COLUMN_START])
			&& $topic_data[cnst::COLUMN_START]
			&& isset($topic_data[cnst::COLUMN_END])
			&& $topic_data[cnst::COLUMN_END]))
		{
			return;
		}

		$start_jd = $topic_data[cnst::COLUMN_START];
		$end_jd = $topic_data[cnst::COLUMN_END];
		$total = 1;
		$index = 1;

		$event['start_jd'] = $start_jd;
		$event['end_jd'] = $end_jd;
		$event['total'] = $total;
		$event['index'] = $index;
 	}
}
