# Find out which modules keep you from upgrading SilverStripe [![Build Status](https://api.travis-ci.org/FriendsOfSilverStripe/upgrade-path.svg?branch=master)](https://travis-ci.org/FriendsOfSilverStripe/upgrade-path) [![Latest Stable Version](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/version.svg)](https://github.com/FriendsOfSilverStripe/upgrade-path/releases) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FriendsOfSilverStripe/upgrade-path/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/FriendsOfSilverStripe/upgrade-path/?branch=master) [![Total Downloads](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/downloads.svg)](https://packagist.org/packages/FriendsOfSilverStripe/upgrade-path) [![License](https://poser.pugx.org/FriendsOfSilverStripe/upgrade-path/license.svg)](https://github.com/FriendsOfSilverStripe/upgrade-path/blob/master/license.md)

[![SilverStripe upgrade path](https://cdn.rawgit.com/FriendsOfSilverStripe/upgrade-path/master/docs/example.png)](https://github.com/FriendsOfSilverStripe/upgrade-path "A screenshot says more than words.")

### installation

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

### usage

```bash
sake dev/tasks/UpgradePath
```

### misc: [future ideas/development, issues](https://github.com/FriendsOfSilverStripe/upgrade-path/issues), [contributing](https://github.com/FriendsOfSilverStripe/upgrade-path/blob/master/CONTRIBUTING.md), [license](https://github.com/FriendsOfSilverStripe/upgrade-path/blob/master/license.md)

made with :coffee:
