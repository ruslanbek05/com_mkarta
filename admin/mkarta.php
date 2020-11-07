<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_mkarta'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-mkarta {background-image: url(../media/com_mkarta/images/Tux-16x16.png);}');

// Require helper file
JLoader::register('MkartaHelper', JPATH_COMPONENT . '/helpers/mkarta.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Mkarta');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task','display'));

// Redirect if set by the controller
$controller->redirect();