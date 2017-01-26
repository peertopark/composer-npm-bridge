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

use Composer\IO\IOInterface;
use Eloquent\Composer\NpmBridge\Core\VendorFinder;

/**
 * Creates NPM bridges.
 */
class NpmBridgeFactory
{
    /**
     * Create a new NPM bridge factory.
     *
     * @return self The newly created factory.
     */
    public static function create()
    {
        return new self(
            VendorFinder::create(),
            NpmClient::create()
        );
    }

    /**
     * Construct a new NPM bridge factory.
     *
     * @access private
     *
     * @param VendorFinder $vendorFinder The vendor finder to use.
     * @param NpmClient       $client       The client to use.
     */
    public function __construct(
        VendorFinder $vendorFinder,
        NpmClient $client
    ) {
        $this->vendorFinder = $vendorFinder;
        $this->client = $client;
    }

    /**
     * Construct a new Composer NPM bridge plugin.
     *
     * @param IOInterface $io The i/o interface to use.
     */
    public function createBridge(IOInterface $io)
    {
        return new NpmBridge($io, $this->vendorFinder, $this->client);
    }

    private $vendorFinder;
    private $client;
}
