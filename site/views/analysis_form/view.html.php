<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalysis_form extends JViewLegacy
{
    protected $form = null;
    protected $canDo;

    function display($tpl = null)
    {

        $this->analysis = $this->get('Analysis');

        //get the form to display
        $this->form = $this->get('Form');

        // Get the javascript script file for client-side validation
        $this->script = $this->get('Script');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

            return false;
        }

        // Display the view
        parent::display($tpl);
    }
}