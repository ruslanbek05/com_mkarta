<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaViewAnalyses extends JViewLegacy
{
    protected $items;
    protected $pagination;

    function display($tpl = null)
    {
        $this->items = $this->get('Items');//getItems
        $this->pagination = $this->get('Pagination');//getPagination

        //var_dump($this->items);

        // Display the view
        parent::display($tpl);
    }
}