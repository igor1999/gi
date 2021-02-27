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
namespace GI\REST\Request\Post;

use GI\REST\Request\AbstractRequestTree;
use GI\DOM\HTML\Element\Input\Hidden\CSRF;

class Post extends AbstractRequestTree implements PostInterface
{
    /**
     * Post constructor.
     * @param array|null $contents
     * @throws \Exception
     */
    public function __construct(array $contents = null)
    {
        if (!is_array($contents)) {
            $contents = $_POST;
        }

        parent::__construct($contents);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getCSRFToken()
    {
        return $this->get(CSRF::NAME);
    }
}