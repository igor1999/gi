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
namespace GI\Storage\Collection\BoolCollection;

use GI\Storage\Collection\CollectionInterface as BaseInterface;

interface CollectionInterface extends BaseInterface
{
    /**
     * @return bool[]|null[]
     */
    public function getItems();

    /**
     * @return int
     */
    public function getLength();

    /**
     * @return int
     */
    public function isEmpty();

    /**
     * @param bool $needle
     * @return array
     */
    public function find(bool $needle);

    /**
     * @param bool $needle
     * @return mixed
     * @throws \Exception
     */
    public function findOne(bool $needle);

    /**
     * @param bool $needle
     * @return bool
     */
    public function contains(bool $needle);

    /**
     * @param \Closure $filter
     * @return bool[]|null[]
     */
    public function findByClosure(\Closure $filter);

    /**
     * @param \Closure $filter
     * @return bool|null
     * @throws \Exception
     */
    public function findOneByClosure(\Closure $filter);

    /**
     * @param \Closure $filter
     * @return bool
     */
    public function containsByClosure(\Closure $filter);

    /**
     * @return bool
     */
    public function conjunct();

    /**
     * @return bool
     */
    public function disjunct();

    /**
     * @return float[]
     */
    public function getItemsAsFloat();

    /**
     * @return int[]
     */
    public function getItemsAsInt();

    /**
     * @return string[]
     */
    public function getItemsAsString();
}