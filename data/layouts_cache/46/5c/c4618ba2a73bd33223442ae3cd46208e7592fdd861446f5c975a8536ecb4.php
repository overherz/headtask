<?php

/* /source/wrapper_index.html */
class __TwigTemplate_465cc4618ba2a73bd33223442ae3cd46208e7592fdd861446f5c975a8536ecb4 extends Twig_Template
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
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"/source/js/styler/jquery.formstyler.css\" type=\"text/css\" />
    <link href=\"/source/admin/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/source/admin/fonts/font-awesome/css/font-awesome.minba72.css?v=4.0.3\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" />
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
    <script src=\"/source/admin/bootstrap/js/bootstrap.min.js\"></script>
    <script src=\"/source/js/styler/jquery.formstyler.js\"></script>
    <script>
        \$(document).ready(function(\$) {
            \$('#wrap input, #wrap select').styler();

            var randomColor = \"#000000\".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
           // \$(\"a\").css(\"color\",randomColor);
        });
    </script>
    ");
        // line 46
        $this->displayBlock('js', $context, $blocks);
        // line 48
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 51
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            $this->env->loadTemplate("/source/menu.html")->display($context);
        }
        // line 52
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo \layout::func_from_text("</div>
");
        // line 55
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 56
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

    // line 46
    public function block_js($context, array $blocks = array())
    {
        // line 47
        echo \layout::func_from_text("    ");
    }

    // line 53
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
        return array (  162 => 53,  158 => 47,  155 => 46,  151 => 30,  148 => 29,  143 => 4,  138 => 56,  136 => 55,  133 => 54,  131 => 53,  128 => 52,  124 => 51,  119 => 48,  117 => 46,  100 => 31,  97 => 29,  88 => 25,  82 => 24,  76 => 23,  70 => 22,  64 => 21,  58 => 20,  52 => 19,  48 => 18,  44 => 16,  42 => 15,  28 => 4,  23 => 1,);
    }
}
