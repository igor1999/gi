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
namespace GI\DOM\Base\Element;

abstract class AbstractSimpleElement extends AbstractAttributedElement implements SimpleElementInterface
{
    /**
     * @return string
     */
    protected function getTagTemplate()
    {
        return '<%s %s />';
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        if (!$this->hasTag()) {
            $this->giThrowNotSetException('Element tag');
        }

        return parent::toString();
    }
}