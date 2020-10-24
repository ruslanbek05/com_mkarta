<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaModelAnalysis_form extends JModelAdmin {

    protected $analysis;

    public function getTable($type = 'Analysis', $prefix = 'MkartaTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getAnalysis($id=1){

        if (!is_array($this->analysis))
        {
            $this->analysis = array();
        }

        if (!isset($this->analysis[$id]))
        {
            // Request the selected id
            $jinput = JFactory::getApplication()->input;
            $id     = $jinput->get('id', 0, 'INT');

            // Get a TableHelloWorld instance
            $table = $this->getTable();

            //var_dump($table);die;

            // Load the message
            $table->load($id);

            //var_dump($table);die;

            // Assign the message
            //$this->messages[$id] = $table->greeting;
        }

        //return $this->messages[$id];
        return $table;

    }



    public function getForm($data = array(), $loadData = true)
    {
        // TODO: Implement getForm() method.
        // Get the form.
        $form = $this->loadForm(
            'com_mkarta.analysis_form',
            'analysis-form_filename',
            array(
                'control' => 'jform',
                'load_data' => $loadData
            )
        );

        if (empty($form))
        {
            $errors = $this->getErrors();
            throw new Exception(implode("\n", $errors), 500);
        }

        return $form;
    }

}