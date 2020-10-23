<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaModelMkarta extends JModelItem
{
    protected $messages;


    /**
     * Method to get a table object, load it if necessary.
     *
     * @param   string  $type    The table name. Optional.
     * @param   string  $prefix  The class prefix. Optional.
     * @param   array   $config  Configuration array for model. Optional.
     *
     * @return  JTable  A JTable object
     *
     * @since   1.6
     */
    public function getTable($type = 'Mkarta', $prefix = 'MkartaTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }


    public function getMsg($id = 1)
    {
        if (!is_array($this->messages))
        {
            $this->messages = array();
        }

        if (!isset($this->messages[$id]))
        {
            // Request the selected id
            $jinput = JFactory::getApplication()->input;
            $id     = $jinput->get('id', 1, 'INT');

            // Get a TableHelloWorld instance
            $table = $this->getTable();

            // Load the message
            $table->load($id);

            // Assign the message
            $this->messages[$id] = $table->greeting;
        }

        return $this->messages[$id];
    }
}