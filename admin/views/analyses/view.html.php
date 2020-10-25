<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaViewAnalyses extends JViewLegacy
{

    function display($tpl = null)
    {
        // Get data from the model
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
    }

    protected function addToolBar()
    {
        JToolbarHelper::title(JText::_('COM_MKARTA_MANAGER_ANALYSES'));
        JToolbarHelper::addNew('analysis_form.add');
        JToolbarHelper::editList('analysis_form.edit');
        JToolbarHelper::deleteList('', 'analyses.delete');
    }


}