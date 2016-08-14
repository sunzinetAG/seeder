<?php
namespace Dennis\Seeder;

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
 * Interface Faker
 *
 * @package Dennis\Seeder\Provider\FakerInterface
 */
interface Faker
{
    /**
     * Returns random dummy data by property
     *
     * @param $property
     * @return mixed
     */
    public function get($property);

    /**
     * Returns all supported providers
     *
     * @return array
     */
    public function getSupportedProviders();

    /**
     * Guesses which provider will be returned by given property name
     *
     * @param $name
     * @return string
     */
    public function guessProvider($name);
}