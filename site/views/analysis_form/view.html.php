<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalysis_form extends JViewLegacy
{
    protected $form = null;
    protected $canDo;

    function display($tpl = null)
    {
        //get the form to display
        $this->form = $this->get('Form');

        //var_dump($this->form);

        // Display the view
        parent::display($tpl);
    }
}