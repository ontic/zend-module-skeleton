<?php
/**
 * This source file is subject to the (Open Source Initiative) BSD license
 * that is bundled with this package in the LICENSE file. It is also available
 * through the world-wide-web at this URL: http://www.ontic.com.au/license.html
 * If you did not receive a copy of the license and are unable to obtain it through
 * the world-wide-web, please send an email to license@ontic.com.au immediately.
 * Copyright (c) 2010-2017 Ontic. (http://www.ontic.com.au). All rights reserved.
 */

namespace Ontic\Skeleton\Test;

use Ontic\Skeleton\Module;
use Ontic\Skeleton\Test\PHPUnit\TestCase;

class ModuleTest extends TestCase
{
	/**
	 * Module instance.
	 *
	 * @var Module
	 */
	protected $module;
	
	public function setUp()
	{
		$this->module = new Module;
	}
	
	public function testModuleImplementsInterfaces()
	{
		$this->assertInstanceOf('Zend\ModuleManager\Feature\ConfigProviderInterface', $this->module);
	}
	
	public function testGetConfig()
	{
		$this->assertInternalType('array', $this->module->getConfig());
	}
}