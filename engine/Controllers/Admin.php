<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Helpers;

/**
 * Class Admin
 * @package Application\Controllers
 */
class Admin extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Default admin page dashboard
     */
    public function action_index()
    {
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        View::render('admin/header', $data);
        View::render('admin/dashboard', $data);
        View::render('admin/footer', $data);
    }

    /**
     * Template page editor
     */
    public function action_template()
    {
        if (!empty($_POST['submit'])) {
            $title = Helpers::cleaner($_POST['title']);
            $styles = Helpers::cleaner($_POST['styles']);
            $scripts = Helpers::cleaner($_POST['scripts']);
            $description = Helpers::cleaner($_POST['description']);
            $keywords = Helpers::cleaner($_POST['keywords']);

            $update[] = array('key' => 'title', 'value' => $title);
            $update[] = array('key' => 'styles', 'value' => $styles);
            $update[] = array('key' => 'scripts', 'value' => $scripts);
            $update[] = array('key' => 'description', 'value' => $description);
            $update[] = array('key' => 'keywords', 'value' => $keywords);

            foreach ($update as $item) {
                $data = array('value' => $item['value']);
                $where = array('key' => $item['key']);
                $this->_settings->update($data, $where);
            }
            die();
        }

        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'template.js';

        // Receive all settings from database
        $data['settings'] = $this->_settings->getAll();

        View::render('admin/header', $data);
        View::render('admin/template', $data);
        View::render('admin/footer', $data);
    }

}
