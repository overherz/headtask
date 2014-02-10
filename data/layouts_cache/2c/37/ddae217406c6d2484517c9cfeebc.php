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
    ");
        // line 15
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background") && $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"))) {
            // line 16
            echo \layout::func_from_text("    <style>
        #wrap,body {
            background-color: ");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(";
            background-image: -khtml-gradient(linear, left top, left bottom, from(");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text("), to(");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text("));
            background-image: -moz-linear-gradient(top, ");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -ms-linear-gradient(top, ");
            // line 21
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text("), color-stop(100%, ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text("));
            background-image: -webkit-linear-gradient(top, ");
            // line 23
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: -o-linear-gradient(top, ");
            // line 24
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
            background-image: linear-gradient(");
            // line 25
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background"), "html", null, true));
            echo \layout::func_from_text(", ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "background2"), "html", null, true));
            echo \layout::func_from_text(");
        }
    </style>
    ");
        }
        // line 29
        echo \layout::func_from_text("    ");
        $this->displayBlock('css', $context, $blocks);
        // line 31
        echo \layout::func_from_text("    <script src=\"/source/js/jquery.min.js\"></script>
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
        // line 43
        $this->displayBlock('js', $context, $blocks);
        // line 45
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 48
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            $this->env->loadTemplate("/source/menu.html")->display($context);
        }
        // line 49
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 50
        $this->displayBlock('body', $context, $blocks);
        // line 51
        echo \layout::func_from_text("</div>
");
        // line 52
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 53
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 29
    public function block_css($context, array $blocks = array())
    {
        // line 30
        echo \layout::func_from_text("    ");
    }

    // line 43
    public function block_js($context, array $blocks = array())
    {
        // line 44
        echo \layout::func_from_text("    ");
    }

    // line 50
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
        return array (  159 => 50,  155 => 44,  152 => 43,  148 => 30,  145 => 29,  140 => 4,  135 => 53,  133 => 52,  130 => 51,  128 => 50,  125 => 49,  121 => 48,  116 => 45,  114 => 43,  100 => 31,  97 => 29,  88 => 25,  82 => 24,  76 => 23,  70 => 22,  64 => 21,  58 => 20,  52 => 19,  48 => 18,  44 => 16,  42 => 15,  28 => 4,  23 => 1,);
    }
}
