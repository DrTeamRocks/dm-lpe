<?php namespace DrMVC\Core;

/**
 * If we open page http://example.com/error or wrong path.
 * Please, do not change this route name.
 */
Route::set('error', 'error')
    ->defaults(array(
        'controller' => 'Error',
        'action' => 'index',
    ));

/**
 * If sitemap generator enabled
 */
if (SITEMAP_ENABLED === true) {
    /**
     * Generate sitemap from available actions
     * Default url is http://example.com/sitemap.xml
     */
    Route::set('sitemap', 'sitemap.xml')
        ->defaults(array(
            'controller' => 'Sitemap',
            'action' => 'index',
        ));
}

/**
 * Default route:
 * <controller> - application controller name
 * <action>     - "action_*" from controller
 * <id>         - dynamical variable, you can get this via $this->request->param()
 */
Route::set('default', '(<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'controller' => 'Index',
        'action' => 'index',
    ));
