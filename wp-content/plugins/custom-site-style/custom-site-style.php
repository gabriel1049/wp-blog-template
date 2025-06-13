<?php
/**
 * Plugin Name: Editor de arquivos GOAT
 * Description: Personalize imagens e cores do seu site diretamente pelo painel do WordPress.
 * Version: 1.0
 * Author: Gabriel GOAT & Iago Pierre
 * Requires at least: 6.0
 * License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit; // Evita acesso direto
}

define('CSS_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Inclui arquivos necessários
require_once CSS_PLUGIN_PATH . 'admin-page.php';
require_once CSS_PLUGIN_PATH . 'style-injector.php';
