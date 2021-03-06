<?php
namespace Dennis\Seeder\Factory;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Dennis Römmich <dennis@roemmich.eu>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class FakerFactory
 *
 * @package Dennis\Seeder\Factory\TableFactory
 */
class FakerFactory
{
    /**
     * instance
     *
     * @var \Dennis\Seeder\Provider\Faker $instance
     */
    protected static $instance = null;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    /**
     * Provides a Faker
     *
     * @return \Dennis\Seeder\Provider\Faker
     */
    public static function createFaker()
    {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        $generator = \Faker\Factory::create();
        $faker = new \Dennis\Seeder\Provider\Faker($generator);

        self::$instance = $faker;

        return $faker;
    }
}
