<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php if (!empty($this->item)) :
    $item = $this->item; ?>

    <div>
        <h2>
            <a href=<?php echo JRoute::_('index.php?option=com_mkarta&view=analysis&id=' . $item->id); ?>><?php echo $item->id; ?></a>
        </h2>
        <span>
                <?php echo $item->created_by; ?>
            </span>

        <p><?php echo $item->explanation; ?></p>
        <p><?php echo $item->type_of_analysis; ?></p>

        <?php if (!empty($item->images)) : ?>
            <div>
                <img style="width: 100%" src="<?php echo $item->images->image1; ?>"/>
            </div>
        <?php endif; ?>

        <p><?php echo $item->date; ?></p>
        <p><?php echo $item->adder_id; ?></p>

    </div>

<?php endif; ?>