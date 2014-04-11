<?php

namespace PHPExtra\Version;

/**
 * The VersionTest class
 *
 * @author Jacek Kobus <kobus.jacek@gmail.com>
 */
class VersionTest extends \PHPUnit_Framework_TestCase
{
    public function getEqual()
    {
        return array(
            array('0.0.0', '0.0.0'),
            array('0.0.1', '0.0.1'),
            array('0.1.0', '0.1.0'),
            array('1.0.0', '1.0.0'),
            array('1.1.1', '1.1.1'),

            array('0.0.0-0', '0.0.0-0'),
            array('0.0.0+0', '0.0.0+1'),
        );
    }

    public function getLater()
    {
        return array(
            array('0.0.2', '0.0.1'),
            array('0.2.0', '0.1.0'),
            array('2.0.0', '1.0.0'),

            array('0.0.0', '0.0.0-0'),
            array('0.0.0-2', '0.0.0-1'),
            array('0.0.0-a', '0.0.0-3'),
            array('0.0.0-b', '0.0.0-a'),

            array('0.0.0-a.b.c', '0.0.0-a.1'),
            array('0.0.0-1.2.b', '0.0.0-1.2'),

            array('0.0.0-rc', '0.0.0-beta'),
            array('0.0.0-beta', '0.0.0-alpha'),

            array('1.0.0', '1.0.0-rc.1'),
            array('1.0.0-rc.1', '1.0.0-beta.11'),
            array('1.0.0-rc2', '1.0.0-rc1'),
            array('1.0.0-beta.11', '1.0.0-beta.2'),
            array('1.0.0-beta.2', '1.0.0-beta'),
            array('1.0.0-beta', '1.0.0-alpha.beta'),
            array('1.0.0-alpha.beta', '1.0.0-alpha.1'),
            array('1.0.0-alpha.1', '1.0.0-alpha'),
        );
    }

    public function getEarlier()
    {
        return array(
            array('0.0.1', '0.0.2'),
            array('0.1.0', '0.2.0'),
            array('1.0.0', '2.0.0'),

            array('0.0.0-0', '0.0.0'),
            array('0.0.0-1', '0.0.0-2'),
            array('0.0.0-3', '0.0.0-a'),
            array('0.0.0-a', '0.0.0-b'),

            array('0.0.0-a.1', '0.0.0-a.b.c'),
            array('0.0.0-1.2', '0.0.0-1.2.b'),

            array('0.0.0-alpha', '0.0.0-beta'),
            array('0.0.0-beta', '0.0.0-rc'),

            array('1.0.0-alpha', '1.0.0-alpha.1'),
            array('1.0.0-alpha.1', '1.0.0-alpha.beta'),
            array('1.0.0-alpha.beta', '1.0.0-beta'),
            array('1.0.0-beta', '1.0.0-beta.2'),
            array('1.0.0-beta.2', '1.0.0-beta.11'),
            array('1.0.0-beta.11', '1.0.0-rc.1'),
            array('1.0.0-beta.11', '1.0.0-rc1'),
            array('1.0.0-rc.1', '1.0.0'),
        );
    }

    /**
     * @dataProvider getEqual
     */
    public function testComparedVersionsAreEqual($version1, $version2)
    {
        $this->assertTrue(Version::fromString($version1)->isEqualTo(Version::fromString($version2)));
    }

    /**
     * @dataProvider getLater
     */
    public function testComparedVersionIsLater($version1, $version2)
    {
        $this->assertTrue(Version::fromString($version1)->isLaterThan(Version::fromString($version2)));
    }

    /**
     * @dataProvider getEarlier
     */
    public function testComparedVersionIsEarlier($version1, $version2)
    {
        $this->assertTrue(Version::fromString($version1)->isEarlierThan(Version::fromString($version2)));
    }
}
 