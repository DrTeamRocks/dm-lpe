<?php namespace DrMVC\App\Controllers;

use DrMVC\Core\Url;

/**
 * Class Dashboard
 * @package Application\Controllers
 */
class Dashboard extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function action_index() {
        $sites = $this->_sites->getAll();

        foreach ($sites as $site) {
            switch ($site->fav) {
                case 1:
                    Url::redirect('site/variables/' . $site->id);
                    break;
            }
        }

        Url::redirect('site');
    }

}
