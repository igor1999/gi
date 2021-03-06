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
namespace GI\Component\Paging\Base\View\Base;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\Component\Paging\Base\ViewModel\ViewModelInterface;
use GI\ClientContents\Paging\Base\PagingInterface;
use GI\DOM\HTML\Element\Select\SelectInterface;

/**
 * Interface WidgetInterface
 * @package GI\Component\Paging\Base\View\Base
 *
 * @method ViewModelInterface getViewModel()
 * @method WidgetInterface setViewModel(ViewModelInterface $viewModel)
 * @method PagingInterface getPagingModel()
 * @method WidgetInterface setPagingModel(PagingInterface $pagingModel)
 */
interface WidgetInterface extends BaseInterface
{
    /**
     * @return SelectInterface
     */
    public function getSizesSelect();

    /**
     * @return string
     */
    public function getDescriptionForEntriesTotal();
}