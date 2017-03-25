<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.ontic.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to license@ontic.com.au immediately.
 * Copyright (c) 2010-2017 Ontic. (http://www.ontic.com.au). All rights reserved.
 */

return [
	// This should be an array of module namespaces used in the application.
	'modules' => require __DIR__.'/modules.config.php',
	// A service manager will be set to this class if available.
	'module_test_case_class' => 'Ontic\Skeleton\TestCase',
	// These are various options for the listeners attached to the ModuleManager.
	'module_listener_options' => [
		// This should be an array of paths in which modules reside. If a string
		// key is provided, the listener will consider that a module namespace,
		// the value of that key the specific path to that module's Module class.
		'module_paths' => [
			
		],
		// An array of paths from which to glob configuration files after
		// modules are loaded. These effectively override configuration
		// provided by modules themselves. Paths may use GLOB_BRACE notation.
		'config_glob_paths' => [
			
		]
	]
];