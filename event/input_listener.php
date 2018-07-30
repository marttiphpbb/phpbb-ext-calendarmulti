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

class input_listener implements EventSubscriberInterface
{
	protected $repo;

	public function __construct(repo $repo)
	{
		$this->repo = $repo;
	}

	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.calendarmonoinput.tpl_vars'
				=> 'marttiphpbb_calendarmonoinput_tpl_vars',
		];
	}

	public function marttiphpbb_calendarmonoinput_tpl_vars(event $event)
	{
		$ext = $event['ext'];

		if ($ext)
		{
			return;
		}

		$start_jd = $event['start_jd'];
		$end_jd = $event['end_jd'];
		$topic_data = $event['topic_data'];
		$topic_id = $topic_data['topic_id'];

		$events = $this->repo->get_events_by_topic($topic_id);

		if (count($events) === 1)
		{
			$event = current($events);
			$start_jd = $event['start_jd'];
			$end_jd = $event['end_jd'];
		}

		$ext = cnst::FOLDER;

		$event['start_jd'] = $start_jd;
		$event['end_jd'] = $end_jd;
		$event['ext'] = $ext;
 	}
}
