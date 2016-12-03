<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

/**
 * Class Editor
 * @package Application\Controllers
 */
class Editor extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->userinfo->is_editor != 1) Url::redirect('user');

        if (isset($_POST['submit'])) {
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
                    $where = array('id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'delete':
                    sleep(1);
                    print_r($_POST);
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
                    $this->_sections->insert($data);
                    // TODO: Stupid hack, need to fit this
                    Url::redirect('editor');
                    break;
                case 'system':
                    sleep(1);
                    $title = Helpers::cleaner($_POST['title']);
                    $styles = Helpers::cleaner($_POST['styles']);
                    $scripts = Helpers::cleaner($_POST['scripts']);
                    $description = Helpers::cleaner($_POST['description']);
                    $keywords = Helpers::cleaner($_POST['keywords']);
                    $author = Helpers::cleaner($_POST['author']);
                    $top = Helpers::cleaner($_POST['top']);
                    $bottom = Helpers::cleaner($_POST['bottom']);

                    $update[] = array('key' => 'top', 'value' => $top);
                    $update[] = array('key' => 'bottom', 'value' => $bottom);
                    $update[] = array('key' => 'title', 'value' => $title);
                    $update[] = array('key' => 'styles', 'value' => $styles);
                    $update[] = array('key' => 'scripts', 'value' => $scripts);
                    $update[] = array('key' => 'description', 'value' => $description);
                    $update[] = array('key' => 'keywords', 'value' => $keywords);
                    $update[] = array('key' => 'author', 'value' => $author);

                    foreach ($update as $item) {
                        $data = array('value' => $item['value']);
                        $where = array('key' => $item['key']);
                        echo $this->_settings->update($data, $where);
                    }
                    break;
            }

            if ($mode != 'new') die();

        }
    }

    /**
     * Default admin page dashboard
     */
    public function action_index()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'editor.js';
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['sections'] = $this->_sections->getAll();

        View::render('header', $data);
        View::render('editor/dashboard', $data);
        View::render('footer', $data);
    }

    /**
     * Settings of site
     */
    public function action_system()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'system.js';
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['settings'] = $this->_settings->getAll();

        View::render('header', $data);
        View::render('editor/system', $data);
        View::render('footer', $data);
    }

}