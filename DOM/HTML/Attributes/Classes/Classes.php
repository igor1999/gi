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
namespace GI\DOM\HTML\Attributes\Classes;

use GI\Storage\Collection\StringCollection\ArrayList\Alterable\Alterable as ArrayList;

use GI\ServiceLocator\ServiceLocatorAwareTrait;

use GI\Util\TextProcessing\Escaper\HTMLAttribute\EscaperInterface;

class Classes extends ArrayList implements ClassesInterface
{
    use ServiceLocatorAwareTrait;


    const CLASS_TEMPLATE = 'class="%s"';


    /**
     * @var EscaperInterface
     */
    private $escaper;


    /**
     * Classes constructor.
     * @param string[] $classes
     * @throws \Exception
     */
    public function __construct(array $classes = [])
    {
        $option =$this->giGetStorageFactory()->getOptionFactory()->createStringArrayList()->setUnique(true);

        parent::__construct($classes, $option);

        $this->escaper = $this->giGetUtilites()->getEscaperFactory()->createHTMLAttribute()->setOn(false);
    }

    /**
     * @return EscaperInterface
     */
    public function getEscaper()
    {
        return $this->escaper;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function renderClassValue()
    {
        $output = trim($this->join(' '));

        return $this->getEscaper()->escape($output);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        $output = $this->renderClassValue();

        if (!empty($output)) {
            $output = sprintf(static::CLASS_TEMPLATE, $output);
        }

        return $output;
    }
}