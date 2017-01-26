<?php

/*
 * This file is part of the Composer NPM bridge package.
 *
 * Copyright © 2016 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eloquent\Composer\NpmBridge;

use Composer\IO\NullIO;
use PHPUnit_Framework_TestCase;
use Eloquent\Composer\NpmBridge\Core\VendorFinder;

class NpmBridgeFactoryTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->factory = NpmBridgeFactory::create();

        $this->io = new NullIO();
    }

    public function testCreateBridge()
    {
        $expected = new NpmBridge($this->io, VendorFinder::create(), NpmClient::create());

        $this->assertEquals($expected, $this->factory->createBridge($this->io));
    }
}
