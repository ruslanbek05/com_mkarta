<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalysis extends JViewLegacy
{
    protected $item;

    function display($tpl = null)
    {

        $this->item = $this->get('Item');//getItems

        //var_dump($this->item);

        // Display the view
        parent::display($tpl);
    }
}