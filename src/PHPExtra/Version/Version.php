<?php

namespace PHPExtra\Version;

use Herrera\Version\Builder;
use Herrera\Version\Comparator;

/**
 * Allows to create version classes for packages and compare them
 *
 * @author Jacek Kobus <kobus.jacek@gmail.com>
 */
class Version extends \Herrera\Version\Version
{
    /**
     * @param string $version
     *
     * @return Version
     */
    public static function fromString($version)
    {
        $builder = Builder::create()->importString($version);

        return new Version(
            $builder->getMajor(),
            $builder->getMinor(),
            $builder->getPatch(),
            $builder->getPreRelease(),
            $builder->getBuild()
        );
    }

    /**
     * Returns 0 if both are equal, -1 if current version is earlier, 1 if its later
     *
     * @param Version $version
     *
     * @return int
     */
    public function compare(Version $version)
    {
        return Comparator::compareTo($this, $version);
    }

    /**
     * @param Version $version
     *
     * @return bool
     */
    public function isEqualTo(Version $version)
    {
        return $this->compare($version) === 0;
    }

    /**
     * @param Version $version
     *
     * @return bool
     */
    public function isLaterThan(Version $version)
    {
        return $this->compare($version) == 1;
    }

    /**
     * @param Version $version
     *
     * @return bool
     */
    public function isEarlierThan(Version $version)
    {
        return $this->compare($version) == -1;
    }
} 