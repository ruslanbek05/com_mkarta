<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class MkartaModelAnalyses extends JModelItem
{
    protected $message;

    public function getMsg()
    {
        if (!isset($this->message))
        {
            $this->message = 'Hello World analyses!';
        }

        return $this->message;
    }
}