<?php namespace Application\Controllers;

use System\Core\Controller;
use Application\Models\Authors as Model_Authors;
use Application\Models\Books as Model_Books;
use Application\Models\Chapters as Model_Chapters;

/**
 * Class Main
 * @package Application\Controllers
 */
class Internal extends External
{

    /**
     * Main constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

}
