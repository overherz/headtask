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

           // var randomColor = \"#000000\".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
           // \$(\"a\").css(\"color\",randomColor);
            setInterval( function() {
                var height = 0;
                var psp = \$(\"#projects_second_panel\").innerHeight();
                var pmp = \$(\"#sidebar\").innerHeight();
                console.log(psp+\" - \"+pmp);

                if (psp >= pmp) height = psp;
                else height = pmp;

                \$('#sidebar .well,#projects_second_panel .jumbotron').css({
                    'min-height': height
                });
            }, 100);
        });
    </script>
    ");
        // line 45
        $this->displayBlock('js', $context, $blocks);
        // line 47
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 50
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            $this->env->loadTemplate("/source/menu.html")->display($context);
        }
        // line 51
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 52
        $this->displayBlock('body', $context, $blocks);
        // line 53
        echo \layout::func_from_text("</div>
");
        // line 54
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 55
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

    // line 45
    public function block_js($context, array $blocks = array())
    {
        // line 46
        echo \layout::func_from_text("    ");
    }

    // line 52
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
        return array (  119 => 52,  115 => 46,  112 => 45,  108 => 16,  105 => 15,  100 => 4,  95 => 55,  93 => 54,  90 => 53,  88 => 52,  85 => 51,  81 => 50,  76 => 47,  44 => 17,  28 => 4,  23 => 1,  48 => 7,  40 => 8,  38 => 7,  32 => 3,  29 => 2,  199 => 70,  191 => 64,  187 => 62,  181 => 61,  176 => 58,  170 => 57,  165 => 54,  159 => 52,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  139 => 45,  136 => 44,  132 => 43,  125 => 41,  117 => 37,  113 => 35,  109 => 33,  107 => 32,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 45,  71 => 20,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 15,  39 => 3,  31 => 2,);
    }
}
