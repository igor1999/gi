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
namespace GI\RDB\Meta\Column;

use GI\Pattern\ArrayExchange\ExtractionInterface;
use GI\RDB\Meta\Table\TableInterface;
use GI\RDB\Meta\Column\References\ParentReferences\ReferencesInterface as ParentReferencesInterface;
use GI\RDB\Meta\Column\References\ChildReferences\ReferencesInterface as ChildReferencesInterface;

interface ColumnInterface extends ExtractionInterface
{
    /**
     * @return TableInterface
     */
    public function getTable();

    /**
     * @return int
     */
    public function getIndex();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getFullQualifiedName();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return int
     */
    public function getLength();

    /**
     * @return mixed
     */
    public function getDefault();

    /**
     * @return bool
     */
    public function isPrimary();

    /**
     * @return bool
     */
    public function isUnique();

    /**
     * @return bool
     */
    public function isNull();

    /**
     * @extract
     * @return bool
     */
    public function isIdentity();

    /**
     * @return string
     */
    public function getPHPType();

    /**
     * @return bool
     */
    public function isIntPHPType();

    /**
     * @return bool
     */
    public function isFloatPHPType();

    /**
     * @return bool
     */
    public function isStringPHPType();

    /**
     * @return bool
     */
    public function isDatePHPType();

    /**
     * @return bool
     */
    public function isBoolPHPType();

    /**
     * @return string
     */
    public function getClassProperty();

    /**
     * @return string
     */
    public function getClassGetter();

    /**
     * @return string
     */
    public function getClassDateGetter();

    /**
     * @return string
     */
    public function getClassBoolGetter();

    /**
     * @return string
     */
    public function getClassSetter();

    /**
     * @return ParentReferencesInterface
     * @throws \Exception
     */
    public function getParentReferenceList();

    /**
     * @return ChildReferencesInterface
     * @throws \Exception
     */
    public function getChildReferenceList();
}