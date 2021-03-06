<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaViewAnalyses extends JViewLegacy
{

    function display($tpl = null)
    {

        // Get application
        $app = JFactory::getApplication();
        $context = "mkarta.list.admin.analysis";

        // Get data from the model
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');

        $this->state			= $this->get('State');

        // Remove the old ordering mechanism
        //$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'id', 'cmd');
        //$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'desc', 'cmd');

        $this->filterForm    	= $this->get('FilterForm');
        $this->activeFilters 	= $this->get('ActiveFilters');

        // What Access Permissions does this user have? What can (s)he do?
        $this->canDo = JHelperContent::getActions('com_mkarta');

        //var_dump($this->canDo);

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors), 500);
        }
		
		// Set the submenu
		MkartaHelper::addSubmenu('mkarta');

        // Set the toolbar and number of found items
        $this->addToolBar();

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    protected function addToolBar()
    {

        $title = JText::_('COM_MKARTA_MANAGER_ANALYSES');

        if ($this->pagination->total)
        {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }

        JToolBarHelper::title($title, 'mkarta');


        JToolbarHelper::title(JText::_('COM_MKARTA_MANAGER_ANALYSES'));

        if ($this->canDo->get('core.create')) {
            JToolbarHelper::addNew('analysis_form.add');
        }

        if ($this->canDo->get('core.edit')) {
            JToolbarHelper::editList('analysis_form.edit');
        }

        if ($this->canDo->get('core.delete'))
        {
            JToolBarHelper::deleteList('', 'analyses.delete', 'JTOOLBAR_DELETE');
        }

        // Options button.
        if (JFactory::getUser()->authorise('core.admin', 'com_mkarta'))
        {
            JToolBarHelper::divider();
            JToolBarHelper::preferences('com_mkarta');
        }
    }

    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_MKARTA_ADMINISTRATION'));
    }
}