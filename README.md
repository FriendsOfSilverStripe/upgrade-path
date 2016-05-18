[![SilverStripe upgrade path](https://cdn.rawgit.com/FriendsOfSilverStripe/upgrade-path/master/docs/example.png)](https://github.com/FriendsOfSilverStripe/upgrade-path "A screenshot says more than words.")

[![Build Status](https://api.travis-ci.org/FriendsOfSilverStripe/upgrade-path.svg?branch=master)](https://travis-ci.org/FriendsOfSilverStripe/upgrade-path)
[![Latest Stable Version](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/version.svg)](https://github.com/FriendsOfSilverStripe/upgrade-path/releases)
[![Latest Unstable Version](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/v/unstable.svg)](https://packagist.org/packages/FriendsOfSilverStripe/upgrade-path)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/FriendsOfSilverStripe/upgrade-path.svg)](https://scrutinizer-ci.com/g/FriendsOfSilverStripe/upgrade-path?branch=master)
[![Total Downloads](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/downloads.svg)](https://packagist.org/packages/FriendsOfSilverStripe/upgrade-path)
[![License](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/license.svg)](https://github.com/FriendsOfSilverStripe/upgrade-path/blob/master/license.md)

## installation

Choose, adjust and run:

```bash
// composer require plus dev/build to ensure the framework knows.
composer require friendsofsilverstripe/upgrade-path --dev;
php ./framework/cli-script.php dev/build;
clear;

// show and tell how to use it.
php ./framework/cli-script.php dev/tasks/UpgradePath;
echo "To re-run use: sake dev/tasks/UpgradePath"

// saving to git
git add composer.json composer.lock
git commit -m 'MINOR: adding upgrade-path :)'
```

**It is recommendated to install this only as dev dependency!**

## usage

```bash
sake dev/tasks/UpgradePath
```

## misc

made with :coffee:

[:sunny:](https://github.com/FriendsOfSilverStripe/upgrade-path/blob/master/license.md)
