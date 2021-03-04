<?php
/*
 * This file is part of PHP-framework GI.
 *
 * PHP-framework GI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP-framework GI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP-framework GI. If not, see <https://www.gnu.org/licenses/>.
 */
namespace GI\RDB\Platform;

interface PlatformInterface
{
    const ENTITY_POINTER = '.';


    /**
     * @param string|array $entity
     * @return string
     */
    public function quoteEntity($entity);

    /**
     * @param array $identifiers
     * @return string
     */
    public function joinEntities(array $identifiers);

    /**
     * @param string $identifiers
     * @return array
     */
    public function splitEntities(string $identifiers);

    /**
     * @return string
     */
    public function getColumnListQuery();

    /**
     * @return string
     */
    public function getTableListQuery();

    /**
     * @return string
     */
    public function getTableDetailQuery();

    /**
     * @return string
     */
    public function getTableIdentityQuery();

    /**
     * @param string $dbType
     * @return string
     */
    public function getPHPType(string $dbType);

    /**
     * @param string $dbType
     * @return bool
     */
    public function isDatePHPType(string $dbType);

    /**
     * @param string $dbType
     * @return bool
     */
    public function isBoolPHPType(string $dbType);
}