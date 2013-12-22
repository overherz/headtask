<?php

/* /source/wrapper_index.html */
class __TwigTemplate_2c37ddae217406c6d2484517c9cfeebc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<!DOCTYPE html>
<html>
<head>
    <title>Task me! ");
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo \layout::func_from_text("</title>
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\">
    <link rel=\"stylesheet\" href=\"/source/js/styler/jquery.formstyler.css\" type=\"text/css\" />
    <link href=\"/libraries/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/libraries/bootstrap/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\"  />
    <link rel=\"stylesheet\" href=\"/source/css/popup.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/content.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/ui-lightness/jquery-ui-1.10.3.custom.min.css\" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
    ");
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background") && $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"))) {
            // line 17
            echo \layout::func_from_text("    <style>
        #wrap,body {
            background-color: ");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(";
            background-image: -khtml-gradient(linear, left top, left bottom, from(");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text("), to(");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text("));
            background-image: -moz-linear-gradient(top, ");
            // line 21
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -ms-linear-gradient(top, ");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ");
            // line 23
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text("), color-stop(100%, ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text("));
            background-image: -webkit-linear-gradient(top, ");
            // line 24
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -o-linear-gradient(top, ");
            // line 25
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: linear-gradient(");
            // line 26
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
        }
    </style>
    ");
        }
        // line 30
        echo \layout::func_from_text("    ");
        $this->displayBlock('css', $context, $blocks);
        // line 32
        echo \layout::func_from_text("    <script src=\"http://yandex.st/jquery/1.10.2/jquery.min.js\"></script>
    <script src=\"/source/js/jquery-ui-1.10.3.custom.min.js\"></script>
    <script src=\"/source/js/jquery.jgrowl_minimized.js\"></script>
    <script src=\"/source/js/functions.js\"></script>
    <script src=\"/source/js/message.js\"></script>
    <script src=\"/libraries/bootstrap/js/bootstrap.min.js\"></script>
    <script src=\"/source/js/styler/jquery.formstyler.min.js\"></script>
    <script>
        \$(document).ready(function(\$) {
            \$('#wrap input, #wrap select').styler();
        });
    </script>
    ");
        // line 44
        $this->displayBlock('js', $context, $blocks);
        // line 46
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 49
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            $this->env->loadTemplate("/source/menu.html")->display($context);
        }
        // line 50
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 51
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo \layout::func_from_text("</div>
");
        // line 53
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 54
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 30
    public function block_css($context, array $blocks = array())
    {
        // line 31
        echo \layout::func_from_text("    ");
    }

    // line 44
    public function block_js($context, array $blocks = array())
    {
        // line 45
        echo \layout::func_from_text("    ");
    }

    // line 51
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/source/wrapper_index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 51,  156 => 45,  153 => 44,  149 => 31,  146 => 30,  141 => 4,  136 => 54,  134 => 53,  131 => 52,  129 => 51,  126 => 50,  122 => 49,  117 => 46,  115 => 44,  101 => 32,  98 => 30,  89 => 26,  83 => 25,  77 => 24,  71 => 23,  65 => 22,  59 => 21,  53 => 20,  49 => 19,  45 => 17,  43 => 16,  28 => 4,  23 => 1,  48 => 7,  38 => 7,  32 => 3,  29 => 2,  315 => 105,  306 => 101,  298 => 98,  292 => 97,  289 => 96,  284 => 95,  272 => 85,  263 => 81,  254 => 77,  244 => 76,  236 => 71,  222 => 70,  212 => 69,  209 => 68,  206 => 67,  203 => 66,  200 => 65,  198 => 64,  194 => 62,  190 => 60,  186 => 59,  182 => 58,  177 => 57,  173 => 55,  168 => 53,  165 => 52,  161 => 51,  157 => 50,  152 => 49,  145 => 47,  139 => 46,  133 => 45,  124 => 44,  119 => 43,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 8,  37 => 5,  31 => 3,);
    }
}
