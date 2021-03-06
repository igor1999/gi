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
namespace GI\REST\Response\Status\Status404;

use GI\REST\Response\Status\Status;

class Status404 extends Status implements Status404Interface
{
    /**
     * Status404 constructor.
     * @param mixed $output
     * @param string $protocol
     */
    public function __construct($output = '', string $protocol = '')
    {
        parent::__construct(404, $output, $protocol);
    }
}