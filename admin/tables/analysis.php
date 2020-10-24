<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

class MkartaTableAnalysis extends JTable
{
    /**
     * Constructor
     *
     * @param   JDatabaseDriver  &$db  A database connector object
     */
    function __construct(&$db)
    {
        parent::__construct('#__analyses', 'id', $db);
    }
}