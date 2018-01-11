<?php
/**
 * Created by PhpStorm.
 * User: xiurobert
 * Date: 25/8/17
 * Time: 4:02 PM
 */

namespace InfiniaHome\MiscFunctions;


class TemplateFromFile {
    protected $file;
    protected $values = array();
    /**
     * class.TemplateFromFile constructor.
     * @param $file string The path to the file you want to use
     */
    public function __construct($file) {
        $this->file = $file;
    }
    /**
     * Sets and defines the keys in your template file
     * @param $key string The key that you used as a string in your template file
     * @param $value mixed The value that you want to resolve the key to after creating the output
     */
    public function set($key, $value) {
        $this->values[$key] = $value;
    }
    /**
     * Outputs the contents of your file
     * @return mixed|string Puts the contents of your file out
     */
    public function output() {
        if (!file_exists($this->file)) {
            return "Error loading template file ($this->file).";
        }
        $output = file_get_contents($this->file);
        foreach ($this->values as $key => $value) {
            $tagToReplace = "{#$key}";
            $output = str_replace($tagToReplace, $value, $output);
        }
        return $output;
    }
}