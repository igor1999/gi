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
namespace GI\Component\Table\View\Widget\Template;

use GI\DOM\HTML\Element\Table\Cell\TH\THInterface;
use GI\DOM\HTML\Element\Table\Cell\TD\TDInterface;

interface ColumnInterface
{
    /**
     * @param string $orderCriteria
     * @param bool $orderDirection
     * @return THInterface
     * @throws \Exception
     */
    public function createHeaderCell(string $orderCriteria, bool $orderDirection);

    /**
     * @param mixed $value
     * @return TDInterface
     * @throws \Exception
     */
    public function createBodyCell($value);
}