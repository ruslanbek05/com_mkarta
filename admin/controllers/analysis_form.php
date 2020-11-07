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
            JText::_('COM_MKARTA_ADD_CANCELLED')
        );
    }


    /**
     * Implement to allowAdd or not
     *
     * Not used at this time (but you can look at how other components use it....)
     * Overwrites: JControllerForm::allowAdd
     *
     * @param array $data
     * @return bool
     */
    protected function allowAdd($data = array())
    {
        return parent::allowAdd($data);
    }
    /**
     * Implement to allow edit or not
     * Overwrites: JControllerForm::allowEdit
     *
     * @param array $data
     * @param string $key
     * @return bool
     */
    protected function allowEdit($data = array(), $key = 'id')
    {
        $id = isset( $data[ $key ] ) ? $data[ $key ] : 0;
        if( !empty( $id ) )
        {
            return JFactory::getUser()->authorise( "core.edit", "com_mkarta.analysis." . $id );
        }
    }

}