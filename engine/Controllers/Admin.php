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
        if (!empty($_POST['submit'])) {
            $mode = Helpers::cleaner($_POST['mode']);
            switch ($mode) {
                case 'update':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $section_id = Helpers::cleaner($_POST['section_id']);
                    $section_class = Helpers::cleaner($_POST['section_class']);
                    $title = Helpers::cleaner($_POST['title']);
                    $content = Helpers::cleaner($_POST['content']);
                    // What need update
                    $data = array(
                        'title' => $title,
                        'section_id' => $section_id,
                        'section_class' => $section_class,
                        'content' => $content,
                    );
                    // Selector
                    $where = array(
                        'id' => $id
                    );
                    echo $this->_sections->update($data, $where);
                    break;
                case 'delete':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    // What need update
                    $data = array('deleted' => true);
                    // Selector
                    $where = array('id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $order = Helpers::cleaner($_POST['order'], 'num');
                    // What need update
                    $data = array('ordering' => $order);
                    // Selector
                    $where = array('id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'new':
                    sleep(1);
                    // Array should be not empty
                    $data = array('content' => null);
                    echo $this->_sections->insert($data);
                    break;
            }

            die();
        }

        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;

        // Receive all settings from database
        $data['sections'] = $this->_sections->getAll();

        View::render('admin/header', $data);
        View::render('admin/dashboard', $data);
        View::render('admin/footer', $data);
    }

    /**
     * Some template optimization
     */
    public function action_template()
    {
        if (!empty($_POST['submit'])) {
            $top = Helpers::cleaner($_POST['top']);
            $bottom = Helpers::cleaner($_POST['bottom']);

            $update[] = array('key' => 'top', 'value' => $top);
            $update[] = array('key' => 'bottom', 'value' => $bottom);

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

    /**
     * Settings of site
     */
    public function action_settings()
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
        $data['scripts'][] = 'settings.js';

        // Receive all settings from database
        $data['settings'] = $this->_settings->getAll();

        View::render('admin/header', $data);
        View::render('admin/settings', $data);
        View::render('admin/footer', $data);
    }

}
