<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldMkarta extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'Mkarta';

    /**
     * Method to get a list of options for a list input.
     *
     * @return  array  An array of JHtml options.
     */
    protected function getOptions()
    {
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('#__analyses.id as id,created_by, explanation,type_of_analysis,image,date,adder_id,published,catid, #__categories.title as category');
        $query->from('#__analyses');
		$query->leftJoin('#__categories on catid=#__categories.id');
		// Retrieve only published items
        $db->setQuery((string) $query);
        $messages = $db->loadObjectList();
        $options  = array();

        if ($messages)
        {
            foreach ($messages as $message)
            {
                //$options[] = JHtml::_('select.option', $message->id, $message->adder_id);
				
				$options[] = JHtml::_('select.option', $message->id, $message->adder_id .
				                      ($message->catid ? ' (' . $message->category . ')' : ''));
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}