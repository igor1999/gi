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
namespace GI\Util\TextProcessing\MarkupTextProcessor;

use GI\Util\TextProcessing\Escaper\HTMLText\EscaperInterface;

interface MarkupTextProcessorInterface
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return static
     */
    public function setText(string $text);

    /**
     * @return EscaperInterface
     */
    public function getEscaper();

    /**
     * @return bool
     */
    public function isEolToBrOn();

    /**
     * @param bool $eolToBr
     * @return static
     */
    public function setEolToBrOn(bool $eolToBr);

    /**
     * @param int $length
     * @param string|null $charList
     * @return static
     */
    public function cutAsString(int $length, string $charList = null);

    /**
     * @param int $linesNumber
     * @return static
     */
    public function cutAsText(int $linesNumber);

    /**
     * @return static
     */
    public function escape();

    /**
     * @return static
     */
    public function replaceEOLWithBr();

    /**
     * @return static
     */
    public function escapeAndReplaceEOLWithBr();
}