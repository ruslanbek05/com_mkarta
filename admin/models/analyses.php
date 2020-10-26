<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaModelAnalyses extends JModelList
{

    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     *
     * @see     JController
     * @since   1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id',
                'type_of_analysis',
                'published'
            );
        }

        parent::__construct($config);
    }


    protected function getListQuery()
    {
        // Initialize variables.
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query->select('*')
            ->from($db->quoteName('#__analyses'));

        // Filter: like / search
        $search = $this->getState('filter.search');

        //var_dump($search);

        if (!empty($search))
        {
            $like = $db->quote('%' . $search . '%');
            $query->where('type_of_analysis LIKE ' . $like);
        }

        // Filter by published state
        $published = $this->getState('filter.published');

        if (is_numeric($published))
        {
            $query->where('published = ' . (int) $published);
        }
        elseif ($published === '')
        {
            $query->where('(published IN (0, 1))');
        }

        // Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering', 'id');
        $orderDirn 	= $this->state->get('list.direction', 'desc');

        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));


        return $query;
    }
}