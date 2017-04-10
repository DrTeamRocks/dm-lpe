<?php namespace DrMVC\App\Controllers;

use DrMVC\Helpers\Cleaner;
use DrMVC\Core\Url;

/**
 * Class Site
 * @package Application\Controllers
 */
class Site extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Settings of site
     */
    public function action_settings()
    {
        if ($this->userinfo->is_editor != 1) Url::redirect('dashboard');

        // Site ID
        $id_site = Cleaner::run($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);
            switch ($mode) {
                case 'system':
                    sleep(1);
                    $title = Cleaner::run($_POST['title']);
                    $styles = Cleaner::run($_POST['styles']);
                    $scripts = Cleaner::run($_POST['scripts']);
                    $description = Cleaner::run($_POST['description']);
                    $keywords = Cleaner::run($_POST['keywords']);
                    $author = Cleaner::run($_POST['author']);
                    $url = Cleaner::run($_POST['url']);
                    $alias = Cleaner::run($_POST['alias']);

                    $update[] = array('key' => 'title', 'value' => $title);
                    $update[] = array('key' => 'styles', 'value' => $styles);
                    $update[] = array('key' => 'scripts', 'value' => $scripts);
                    $update[] = array('key' => 'description', 'value' => $description);
                    $update[] = array('key' => 'keywords', 'value' => $keywords);
                    $update[] = array('key' => 'author', 'value' => $author);

                    // Site settings loop
                    foreach ($update as $item) {
                        $data = array('value' => $item['value']);
                        $where = array('id_site' => $id_site, 'key' => $item['key']);
                        echo $this->_settings->update($data, $where);
                    }

                    // Site url and alias parameters
                    $data = array('url' => $url, 'alias' => $alias);
                    $where = array('id' => $id_site);
                    echo $this->_sites->update($data, $where);

                    break;
            }
            die();
        }

        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'site_settings.js';
        $data['scripts'][] = 'navigation.js';
        $data['lng'] = $this->language;

        $data['site'] = $this->_sites->getSite('id', $id_site);
        $data['settings'] = $this->_settings->getSettings($id_site);

        $this->view->render('header', $data);
        $this->view->render('site/settings', $data);
        $this->view->render('footer', $data);
    }

    public function action_variables()
    {
        if ($this->userinfo->is_user != 1) Url::redirect('dashboard');

        // Site ID
        $id_site = Cleaner::run($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);
            switch ($mode) {
                case 'update':
                    sleep(1);
                    $id = Cleaner::run($_POST['id'], 'num');
                    $json = Cleaner::run($_POST['json'], 'json');
                    // What need update
                    $data = array('variables' => $json);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Cleaner::run($_POST['id'], 'num');
                    $order = Cleaner::run($_POST['order'], 'num');
                    // What need update
                    $data = array('ordering' => $order);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
            }
        }

        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'site_variables.js';
        $data['scripts'][] = 'navigation.js';
        $data['lng'] = $this->language;

        $data['site'] = $this->_sites->getSite('id', $id_site);
        $data['sections'] = $this->_sections->getSections($id_site);

        $this->view->render('header', $data);
        $this->view->render('site/edit_variables', $data);
        $this->view->render('footer', $data);
    }

    public function action_html()
    {
        if ($this->userinfo->is_editor != 1) Url::redirect('dashboard');

        // Site ID
        $id_site = Cleaner::run($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);
            switch ($mode) {
                case 'type':
                    sleep(1);
                    $id = Cleaner::run($_POST['id'], 'num');
                    $section_type = Cleaner::run($_POST['section_type'], 'text');

                    switch ($section_type) {
                        case 'section':
                        case 'nav':
                        case 'header':
                        case 'footer':
                        case 'div':
                            // What need update
                            $data = array(
                                'section_type' => $section_type,
                            );
                            // Selector
                            $where = array('id_site' => $id_site, 'id' => $id);
                            echo $this->_sections->update($data, $where);
                            break;
                        default:
                            echo 'err';
                    }
                    break;
                case 'update':
                    sleep(1);
                    $id = Cleaner::run($_POST['id'], 'num');
                    $section_id = Cleaner::run($_POST['section_id']);
                    $section_class = Cleaner::run($_POST['section_class']);
                    $title = Cleaner::run($_POST['title']);
                    $content = Cleaner::run($_POST['content']);
                    // What need update
                    $data = array(
                        'title' => $title,
                        'section_id' => $section_id,
                        'section_class' => $section_class,
                        'content' => $content,
                    );
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'delete':
                    sleep(1);
                    $id = Cleaner::run($_POST['id'], 'num');
                    // What need update
                    $data = array('deleted' => true);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Cleaner::run($_POST['id'], 'num');
                    $order = Cleaner::run($_POST['order'], 'num');
                    // What need update
                    $data = array('ordering' => $order);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'new':
                    sleep(1);
                    $section_id = Cleaner::run($_POST['section_id']);
                    $section_class = Cleaner::run($_POST['section_class']);
                    $title = Cleaner::run($_POST['title']);
                    $content = Cleaner::run($_POST['content']);
                    // What need update
                    $data = array(
                        'id_site' => $id_site,
                        'title' => $title,
                        'add_time' => date('Y-m-d H:i:s'),
                        'section_id' => $section_id,
                        'section_class' => $section_class,
                        'content' => $content,
                        'ordering' => 0
                    );
                    $this->_sections->insert($data);
                    Url::redirect('site/html/' . $id_site);
                    break;
            }
            die();
        }

        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['scripts'][] = 'site_html.js';
        $data['scripts'][] = 'navigation.js';
        $data['lng'] = $this->language;

        $data['site'] = $this->_sites->getSite('id', $id_site);
        $data['sections'] = $this->_sections->getSections($id_site);
        $data['add_section'] = true;

        $this->view->render('header', $data);
        $this->view->render('site/edit_html', $data);
        $this->view->render('footer', $data);
    }

}
