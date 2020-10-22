<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class MkartaModelMkarta extends JModelItem
{
    protected $message;

    public function getMsg()
    {
        if (!isset($this->message))
        {
            $this->message = 'Hello World from model!';
        }

        return $this->message;
    }
}