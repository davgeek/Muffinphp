<?php

/**
 * Inflector miscellaneous methods
 */
class Inflector {

    /**
     * Method camel
     * Convert any string to a camel case, 
     * first chart of word to Uppercase.
     * @param  String $value word
     * @return String       modified
     */
    public static function camel($value)
    {
        $segments = explode('-', $value);

        array_walk($segments, function (&$item) {
            $item = ucfirst($item);
        });

        return implode('', $segments);
    }

    /**
     * Method lowerCamel
     * Convert any string to a camel case,
     * first chart of word to Lowercase.
     * @param  String $value word
     * @return String       modified
     */
    public static function lowerCamel($value)
    {
        return lcfirst(static::camel($value));
    }

}