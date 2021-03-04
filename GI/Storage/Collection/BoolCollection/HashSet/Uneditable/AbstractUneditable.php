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
namespace GI\Storage\Collection\BoolCollection\HashSet\Uneditable;

use GI\Storage\Collection\BoolCollection\HashSet\Immutable\Immutable;

abstract class AbstractUneditable extends Immutable implements UneditableInterface
{
    /**
     * @param string $key
     * @param bool|null $item
     * @return static
     * @throws \Exception
     */
    protected function edit(string $key, bool $item = null)
    {
        if (!$this->has($key)) {
            $this->giThrowNotInScopeException($key);
        }

        $this->set($key, $item);

        return $this;
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return bool|null|self
     * @throws \Exception
     */
    public function __call(string $method, array $arguments = [])
    {
        $result = null;

        try {
            $set = $this->giGetPSRFormatParser()->parseWithPrefixSet($method);
        } catch (\Exception $exception) {
            $result = parent::__call($method, $arguments);
        }

        if (!empty($set)) {
            if (empty($arguments)) {
                $this->giThrowNotGivenException('Argument for set');
            }
            $set = $this->getService()->formatKey($set);
            $result = $this->edit($set, array_shift($arguments));
        }

        return $result;
    }

    /**
     * @param \Closure $f
     * @return static
     * @throws \Exception
     */
    public function map(\Closure $f)
    {
        return parent::map($f);
    }

    /**
     * @param bool|null $value
     * @return static
     * @throws \Exception
     */
    public function reset(bool $value = null)
    {
        return parent::reset($value);
    }
}