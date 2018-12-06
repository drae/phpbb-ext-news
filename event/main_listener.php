<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

namespace numeric\news\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	/* @var \phpbb\controller\helper */
	protected $helper;
	protected $db;
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\controller\helper	$helper		Controller helper object
	*/
	public function __construct(\phpbb\controller\helper $helper, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template)
	{
		$this->helper = $helper;
		$this->db = $db;
		$this->template = $template;
	}

	/**
	*
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.index_modify_page_title' => 'news',
		);
	}


	public function news($event)
	{
		$this->template->assign_vars(array(
			'SCREENSHOT'	=> '/styles/aquila/theme/images/sister_sasszine_mythic.jpg',
			'NEWS_TITLE'	=> 'Sass\'zine and gone',
			'NEWS_POST'		=> 'One of the tougher bosses in Tomb of Sargeras and what the heck were Blizzard thinking of with the room and colour choices! None the less the boss fell over and was pronounced deceased as of this day (well till next reset).'
//			'U_SCHEDULE' => $this->helper->route('numeric_raidschedule_controller__no_rid'),
		));
	}
}
