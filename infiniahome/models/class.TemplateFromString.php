<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 25/8/17
 * Time: 3:57 PM
 */

namespace InfiniaHome\MiscFunctions;


class TemplateFromString {
    protected $string;
    protected $values = Array();

    /**
     * TemplateFromString constructor.
     * @param $string
     */
    public function __construct($string) {
        $this->string = $string;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    public function output() {
        if (!$this->string) {
            return "Error: Invalid string";
        }

        $output = $this->string;

        foreach ($this->values as $key => $value) {
            $tagToReplace = "{#$key}";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }


}