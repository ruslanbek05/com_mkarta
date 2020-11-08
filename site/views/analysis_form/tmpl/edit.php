<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.formvalidator');

//var_dump($this->analysis->explanation);die;
?>

<form action="<?php echo JRoute::_('index.php?option=com_mkarta&task=analysis_form.save'); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate">

    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_MKARTA_ANALYSIS_FORM_DETAILS') ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $this->form->renderFieldset('analysis_fieldset_name');  ?>
                </div>
            </div>
        </fieldset>
    </div>


    <div class="btn-toolbar">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('analysis_form.save')">
                <span class="icon-ok"></span><?php echo JText::_('JSAVE') ?>
            </button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn" onclick="Joomla.submitbutton('analysis_form.cancel')">
                <span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
            </button>
        </div>
    </div>

    <input type="hidden" name="option" value="com_mkarta"/>
    <input type="hidden" name="task" value="analysis_form.save" />
    <?php echo JHtml::_('form.token'); ?>

</form>
