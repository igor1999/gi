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
namespace GI\Exception;

class InvalidValue extends AbstractException
{
    const MESSAGE_TEMPLATE = '%s \'%s\' does not match with value \'%s\'';


    /**
     * InvalidValue constructor.
     * @param string $title
     * @param mixed $value
     * @param string $template
     * @param mixed $caller
     * @param \Throwable|null $previous
     */
    public function __construct(string $title, $value, string $template, $caller, \Throwable $previous = null)
    {
        parent::__construct($caller, $previous);

        $this->setMessage(static::MESSAGE_TEMPLATE, [$title, $value, $template]);
    }
}