<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<form action="<?php echo JRoute::_('index.php?option=com_mkarta&layout=edit_analysis&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MKARTA_ANALYSIS_FORM_DETAILS'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    foreach($this->form->getFieldset() as $field) {
                        echo $field->renderField();
                    }
                    ?>
                </div>
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="analysis_form.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>