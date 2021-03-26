<?php
class Translate
{
    private $language;

    function __construct($language = null)
    {
        if (isset($language))
        {
            $this->load($language);
        }
    }

    public function load($language)
    {
        if (!is_file('languages/' . $language . '.php'))
        {
            echo("Language definition file not found: $language");
            die;
        } elseif (!is_readable('languages/' . $language . '.php'))
        {
            echo("No access to language definition file: $language");
            die;
        } else
        {
            $this->language = $language;
            $this->strings   = require_once('languages/' . $this->language . '.php');
            $this->defaults  = require_once('languages/en.php');
        }
    }

    public function t($string)
    {
        $result = @$this->strings[$string];

        if ($result == "")
            $result = $this->defaults[$string];

        if ($result == "")
            $result = $string;

        return $result;
    }


}