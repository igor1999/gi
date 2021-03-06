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
namespace GI\RDB\Platform\MYSQL;

use GI\RDB\Platform\AbstractPlatform;

class MYSQL extends AbstractPlatform implements MYSQLInterface
{
    const PHP_INT_TYPES = [
        'bigint', 'binary', 'bit', 'bool', 'boolean', 'int',
        'mediumint', 'smallint', 'tinyint', 'year'
    ];

    const PHP_FLOAT_TYPES = ['decimal', 'double', 'float', 'numeric', 'real'];

    const PHP_STRING_TYPES = [
        'blob', 'char', 'date', 'datetime', 'enum',
        'longblob', 'longtext', 'mediumblob', 'mediumtext', 'set',
        'text', 'time', 'timestamp', 'tinyblob', 'tinytext', 'varbinary', 'varchar'
    ];

    const PHP_DATE_TYPES = ['timestamp', 'year', 'date', 'datetime', 'time'];

    const PHP_BOOL_TYPES = ['bit', 'bool', 'boolean', 'smallint', 'tinyint'];


    /**
     * @param string $string
     * @return string
     */
    protected function quoteString(string $string)
    {
        return '`' . $string . '`';
    }

    /**
     * @return string
     */
    public function getColumnListQuery()
    {
        return '
            SELECT 
                `ORDINAL_POSITION` AS `index`, 
                `COLUMN_NAME` as `name`,
                `DATA_TYPE` as `type`,
                `CHARACTER_MAXIMUM_LENGTH` as `length`,
                `COLUMN_DEFAULT` as `default`,
                if(`COLUMN_KEY` = \'PRI\', 1 , 0) as `primary`,
                if((`COLUMN_KEY` = \'PRI\') OR (`COLUMN_KEY` = \'UNI\'), 1 , 0) as `unique`,
                if(`IS_NULLABLE` = \'YES\', 1 , 0) as `null`,
                if(`EXTRA` = \'auto_increment\', 1 , 0) as `identity`
            FROM `information_schema`.`COLUMNS`
            WHERE `TABLE_SCHEMA` = :database 
                AND `TABLE_NAME` = :table 
        ';
    }

    /**
     * @return string
     */
    public function getTableListQuery()
    {
        return '
            SELECT `TABLE_NAME` AS `name`
            FROM `information_schema`.`TABLES`
            WHERE `TABLE_SCHEMA` = :database 
                AND `TABLE_TYPE` = \'BASE TABLE\'
        ';
    }

    /**
     * @return string
     */
    public function getTableDetailQuery()
    {
        return '
            SELECT *
            FROM `information_schema`.`TABLES`
            WHERE `TABLE_SCHEMA` = :database 
                AND `TABLE_NAME` = :table 
                AND `TABLE_TYPE` = \'BASE TABLE\'
        ';
    }

    /**
     * @return string
     */
    public function getTableParentReferencesQuery()
    {
        return '
            SELECT 
                `COLUMN_NAME` AS `column`, 
                `REFERENCED_TABLE_NAME` AS `referenced_table`, 
                `REFERENCED_COLUMN_NAME` AS `referenced_column`
            FROM `information_schema`.`KEY_COLUMN_USAGE`
            WHERE `TABLE_SCHEMA` = :database 
                AND `TABLE_NAME` = :table 
                AND `REFERENCED_TABLE_SCHEMA` = :database
        ';
    }

    /**
     * @return string
     */
    public function getTableChildReferencesQuery()
    {
        return '
            SELECT 
                `REFERENCED_COLUMN_NAME` AS `column`, 
                `TABLE_NAME` AS `referenced_table`, 
                `COLUMN_NAME` AS `referenced_column`
            FROM `information_schema`.`KEY_COLUMN_USAGE`
            WHERE `REFERENCED_TABLE_SCHEMA` = :database
                AND `REFERENCED_TABLE_NAME` = :table 
                AND `TABLE_SCHEMA` = :database 
        ';
    }
}