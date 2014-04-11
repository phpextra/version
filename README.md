#Version library
[![Build Status](https://travis-ci.org/phpextra/version.svg?branch=master)](https://travis-ci.org/phpextra/version)

This library is a wrapper for [herrera-io/php-version](https://github.com/herrera-io/php-version).

##Usage

    $version1 = Version::fromString('1.0.0');
    $version2 = Version::fromString('1.0.0-rc1');
    $version3 = Version::fromString('0.9.0-beta');

    $version1->isEarlierThan($version2);

    > true

    $version1->isLaterThan($version3);

    > true

    $version1->isEqualTo($version1);

    > true

    $version1->compare($version1);

    > 0
    $version1->compare($version2);

    > -1

    $version1->compare($version3);

    > 1

    echo (string)$version1;
    > 1.0.0

##Contributing

All code contributions must go through a pull request.
Fork the project, create a feature branch, and send me a pull request.
To ensure a consistent code base, you should make sure the code follows
the [coding standards](http://symfony.com/doc/2.0/contributing/code/standards.html).
If you would like to help take a look at the [list of issues](https://github.com/phpextra/version/issues).

##Requirements

See **composer.json** for a full list of dependencies.

##Authors

Jacek Kobus - <kobus.jacek@gmail.com>

## License information

    See the file LICENSE.txt for copying permission.





