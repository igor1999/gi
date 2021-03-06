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
namespace GI\Storage\Collection\BoolCollection\HashSet\Alterable;

use GI\Storage\Collection\BoolCollection\HashSet\Immutable\Immutable;

use GI\Storage\Collection\BoolCollection\HashSet\Immutable\ImmutableInterface;

class Alterable extends Immutable implements AlterableInterface
{
    /**
     * @param string $key
     * @param bool|null $item
     * @param int|null $position
     * @return static
     * @throws \Exception
     */
    public function set(string $key, bool $item = null, int $position = null)
    {
        return parent::set($key, $item);
    }

    /**
     * @param string $key
     * @param string $anchor
     * @param bool|null $item
     * @return static
     * @throws \Exception
     */
    public function insertBefore(string $key, string $anchor, bool $item = null)
    {
        return parent::insertBefore($key, $anchor, $item);
    }

    /**
     * @param bool[]|null[] $items
     * @return static
     * @throws \Exception
     */
    public function apply(array $items)
    {
        return parent::apply($items);
    }

    /**
     * @param bool[]|null[] $items
     * @return static
     * @throws \Exception
     */
    public function setItems(array $items)
    {
        return parent::setItems($items);
    }

    /**
     * @param ImmutableInterface $collection
     * @return static
     * @throws \Exception
     */
    public function merge(ImmutableInterface $collection)
    {
        return parent::merge($collection);
    }

    /**
     * @param bool[]|null[] $items
     * @return static
     * @throws \Exception
     */
    public function hydrate(array $items)
    {
        return $this->setItems($items);
    }

    /**
     * @param \Closure $f
     * @return static
     * @throws \Exception
     */
    public function filter(\Closure $f)
    {
        return parent::filter($f);
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

    /**
     * @param string $key
     * @return bool
     */
    public function remove(string $key)
    {
        return parent::remove($key);
    }

    /**
     * @param bool|null $needle
     * @return bool
     */
    public function removeItem(bool $needle = null)
    {
        return parent::removeItem($needle);
    }

    /**
     * @param int $position
     * @return bool
     * @throws \Exception
     */
    public function removeByPosition(int $position)
    {
        return parent::removeByPosition($position);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function pop()
    {
        return parent::pop();
    }

    /**
     * @return static
     */
    public function clean()
    {
        return parent::clean();
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
            $set = $this->getGiServiceLocator()->getUtilites()->getPSRFormatParser()->parseWithPrefixSet($method);
        } catch (\Exception $exception) {
            try {
                $remove = $this->getGiServiceLocator()->getUtilites()->getPSRFormatParser()->parseWithPrefixRemove($method);
            } catch (\Exception $exception) {
                $result = parent::__call($method, $arguments);
            }
        }

        if (!empty($set)) {
            if (empty($arguments)) {
                $this->getGiServiceLocator()->throwNotGivenException('Argument for set');
            }
            $set = $this->getService()->formatKey($set);
            $result = $this->set($set, array_shift($arguments));
        } elseif (!empty($remove)) {
            $remove = $this->getService()->formatKey($remove);
            $result = $this->remove($remove);
        }

        return $result;
    }
}