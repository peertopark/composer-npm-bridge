<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Eloquent\Composer\NpmBridge\Core;

use Composer\Package\PackageInterface;

/**
 * The interface implemented by bridges
 * @author blackleg
 */
interface BridgeInterface 
{

    /**
     * Returns true if the supplied package requires the Composer bridge.
     *
     * @param PackageInterface $package                The package to inspect.
     * @param boolean|null     $includeDevDependencies True if the dev dependencies should also be inspected.
     *
     * @return boolean True if the package requires the bridge.
     */
    public function isDependantPackage(PackageInterface $package, $includeDevDependencies = null);
}
