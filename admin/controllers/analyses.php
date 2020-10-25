<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaControllerAnalyses extends JControllerAdmin
{
    public function getModel($name = 'Analysis_form', $prefix = 'MkartaModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }
}