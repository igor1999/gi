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
namespace GI\Component\Menu;

use GI\Component\Base\AbstractComponent;
use GI\Component\Menu\View\Widget;

use GI\Component\Menu\View\WidgetInterface;
use GI\ClientContents\Menu\MenuInterface as MenuModelInterface;

abstract class AbstractMenu extends AbstractComponent implements MenuInterface
{
    /**
     * @var WidgetInterface
     */
    private $view;

    /**
     * @var bool
     */
    private $bar = true;


    /**
     * Menu constructor.
     * @throws \Exception
     */
    public function __construct()
    {
       $this->view = $this->giGetDi(WidgetInterface::class, Widget::class);
    }

    /**
     * @return WidgetInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return MenuModelInterface
     */
    abstract protected function getMenuModel();

    /**
     * @return bool
     */
    public function isBar()
    {
        return $this->bar;
    }

    /**
     * @param bool $bar
     * @return static
     */
    protected function setBar(bool $bar)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return static
     * @throws \Exception
     */
    public function __call(string $method, array $arguments = [])
    {
        if (!method_exists($this->getMenuModel(), $method)) {
            $this->giThrowMagicMethodException($method);
        }

        call_user_func_array([$this->getMenuModel(), $method], $arguments);

        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getView()->setModel($this->getMenuModel())->setBar($this->bar)->toString();
    }
}