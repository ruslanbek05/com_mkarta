<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaModelAnalysis_form extends JModelAdmin {
/*
    public function getTable($type = 'Analysis_form', $prefix = 'MkartaTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }
*/
/*
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_mkarta.edit.analysis.data',
            array()
        );

        return $data;
    }
*/

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