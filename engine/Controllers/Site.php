<?php namespace Application\Controllers;

use System\Core\Error;
use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

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
        $id_site = Helpers::cleaner($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Helpers::cleaner($_POST['mode']);
            switch ($mode) {
                case 'system':
                    sleep(1);
                    $title = Helpers::cleaner($_POST['title']);
                    $styles = Helpers::cleaner($_POST['styles']);
                    $scripts = Helpers::cleaner($_POST['scripts']);
                    $description = Helpers::cleaner($_POST['description']);
                    $keywords = Helpers::cleaner($_POST['keywords']);
                    $author = Helpers::cleaner($_POST['author']);
                    $url = Helpers::cleaner($_POST['url']);
                    $alias = Helpers::cleaner($_POST['alias']);

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

        View::render('header', $data);
        View::render('site/settings', $data);
        View::render('footer', $data);
    }

    public function action_variables()
    {
        if ($this->userinfo->is_user != 1) Url::redirect('dashboard');

        // Site ID
        $id_site = Helpers::cleaner($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Helpers::cleaner($_POST['mode']);
            switch ($mode) {
                case 'update':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $json = Helpers::cleaner($_POST['json'], 'json');
                    // What need update
                    $data = array('variables' => $json);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $order = Helpers::cleaner($_POST['order'], 'num');
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

        View::render('header', $data);
        View::render('site/edit_variables', $data);
        View::render('footer', $data);
    }

    public function action_html()
    {
        if ($this->userinfo->is_editor != 1) Url::redirect('dashboard');

        // Site ID
        $id_site = Helpers::cleaner($this->request->param('id'), 'num');
        if (empty($id_site)) $this->_404();

        // Simple check
        $site_test = $this->_sites->getSite('id', $id_site);
        if (empty($site_test)) $this->_404();

        if (isset($_POST['submit'])) {
            $mode = Helpers::cleaner($_POST['mode']);
            switch ($mode) {
                case 'type':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $section_type = Helpers::cleaner($_POST['section_type'], 'text');

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
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'delete':
                    sleep(1);
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    // What need update
                    $data = array('deleted' => true);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
                    echo $this->_sections->update($data, $where);
                    break;
                case 'order':
                    $id = Helpers::cleaner($_POST['id'], 'num');
                    $order = Helpers::cleaner($_POST['order'], 'num');
                    // What need update
                    $data = array('ordering' => $order);
                    // Selector
                    $where = array('id_site' => $id_site, 'id' => $id);
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
                        'id_site' => $id_site,
                        'title' => $title,
                        'add_time' => date('Y-m-d H:i:s'),
                        'section_id' => $section_id,
                        'section_class' => $section_class,
                        'content' => $content,
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

        View::render('header', $data);
        View::render('site/edit_html', $data);
        View::render('footer', $data);
    }

}
