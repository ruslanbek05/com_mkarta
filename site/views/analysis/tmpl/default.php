<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php if (!empty($this->item)) :
    $item = $this->item;

//var_dump($item);
?>

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


        <h1><?php echo (($this->item->category and $this->item->params->get('show_category'))
                    ? (' ('.$this->item->category.')') : ''); ?>
        </h1>

        <?php
        $src = $this->item->imageDetails['image'];
        if ($src) {
            $html = '<figure>
            <img src="%s" alt="%s" >
            <figcaption>%s</figcaption>
        </figure>';
            $alt = $this->item->imageDetails['alt'];
            $caption = $this->item->imageDetails['caption'];
            echo sprintf($html, $src, $alt, $caption);
        }
        ?>

    </div>

<?php endif; ?>