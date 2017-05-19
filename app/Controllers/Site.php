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

        if (isset($_POST['submit'])) {
            $mode = Cleaner::run($_POST['mode']);

            switch ($mode) {
                // Create new site mode
                case 'add':
                    sleep(1);
                    $url = Cleaner::run($_POST['url']);
                    $alias = Cleaner::run($_POST['alias']);

                    // If cleaned url is not empty
                    if (!empty($url)) {
                        $data['url'] = $url;
                        // We need update array if alias is not empty
                        if (!empty($alias)) $data['alias'] = $alias;
                        echo $this->_sites->insert($data);
                    } else {
                        echo 'error';
                    }

                    // Redirect to users list
                    Url::redirect('dashboard');

                    break;
            }
        }

        $this->view->data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
    }

    /**
     * Dashboard page for all users
     */
    public function action_index()
    {
        $this->view->data['sites'] = $this->_sites->getAll();
        $this->view->data['add_site'] = true;

        $this->view->render('templates/header');
        $this->view->render('templates/header_append');
        $this->view->render('dashboard');
        $this->view->render('templates/footer_prepend');
        $this->view->render('templates/footer');
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

                // Add site to favorites
                case 'fav':
                    sleep(1);
                    $id = Cleaner::run($_POST['id']);
                    $fav = Cleaner::run($_POST['fav']);

                    // If id is not empty
                    if (!empty($id)) {
                        $data = array('favorite' => $fav);
                        $where = array('id' => $id);
                        echo $this->_sites->update($data, $where);
                    }
                    break;
            }
            die();
        }

        $this->view->data['scripts'][] = 'site_settings.js';
        $this->view->data['scripts'][] = 'navigation.js';
        $this->view->data['site'] = $this->_sites->getSite('id', $id_site);
        $this->view->data['settings'] = $this->_settings->getSettings($id_site);

        $this->view->render('templates/header');
        $this->view->render('templates/header_append');
        $this->view->render('site/settings');
        $this->view->render('templates/footer_prepend');
        $this->view->render('templates/footer');
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

        $this->view->data['scripts'][] = 'site_variables.js';
        $this->view->data['scripts'][] = 'navigation.js';
        $this->view->data['site'] = $this->_sites->getSite('id', $id_site);
        $this->view->data['sections'] = $this->_sections->getSections($id_site);

        $this->view->render('templates/header');
        $this->view->render('templates/header_append');
        $this->view->render('site/edit_variables');
        $this->view->render('templates/footer_prepend');
        $this->view->render('templates/footer');
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

        $this->view->data['scripts'][] = 'site_html.js';
        $this->view->data['scripts'][] = 'navigation.js';
        $this->view->data['site'] = $this->_sites->getSite('id', $id_site);
        $this->view->data['sections'] = $this->_sections->getSections($id_site);
        $this->view->data['add_section'] = true;

        $this->view->render('templates/header');
        $this->view->render('templates/header_append');
        $this->view->render('site/edit_html');
        $this->view->render('templates/footer_prepend');
        $this->view->render('templates/footer');
    }

}
