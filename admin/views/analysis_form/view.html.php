<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalysis_form extends JViewLegacy
{
    protected $form = null;
    protected $canDo;

    public function display($tpl = null)
    {
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->script = $this->get('Script');

        // What Access Permissions does this user have? What can (s)he do?
        $this->canDo = JHelperContent::getActions('com_mkarta', 'analysis', $this->item->id);



        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors), 500);
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
            //$title = JText::_('COM_MKARTA_MANAGER_ANALYSES_NEW');

            if ($this->canDo->get('core.create'))
            {
                JToolBarHelper::apply('analysis_form.apply', 'JTOOLBAR_APPLY');
                JToolBarHelper::save('analysis_form.save', 'JTOOLBAR_SAVE');
                JToolBarHelper::custom('analysis_form.save2new', 'save-new.png', 'save-new_f2.png',
                    'JTOOLBAR_SAVE_AND_NEW', false);
            }
            JToolBarHelper::cancel('analysis_form.cancel', 'JTOOLBAR_CANCEL');

        }
        else
        {
            //$title = JText::_('COM_MKARTA_MANAGER_ANALYSES_EDIT');

            if ($this->canDo->get('core.edit'))
            {
                // We can save the new record
                JToolBarHelper::apply('analysis_form.apply', 'JTOOLBAR_APPLY');
                JToolBarHelper::save('analysis_form.save', 'JTOOLBAR_SAVE');

                // We can save this record, but check the create permission to see
                // if we can return to make a new one.
                if ($this->canDo->get('core.create'))
                {
                    JToolBarHelper::custom('analysis_form.save2new', 'save-new.png', 'save-new_f2.png',
                        'JTOOLBAR_SAVE_AND_NEW', false);
                }
            }
            if ($this->canDo->get('core.create'))
            {
                JToolBarHelper::custom('analysis_form.save2copy', 'save-copy.png', 'save-copy_f2.png',
                    'JTOOLBAR_SAVE_AS_COPY', false);
            }
            JToolBarHelper::cancel('analysis_form.cancel', 'JTOOLBAR_CLOSE');


        }
/*
        JToolbarHelper::title($title, 'analysis_form');
        JToolbarHelper::save('analysis_form.save');
        JToolbarHelper::cancel(
            'analysis_form.cancel',
            $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
        );
*/
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