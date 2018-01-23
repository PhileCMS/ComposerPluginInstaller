<?php

namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package) {
			$fullPath = ['plugins'];
			$pathParts = explode('/', $package->getName());
			foreach ($pathParts as $path) {
				$path = str_replace('-', ' ', $path);
				$path = ucwords(trim($path));
				$path = lcfirst(str_replace(' ', '', $path));
				$fullPath[] = $path;
			}
			return implode(DIRECTORY_SEPARATOR, $fullPath);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'phile-plugin' === $packageType;
    }
}