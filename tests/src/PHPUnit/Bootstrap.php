<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.ontic.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to license@ontic.com.au immediately.
 * Copyright (c) 2010-2017 Ontic. (http://www.ontic.com.au). All rights reserved.
 */

namespace Ontic\Skeleton\Test\PHPUnit;

use RuntimeException;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

class Bootstrap
{
	/**
	 * Bootstrap the tests.
	 * 
	 * @return void
	 */
	public static function init()
	{
        // Application root directory path.
        $applicationPath = __DIR__.'/../../../../../';
		// Module root directory path.
		$modulePath = __DIR__.'/../../../';
		// Module tests directory path.
		$testPath = __DIR__.'/../../';

        // Include the system configuration file.
        $configuration = include $testPath.'config/application.config.php';
		
		// If a module autoload file exists.
		if (is_file($autoloadFile = $modulePath.'vendor/autoload.php'))
		{
			// Include the module autoloader.
			include $autoloadFile;
		}
		// If a application autoload file exists.
		else if (is_file($autoloadFile = $applicationPath.'vendor/autoload.php'))
		{
			// Include the application autoloader.
			include $autoloadFile;
		}
		else
		{
			// We cannot continue without a composer autoload file.
			throw new RuntimeException('Unable to locate a composer autoload file.');
		}
		
		// If we are unable to locate the Zend MVC Application class.
		if (!class_exists('Zend\Mvc\Application'))
		{
			// We cannot continue without the dependencies being loaded.
			throw new RuntimeException('Unable to load the Zend framework. Install dependencies using Composer.');
		}
		
		// Create a service manager config object.
		$serviceManagerConfig = new ServiceManagerConfig();
		// Create a server manager object and inject the configuration.
		$serviceManager = new ServiceManager($serviceManagerConfig->toArray());
		// Set the configuration used when initializing the application.
		$serviceManager->setService('ApplicationConfig', $configuration);
		// Retrieve the module manager.
		$moduleManager = $serviceManager->get('ModuleManager');
		// Load available modules.
		$moduleManager->loadModules();
		
		// If a test case class is defined.
		if (isset($configuration['module_test_case_class']))
		{
			// Retrieve the test case class.
			$moduleTestCaseClass = $configuration['module_test_case_class'];

			// If the test case class has a method named setServiceManager.
			if (method_exists($moduleTestCaseClass, 'setServiceManager'))
			{
				// Pass an instance of the service manager to the test case class.
				call_user_func_array($moduleTestCaseClass.'::setServiceManager', array($serviceManager));
			}
		}
	}
}

// Bootstrap the tests
Bootstrap::init();