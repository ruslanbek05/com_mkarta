<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class MkartaHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_MKARTA_SUBMENU_MESSAGES'),
			'index.php?option=com_mkarta',
			$submenu == 'mkarta'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_MKARTA_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_mkarta',
			$submenu == 'categories'
		);

		// Set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-helloworld ' .
										'{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_MKARTA_ADMINISTRATION_CATEGORIES'));
		}
	}
}