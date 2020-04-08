<?php
/**
* phpBB Extension - marttiphpbb calendarpoly
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarpoly\acp;

use marttiphpbb\calendarpoly\util\cnst;

class main_module
{
	var $u_action;

	function main($id, $mode):void
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');
		$template = $phpbb_container->get('template');
		$config = $phpbb_container->get('config');
		$request = $phpbb_container->get('request');
		$store = $phpbb_container->get('marttiphpbb.calendarpoly.store');
		$phpbb_root_path = $phpbb_container->getParameter('core.root_path');

		$language->add_lang('acp', cnst::FOLDER);
		add_form_key(cnst::FOLDER);

		switch($mode)
		{
			case 'forums':

				$this->tpl_name = 'forums';
				$this->page_title = $language->lang(cnst::L_ACP . '_FORUMS');

				$cforums = make_forum_select(false, false, false, false, true, false, true);

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$enabled_ary = $request->variable('enabled', [0 => 0]);

					$store->transaction_start();

					foreach ($cforums as $forum)
					{
						$forum_id = $forum['forum_id'];
						$store->set_enabled($forum_id, isset($enabled_ary[$forum_id]));
					}

					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				if (sizeof($cforums))
				{
					foreach ($cforums as $forum)
					{
						$forum_id = $forum['forum_id'];

						$template->assign_block_vars('cforums', [
							'NAME'		=> $forum['padding'] . $forum['forum_name'],
							'ID'		=> $forum_id,
							'ENABLED'	=> $store->get_enabled($forum_id),
						]);
					}
				}

			break;

			case 'data_exchange':

				$this->tpl_name = 'data_exchange';
				$this->page_title = $language->lang(cnst::L_ACP . '_DATA_EXCHANGE');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$before = $request->variable('placement_before', 0);
					$store->transaction_start();
					$store->set_placement_before($before ? true : false);
					$store->set_first_day($request->variable('first_day', 0));
					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'S_PLACEMENT_BEFORE'	=> $store->get_placement_before(),
					'FIRST_DAY'				=> $store->get_first_day(),
				]);

			break;
		}

		$template->assign_vars([
			'U_ACTION'				=> $this->u_action,
//			'S_MONO_ENABLED'		=> $posting->get_mono_enabled(),
//			'S_DATEPICKER_ENABLED'	=> $posting->get_datepicker_enabled(),
		]);
	}
}
