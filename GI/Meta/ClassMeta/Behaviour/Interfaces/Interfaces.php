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
namespace GI\Meta\ClassMeta\Behaviour\Interfaces;

use GI\Meta\ClassMeta\Collection\Immutable;

use GI\Meta\ClassMeta\Behaviour\OwnerAware\OwnerTrait;

use GI\Meta\ClassMeta\ClassMetaInterface;

class Interfaces extends Immutable implements InterfacesInterface
{
    use OwnerTrait;


    /**
     * Interfaces constructor.
     * @param ClassMetaInterface $owner
     * @throws \Exception
     */
    public function __construct(ClassMetaInterface $owner)
    {
        parent::__construct();

        $this->owner = $owner;

        foreach ($this->owner->getReflection()->getInterfaceNames() as $interfaceName) {
            $this->_setByName($interfaceName);
        }
    }
}