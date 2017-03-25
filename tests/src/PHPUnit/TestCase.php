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

use Zend\ServiceManager\ServiceManager;

class TestCase extends \PHPUnit\Framework\TestCase
{
	/**
	 * Service manager.
	 * 
	 * @var ServiceManager
	 */
	protected static $serviceManager;
	
	/**
	 * Retrieve the service manager.
	 * 
	 * @return ServiceManager
	 */
	public static function getServiceManager()
	{
		return static::$serviceManager;
	}
	
	/**
	 * Set the service manager.
	 * 
	 * @param ServiceManager $serviceManager
	 * @return void
	 */
	public static function setServiceManager(ServiceManager $serviceManager)
	{
		static::$serviceManager = $serviceManager;
	}
}