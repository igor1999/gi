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
namespace GI\ClientContents\NavigationNode;

interface NavigationNodeInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title);

    /**
     * @return string
     */
    public function getLink();

    /**
     * @param string $link
     * @return static
     */
    public function setLink(string $link);

    /**
     * @return static
     */
    public function setLinkToMock();

    /**
     * @return string
     */
    public function hasTarget();

    /**
     * @return string
     */
    public function getTarget();

    /**
     * @param string $target
     * @return static
     */
    public function setTarget(string $target);

    /**
     * @return static
     */
    public function setTargetToBlank();

    /**
     * @return static
     */
    public function setTargetToSelf();

    /**
     * @return static
     */
    public function setTargetToParent();

    /**
     * @return static
     */
    public function setTargetToTop();
}