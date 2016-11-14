<?php namespace Application\Controllers;

/**
 * Class Error
 * @package Application\Controllers
 */
class Error extends External
{
    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();
        echo '404';
    }

}
