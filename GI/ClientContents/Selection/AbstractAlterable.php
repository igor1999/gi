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
namespace GI\ClientContents\Selection;

abstract class AbstractAlterable extends AbstractImmutable implements AlterableInterface
{
    /**
     * @param string $value
     * @param string $text
     * @param bool $selected
     * @return static
     */
    public function set(string $value, string $text, bool $selected = false)
    {
        parent::set($value, $text, $selected);

        return $this;
    }

    /**
     * @param string $anchor
     * @param string $value
     * @param string $text
     * @param bool $selected
     * @return static
     * @throws \Exception
     */
    public function insertBefore(string $anchor, string $value, string $text, bool $selected = false)
    {
        parent::insertBefore($anchor, $value, $text, $selected);

        return $this;
    }

    /**
     * @param array $source
     * @return static
     */
    public function setMany(array $source)
    {
        parent::setMany($source);

        return $this;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function remove(string $value)
    {
        return parent::remove($value);
    }

    /**
     * @return static
     */
    public function clean()
    {
        parent::clean();

        return $this;
    }
}