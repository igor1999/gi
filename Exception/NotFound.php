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

class NotFound extends AbstractException
{
    const MESSAGE_TEMPLATE            = '%s not found';

    const MESSAGE_TEMPLATE_WITH_PARAM = '%s \'%s\' not found';


    /**
     * IsEmpty constructor.
     * @param string $title
     * @param mixed $param
     * @param mixed $caller
     * @param \Throwable|null $previous
     */
    public function __construct(string $title, $param, $caller, \Throwable $previous = null)
    {
        parent::__construct($caller, $previous);

        if (empty($param)) {
            $this->setMessage(static::MESSAGE_TEMPLATE, [$title]);
        } else {
            $this->setMessage(static::MESSAGE_TEMPLATE_WITH_PARAM, [$title, $param]);
        }
    }
}