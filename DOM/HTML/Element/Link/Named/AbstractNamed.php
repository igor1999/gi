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
namespace GI\DOM\HTML\Element\Link\Named;

use GI\DOM\HTML\Element\Link\Link;
use GI\DOM\HTML\Attributes\Attributes;

use GI\DOM\HTML\Attributes\AttributesInterface;

abstract class AbstractNamed extends Link implements NamedInterface
{
    const REL  = null;

    const TYPE = null;


    /**
     * @var AttributesInterface
     */
    private $attributes;


    /**
     * @return AttributesInterface
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return static
     * @throws \Exception
     */
    protected function createAttributes()
    {
        $this->attributes = $this->giGetDi(
            AttributesInterface::class,
            Attributes::class,
            [['type' => static::TYPE, 'rel' => static::REL]]
        );

        return $this;
    }
}