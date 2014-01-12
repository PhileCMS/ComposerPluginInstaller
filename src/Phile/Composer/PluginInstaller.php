<?php

namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package) {
        $prefix = substr($package->getPrettyName(), 0, 13);
        if ('phile/plugin-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install plugin, phile plugin '
                .'should always start their package name with '
                .'"phile/plugin-"'
            );
        }

        return 'plugins/'.substr($package->getPrettyName(), 13);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'phile-plugin' === $packageType;
    }
}
