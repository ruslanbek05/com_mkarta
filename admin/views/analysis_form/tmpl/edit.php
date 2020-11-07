<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

// The following is to enable setting the permission's Calculated Setting
// when you change the permission's Setting.
// The core javascript code for initiating the Ajax request looks for a field
// with id="jform_title" and sets its value as the 'title' parameter to send in the Ajax request
JFactory::getDocument()->addScriptDeclaration('
	jQuery(document).ready(function() {
        greeting = jQuery("#jform_greeting").val();
		jQuery("#jform_title").val(greeting);
	});
');


?>
<form action="<?php echo JRoute::_('index.php?option=com_mkarta&layout=edit&id=' . (int)$this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">

    <input id="jform_title" type="hidden" name="helloworld-message-title"/>

    <div class="form-horizontal">


        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>
        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details',
            empty($this->item->id) ? JText::_('COM_MKARTA_TAB_NEW_MESSAGE') : JText::_('COM_MKARTA_TAB_EDIT_MESSAGE')); ?>
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MKARTA_LEGEND_DETAILS') ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $this->form->renderFieldset('analysis_fieldset_name');  ?>
                </div>
            </div>
        </fieldset>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'params', JText::_('COM_MKARTA_TAB_PARAMS')); ?>
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MKARTA_LEGEND_PARAMS') ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $this->form->renderFieldset('params');  ?>
                </div>
            </div>
        </fieldset>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'permissions', JText::_('COM_MKARTA_TAB_PERMISSIONS')); ?>
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MKARTA_LEGEND_PERMISSIONS') ?></legend>
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $this->form->renderFieldset('accesscontrol');  ?>
                </div>
            </div>
        </fieldset>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        <?php echo JHtml::_('bootstrap.endTabSet'); ?>


    </div>
    <input type="hidden" name="task" value="analysis_form.edit"/>
    <?php echo JHtml::_('form.token'); ?>
</form>