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
namespace GI\Component\Authentication\Exception;

use GI\Exception\AbstractException;

class Logout extends AbstractException
{
    const MESSAGE_TEMPLATE = 'User not signed in';


    /**
     * Logout constructor.
     * @param mixed $caller
     * @param \Throwable|null $previous
     */
    public function __construct($caller, \Throwable $previous = null)
    {
        parent::__construct($caller, $previous);

        $this->setMessage(static::MESSAGE_TEMPLATE);
    }
}