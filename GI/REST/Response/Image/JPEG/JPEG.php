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
namespace GI\REST\Response\Image\JPEG;

use GI\FileSystem\ContentTypes;
use GI\REST\Response\Image\AbstractImage;

class JPEG extends AbstractImage implements JPEGInterface
{
    /**
     * JPEG constructor.
     * @param resource $source
     */
    public function __construct($source)
    {
        parent::__construct($source, ContentTypes::JPEG);
    }

    /**
     * @return static
     */
    protected function renderSource()
    {
        imagejpeg($this->getSource());

        return $this;
    }
}