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
namespace GI\Component\Base\View\Relations;

trait RelationsAwareTrait
{
    /**
     * @var RelationsInterface
     */
    private $relationList;


    /**
     * @return RelationsInterface
     */
    protected function getRelationList()
    {
        if (!($this->relationList instanceof RelationsInterface)) {
            $this->relationList = $this->giGetDi(RelationsInterface::class, Relations::class, [$this]);
        }

        return $this->relationList;
    }
}