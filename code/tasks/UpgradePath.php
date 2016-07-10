<?php
/**
 * Does what the description says ;)
 */
class UpgradePath extends BuildTask
{
    /**
     * @var string
     */
    protected $title = "Upgrade Path checker";

    /**
     * @var string
     */
    protected $description = 'Checks if which composer dependencies hold your SilverStripe framework upgrade back.';

    /**
     * @param SS_HTTPRequest $request
     */
    public function run($request)
    {
        // safe is safe!
        if (Permission::check('ADMIN') || $this->isCLI()) {
            // get the list of all full releases
            $releases = $this->getReleases();
            $this->message('Framework versions to consider: ' . join(', ', $releases));
            $this->message("--------------------------------------------");

            // check and print the result
            foreach ($releases as $release) {
                $this->message($this->getBlockers($release));
            }

            // Done :)
            $this->message("\nDone. The information above was not saved anywhere in the DB :)");
        } else {
            $this->message('Permission issue.');
        }
    }

    /**
     * for now just return a list of the interesting versions. Later a proper list of all newer versions would be great.
     *
     * @return array
     */
    public function getReleases()
    {
        return array('4.0.0');
    }

    /**
     * returns a prepared list of the packages.
     *
     * parses the following output for convienence reasons:
     *
     * $ peter@petert-lp /var/www/project (master) $ composer why-not silverstripe/framework:3.3.0
     * $ nglasl/silverstripe-misdirection  dev-master  requires  silverstripe/framework (3.1.*)
     * $ silverstripe/sqlite3              1.3.x-dev   requires  silverstripe/framework (>=3.0,<3.2)
     * $ silverstripe/widgets              1.1.x-dev   requires  silverstripe/framework (3.1.*)
     * $ unclecheese/display-logic         1.2.x-dev   requires  silverstripe/framework (3.1.*)
     *
     * @param string $release
     *
     * @return array
     */
    public function getBlockers($release)
    {
        // get the prohibiting packages for a particular framework version
        // @TODO refactor to use actual composer package directly instead of via the cli.
        exec(
            sprintf(
                'php %s %s silverstripe/framework:%s --working-dir=.. 2> /dev/null',
                '../vendor/composer/composer/bin/composer',
                'why-not',
                $release
            ),
            $packages
        );

        // prepare the output
        return
            "\n".trim(
            "Target SilverStripe Framework Version: {$release}\n".
            "--------------------------------------------\n\n".
            join("", array_unique(array_map(function ($package) use ($release) {
                // some string processing to parse the package string
                $elements = preg_split('/\s+/', $package);
                $limitation = substr($elements[4], 1, -1);

                // a simple version parser, which should be enough for this purpose:
                $limitationAsNumber = preg_replace('/\D/', '', $limitation);
                $limitationAsNumber = $limitationAsNumber . str_repeat('0', 10 - strlen($limitationAsNumber));
                $releaseAsNumber = preg_replace('/\D/', '', $release);
                $releaseAsNumber = $releaseAsNumber . str_repeat('0', 10 - strlen($releaseAsNumber));

                // check if this is actual an upgrade. Still could be a downgrade.
                if ($releaseAsNumber < $limitationAsNumber) {
                    return 'This would be a downgrade.';
                }
                if ($releaseAsNumber > $limitationAsNumber) {
                    // prep a new array.
                    return sprintf(
                        "Package: %s\n - maximum supported version: %s\n\n",
                        $elements[0],
                        $limitation
                    );
                }
            return $result; }, $packages))));
    }

    /**
     * @var boolean
     */
    protected function isCLI()
    {
        return (PHP_SAPI === 'cli');
    }

    /**
     * prints a message during the run of the task
     *
     * @param string $text
     */
    protected function message($text)
    {
        if (!$this->isCLI()) {
            $text = '<pre>' . $text . '</pre>' . PHP_EOL;
        }

        echo $text . PHP_EOL;
    }
}
