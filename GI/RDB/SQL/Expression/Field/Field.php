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
namespace GI\RDB\SQL\Expression\Field;

use GI\ServiceLocator\ServiceLocatorAwareTrait;

class Field implements FieldInterface
{
    use ServiceLocatorAwareTrait;


    const TEMPLATE = '{{%s}}';


    const NON_FIELD_TEMPLATE = '/[^\w.]/';


    /**
     * @var string
     */
    private $name = '';


    /**
     * Field constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isNonField()
    {
        return (bool)preg_match('/[^\w.]/', $this->name);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->isNonField() ? $this->name : sprintf(static::TEMPLATE, $this->name);
    }
}