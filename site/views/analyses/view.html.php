<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalyses extends JViewLegacy
{

    function display($tpl = null)
    {
        // Assign data to the view
        $this->msg = 'Hello World analyses';

        // Display the view
        parent::display($tpl);
    }
}