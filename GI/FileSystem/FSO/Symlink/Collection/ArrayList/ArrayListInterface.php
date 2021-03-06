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
namespace GI\FileSystem\FSO\Symlink\Collection\ArrayList;

use GI\FileSystem\FSO\Symlink\SymlinkInterface;
use GI\FileSystem\FSO\Symlink\Collection\CollectionInterface as SymlinkCollectionInterface;

interface ArrayListInterface extends  SymlinkCollectionInterface
{
    /**
     * @param int $index
     * @return bool
     */
    public function has(int $index);

    /**
     * @param int $index
     * @return SymlinkInterface
     * @throws \Exception
     */
    public function get(int $index);

    /**
     * @param SymlinkInterface $symlink
     * @return static
     */
    public function add(SymlinkInterface $symlink);

    /**
     * @param int $index
     * @param SymlinkInterface $symlink
     * @return static
     */
    public function insert(int $index, SymlinkInterface $symlink);

    /**
     * @param int $index
     * @param SymlinkInterface $fso
     * @return static
     * @throws \Exception
     */
    public function set(int $index, SymlinkInterface $fso);

    /**
     * @param int $index
     * @return bool
     */
    public function remove(int $index);
}