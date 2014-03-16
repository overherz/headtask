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
    <link href=\"http://yandex.st/bootstrap/3.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/source/admin/fonts/font-awesome/css/font-awesome.minba72.css?v=4.0.3\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/popup.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/content.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/ui-lightness/jquery-ui-1.10.3.custom.min.css\" />
    ");
        // line 15
        $this->displayBlock('css', $context, $blocks);
        // line 17
        echo \layout::func_from_text("    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
    <script src=\"/source/js/jquery-ui-1.10.3.custom.min.js\"></script>
    <script src=\"/source/js/jquery.jgrowl_minimized.js\"></script>
    <script src=\"/source/js/functions.js\"></script>
    <script src=\"/source/js/message.js\"></script>
    <script src=\"http://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
    <script src=\"/source/js/styler/jquery.formstyler.js\"></script>
    <script>
        \$(document).ready(function(\$) {
            \$('#wrap input, #wrap select').styler();
        });
    </script>
    ");
        // line 29
        $this->displayBlock('js', $context, $blocks);
        // line 31
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 34
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            $this->env->loadTemplate("/source/menu.html")->display($context);
        }
        // line 35
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 36
        $this->displayBlock('body', $context, $blocks);
        // line 37
        echo \layout::func_from_text("</div>
");
        // line 38
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 39
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 15
    public function block_css($context, array $blocks = array())
    {
        // line 16
        echo \layout::func_from_text("    ");
    }

    // line 29
    public function block_js($context, array $blocks = array())
    {
        // line 30
        echo \layout::func_from_text("    ");
    }

    // line 36
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
        return array (  103 => 36,  99 => 30,  96 => 29,  92 => 16,  89 => 15,  84 => 4,  79 => 39,  77 => 38,  74 => 37,  72 => 36,  69 => 35,  65 => 34,  60 => 31,  58 => 29,  44 => 17,  42 => 15,  28 => 4,  23 => 1,);
    }
}
