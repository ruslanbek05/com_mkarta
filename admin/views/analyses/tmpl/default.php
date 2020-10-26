<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<form action="index.php?option=com_mkarta&view=analyses" method="post" id="adminForm" name="adminForm">

    <div class="row-fluid">
        <div class="span6">
            <?php echo JText::_('COM_MKARTA_ANALYSES_FILTER'); ?>
            <?php
            echo JLayoutHelper::render(
                'joomla.searchtools.default',
                array('view' => $this)
            );
            ?>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="1%"><?php echo JText::_('COM_MKARTA_NUM'); ?></th>
            <th width="2%">
                <?php echo JHtml::_('grid.checkall'); ?>
            </th>
            <th width="10%">
                <?php echo JText::_('COM_MKARTA_ANALYSIS_CREATED_BY_FIELD_LABEL') ;?>
            </th>
            <th width="35%">
                <?php echo JText::_('COM_MKARTA_ANALYSIS_EXPLANATION_LABEL'); ?>
            </th>
            <th width="10%">
                <?php //echo JText::_('COM_MKARTA_ANALYSIS_TYPE_OF_ANALYSIS_FIELD_LABEL'); ?>
                <?php echo JHtml::_('grid.sort', 'COM_MKARTA_ANALYSIS_TYPE_OF_ANALYSIS_FIELD_LABEL', 'type_of_analysis', $listDirn, $listOrder); ?>
            </th>
            <th width="38%">
                <?php echo JText::_('COM_MKARTA_ANALYSIS_IMAGE_FIELD_LABEL'); ?>
            </th>
            <th width="5%">
                <?php echo JText::_('COM_MKARTA_ANALYSIS_DATE_FIELD_LABEL'); ?>
            </th>
            <th width="2%">
                <?php echo JText::_('COM_MKARTA_ANALYSIS_ADDER_ID_FIELD_LABEL'); ?>
            </th>
            <th width="5%">
                <?php //echo JText::_('COM_MKARTA_PUBLISHED'); ?>
                <?php echo JHtml::_('grid.sort', 'COM_MKARTA_PUBLISHED', 'published', $listDirn, $listOrder); ?>
            </th>
            <th width="2%">
                <?php //echo JText::_('COM_MKARTA_ANALYSIS_ID_FIELD_LABEL'); ?>
                <?php echo JHtml::_('grid.sort', 'COM_MKARTA_ANALYSIS_ID_FIELD_LABEL', 'id', $listDirn, $listOrder); ?>
            </th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="10">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php if (!empty($this->items)) : ?>
            <?php foreach ($this->items as $i => $row) :
                $link = JRoute::_('index.php?option=com_mkarta&task=analysis_form.edit&id=' . $row->id);
                ?>

                <tr>
                    <td>
                        <?php echo $this->pagination->getRowOffset($i); ?>
                    </td>
                    <td>
                        <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                    </td>
                    <td>
                        <?php echo $row->created_by; ?>
                    </td>
                    <td>
                        <?php echo $row->explanation; ?>
                    </td>
                    <td>
                        <?php echo $row->type_of_analysis; ?>
                    </td>
                    <td>
                        <?php echo $row->image; ?>
                    </td>
                    <td>
                        <?php echo $row->date; ?>
                    </td>
                    <td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_MKARTA_EDIT_MKARTA'); ?>">
                            <?php echo $row->adder_id; ?>
                        </a>
                    </td>
                    <td align="center">
                        <?php echo JHtml::_('jgrid.published', $row->published, $i, 'analyses.', true, 'cb'); ?>
                    </td>
                    <td align="center">
                        <?php echo $row->id; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>

    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>

    <?php echo JHtml::_('form.token'); ?>

</form>