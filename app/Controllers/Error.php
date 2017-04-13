<?php namespace DrMVC\App\Controllers;

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
    }

    public function action_index()
    {
        $this->view->data['title'] = $this->language->get('error') . ' &#8212; ' . SITETITLE;
        $this->view->data['styles'][] = 'indent.css';
        $this->view->data['styles'][] = '404.css';

        $this->view->render('templates/header');
        $this->view->render('error');
        $this->view->render('templates/footer');
    }

}
