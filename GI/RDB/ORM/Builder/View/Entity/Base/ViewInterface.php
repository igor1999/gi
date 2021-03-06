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
namespace GI\RDB\ORM\Builder\View\Entity\Base;

use GI\Markup\Renderer\RendererInterface;
use GI\RDB\Meta\Table\TableInterface;

/**
 * Interface ViewInterface
 * @package GI\RDB\ORM\Builder\View\Record\Base
 *
 * @method TableInterface getTable()
 * @method ViewInterface setTable(TableInterface $table)
 *
 * @method string getORMNamespace()
 * @method ViewInterface setORMNamespace(string $namespace)
 *
 * @method string getBaseNamespace()
 * @method ViewInterface setBaseNamespace(string $namespace)
 */
interface ViewInterface extends RendererInterface
{

}