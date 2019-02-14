<?php
/*
Plugin Name: Disable Customizer
Plugin URI: https://www.littlebizzy.com/plugins/[plugin-slug]
Description: Plugin for disabling customizer page from admin panel.
Version: 1.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
PBP Version: 1.2.0
WC requires at least: 3.3
WC tested up to: 3.5
Prefix: ABCDEF
*/

// Plugin namespace
namespace LittleBizzy\DisableCustomizer;

// Plugin constants
const FILE = __FILE__;
const PREFIX = 'lb_d_c';
const VERSION = '1.0.0';
const REPO = '[github-account/repo-slug]';

// Boot
require_once dirname(FILE).'/helpers/boot.php';
Helpers\Boot::instance(FILE);