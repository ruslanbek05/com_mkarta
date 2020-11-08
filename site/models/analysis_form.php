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

        //var_dump($data);die;

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


        //var_dump($form);die;

        if (empty($form))
        {
            $errors = $this->getErrors();
            throw new Exception(implode("\n", $errors), 500);
        }

        return $form;

    }


    /**
     * Method to get the data that should be injected in the form.
     * As this form is for add, we're not prefilling the form with an existing record
     * But if the user has previously hit submit and the validation has found an error,
     *   then we inject what was previously entered.
     *
     * @return  mixed  The data for the form.
     *
     * @since   1.6
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_mkarta.edit.analysis.data',
            array()
        );

        return $data;
    }


    /**
     * Method to get the script that have to be included on the form
     * This returns the script associated with helloworld field greeting validation
     *
     * @return string	Script files
     */
    public function getScript()
    {
        return 'administrator/components/com_mkarta/models/forms/analysis_form.js';
    }

}