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
                'published',
                'author',
                'created'
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
        $query->select('a.id as id, a.created_by as created_by, a.explanation as explanation, a.type_of_analysis as type_of_analysis, a.image as image, a.date as date, a.adder_id as adder_id, a.published as published, a.catid as catid, a.created as created, a.image as imageInfo')
            ->from($db->quoteName('#__analyses','a'));

		// Join over the categories.
		$query->select($db->quoteName('c.title', 'category_title'))
			->join('LEFT', $db->quoteName('#__categories', 'c') . ' ON c.id = a.catid');

        // Join with users table to get the username of the author
        $query->select($db->quoteName('u.username', 'author'))
            ->join('LEFT', $db->quoteName('#__users', 'u') . ' ON u.id = a.created_by');
			
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
			$query->where('a.published = ' . (int) $published);
        }
        elseif ($published === '')
        {
            $query->where('(a.published IN (0, 1))');
        }



        // Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering', 'id');
        $orderDirn 	= $this->state->get('list.direction', 'desc');

        //var_dump($this->state);
        //var_dump($orderCol);

        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));


        return $query;
    }
}