<?php
namespace Dennis\Seeder\Provider;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Dennis Römmich <dennis@roemmich.eu>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
use Dennis\Seeder\Traits;

/**
 * TableConfiguration
 *
 * @author Dennis Römmich<dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class TableConfiguration
{
    use Traits\Language;

    /**
     * extensionConfiguration
     *
     * @var array $tableConfiguration
     */
    protected $tableConfiguration;

    /**
     * table
     *
     * @var string $name
     */
    protected $name;

    /**
     * ExtensionConfigurationUtility constructor.
     *
     * @param $tableName
     */
    public function __construct($tableName)
    {
        if (!isset($GLOBALS['TCA'][$tableName])) {
            throw new \InvalidArgumentException(
                'Configuration for table ' . $tableName . ' not found!'
            );
        }
        $this->name = $tableName;
        $this->tableConfiguration = $GLOBALS['TCA'][$tableName];
    }

    /**
     * getName
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getName
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->translate($this->tableConfiguration['ctrl']['title']);
    }

    /**
     * getColumns
     *
     * @return array
     */
    public function getColumns()
    {
        return array_keys($this->tableConfiguration['columns']);
    }

    /**
     * getColumnConfiguration
     *
     * @param string $columnName
     * @return array
     */
    public function getColumnConfiguration($columnName)
    {
        if (!is_string($columnName)) {
            throw new \InvalidArgumentException(
                'Columns must be type of string. Type of ' . gettype($columnName) . ' given.'
            );
        }
        if (!isset($this->tableConfiguration['columns'][$columnName])) {
            throw new \InvalidArgumentException(
                'Column ' . $columnName . ' does not exist for table ' . $this->name
            );
        }

        return array($columnName => $this->tableConfiguration['columns'][$columnName]['config']);
    }

    /**
     * @return array
     */
    public static function getAllTables()
    {
        $tables = array();
        foreach (array_keys($GLOBALS['TCA']) as $tableName) {
            $tables[$tableName] = $tableName;
        }
        return $tables;
    }
}
