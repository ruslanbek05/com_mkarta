<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalysis_form extends JViewLegacy
{
    protected $form = null;

    public function display($tpl = null)
    {
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->script = $this->get('Script');

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

        // Set the document
        $this->setDocument();
    }

    protected function addToolBar()
    {
        $input = JFactory::getApplication()->input;

        // Hide Joomla Administrator Main menu
        $input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);

        if ($isNew)
        {
            $title = JText::_('COM_MKARTA_MANAGER_ANALYSES_NEW');
        }
        else
        {
            $title = JText::_('COM_MKARTA_MANAGER_ANALYSES_EDIT');
        }

        JToolbarHelper::title($title, 'analysis_form');
        JToolbarHelper::save('analysis_form.save');
        JToolbarHelper::cancel(
            'analysis_form.cancel',
            $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
        );
    }

    protected function setDocument()
    {

        JHtml::_('behavior.framework');
        JHtml::_('behavior.formvalidator');

        $isNew = ($this->item->id < 1);
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? JText::_('COM_MKARTA_ANALYSIS_CREATING') :
            JText::_('COM_MKARTA_ANALYSIS_EDITING'));

        $document->addScript(JURI::root() . $this->script);
        $document->addScript(JURI::root() . "/administrator/components/com_mkarta"
            . "/views/analysis_form/submitbutton.js");
        JText::script('COM_MKARTA_ANALYSIS_ERROR_UNACCEPTABLE');


    }


}