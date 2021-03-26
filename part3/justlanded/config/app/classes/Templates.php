<?php
    class Template
    {
        private $template;

        function __construct($template = null)
        {
            if (isset($template))
            {
                $this->load($template);
            }
        }

        public function load($template)
        {
            if (!is_file($template))
            {
                echo("File not found: $template");
                die;
            } elseif (!is_readable($template))
            {
                echo("Could not access file: $template");
                die;
            } else
            {
                $this->template = $template;
            }
        }

        public function set($var, $content)
        {
            $this->$var = $content;
        }

        public function render($output = true)
        {
            ob_start();
            require $this->template;
            $content = ob_get_clean();
            print $content;
        }
        public function parse()
        {
            ob_start();
            require $this->template;
            $content = ob_get_clean();
            return $content;
        }

    }