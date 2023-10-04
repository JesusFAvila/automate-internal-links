<?php
/**
 * Plugin Name: Automate Internal Links
 * Plugin URI: https://github.com/JesusFAvila/
 * Description: Un plugin para automatizar la creación de enlaces internos en el contenido de WordPress basado en palabras clave.
 * Version: 3.0.0
 * Author: Jesús Fernández Ávila
 * Author URI: https://github.com/JesusFAvila/
 * License: GPL2
 */

// Evita que se acceda directamente al archivo.
defined('ABSPATH') or die('Acceso no permitido.');

// Incluye las funciones y hooks.
include_once(plugin_dir_path(__FILE__) . 'includes/functions.php');

// Si estamos en el área de administración, incluye la página de ajustes.
if (is_admin()) {
    include_once(plugin_dir_path(__FILE__) . 'admin/settings-page.php');
}
