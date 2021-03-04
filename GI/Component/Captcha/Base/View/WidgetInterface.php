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
namespace GI\Component\Captcha\Base\View;

use GI\Component\Base\View\Widget\WidgetInterface as BaseInterface;
use GI\DOM\HTML\Element\Button\ButtonInterface;
use GI\DOM\HTML\Element\Div\FloatingLayout\LayoutInterface;
use GI\DOM\HTML\Element\Image\ImageInterface;
use GI\DOM\HTML\Element\Input\Hidden\HiddenInterface;

interface WidgetInterface extends BaseInterface
{
    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id);

    /**
     * @param string $recaptchaURI
     * @return static
     */
    public function setRecaptchaURI(string $recaptchaURI);

    /**
     * @return LayoutInterface
     */
    public function getContainer();

    /**
     * @return HiddenInterface
     */
    public function getIdHidden();

    /**
     * @return ButtonInterface
     */
    public function getRecaptchaButton();

    /**
     * @return ImageInterface
     */
    public function getRecaptchaImage();
}