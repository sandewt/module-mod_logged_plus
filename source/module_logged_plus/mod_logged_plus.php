<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_logged_plus
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependencies.
JLoader::register('ModLoggedPlusHelper', __DIR__ . '/helper.php');

$users = ModLoggedPlusHelper::getList($params);

if ($params->get('automatic_title', 0))
{
	$module->title = ModLoggedPlusHelper::getTitle($params);
}

require JModuleHelper::getLayoutPath('mod_logged_plus', $params->get('layout', 'default'));
