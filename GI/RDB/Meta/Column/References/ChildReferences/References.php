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
namespace GI\RDB\Meta\Column\References\ChildReferences;

use GI\RDB\Meta\Column\References\Base\AbstractReferences as Base;

use GI\RDB\Meta\Column\ColumnInterface;

class References extends Base implements ReferencesInterface
{
    /**
     * @return array
     */
    protected function getContents()
    {
        return $this->getColumn()->getTable()->getChildReferences();
    }

    /**
     * @return ColumnInterface[]
     */
    public function getUniqueItems()
    {
        $f = function(ColumnInterface $column)
        {
            return $column->isUnique();
        };

        return array_filter($this->getItems(), $f);
    }

    /**
     * @return ColumnInterface[]
     */
    public function getNonUniqueItems()
    {
        $f = function(ColumnInterface $column)
        {
            return !$column->isUnique();
        };

        return array_filter($this->getItems(), $f);
    }
}