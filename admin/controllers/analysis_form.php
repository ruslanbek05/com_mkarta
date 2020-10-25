<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaControllerAnalysis_form extends JControllerForm
{

    protected $view_list = 'analyses';


    public function cancel($key = null)
    {
        parent::cancel($key);

        // set up the redirect back to the same form
        $this->setRedirect(
            (string)JUri::getInstance(),
            JText::_('COM_HELLOWORLD_ADD_CANCELLED')
        );
    }




}