<?php

namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package) {
        return 'plugins' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $package->getName());
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'phile-plugin' === $packageType;
    }
}
