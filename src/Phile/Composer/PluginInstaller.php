<?php

namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package) {
        $prefix = substr($package->getPrettyName(), 0, 17);
        if ('phile-cms/plugin-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install plugin, phile plugin '
                .'should always start their package name with '
                .'"phile-cms/plugin-"'
            );
        }

        return 'plugins/'.substr($package->getPrettyName(), 17);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'phile-plugin' === $packageType;
    }
}
