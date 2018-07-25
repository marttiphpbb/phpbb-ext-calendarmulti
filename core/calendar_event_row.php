<?php

/**
* phpBB Extension - marttiphpbb calendarmulti
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarmulti\core;

use marttiphpbb\calendarmulti\core\timespan;
use marttiphpbb\calendarmulti\core\calendarmulti_event;

class calendarmulti_event_row
{
	protected $timespan;
	protected $free_timespans = [];
	protected $calendarmulti_events = [];

	public function __construct(
		timespan $timespan
	)
	{
		$this->timespan = $timespan;
		$this->free_timespans = [$timespan];
	}

	public function insert_calendarmulti_event(calendarmulti_event $calendarmulti_event)
	{
		$timespan = $calendarmulti_event->get_timespan();

		foreach ($this->calendarmulti_events as $ev)
		{
			if ($ev->overlaps($timespan))
			{
				return false;
			}
		}

		$this->calendarmulti_events[] = $calendarmulti_event;

		return true;
	}
}
