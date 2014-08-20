<?php

/* /source/wrapper_index.html */
class __TwigTemplate_cb5fb2e0f54c07e4972f292aba0696a13a0da92e978150ba2970ee7d5309ddcf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'body' => array($this, 'block_body'),
            'js' => array($this, 'block_js'),
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
    <link rel=\"stylesheet\" href=\"/source/css/ui-lightness/jquery-ui-1.10.4.custom.min.css\" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600,400italic,600italic,400' rel='stylesheet' type='text/css'>
    ");
        // line 16
        $this->displayBlock('css', $context, $blocks);
        // line 18
        echo \layout::func_from_text("</head>
<body>
<div id=\"wrap\">
    ");
        // line 21
        $this->env->loadTemplate("/source/menu.html")->display($context);
        // line 22
        echo \layout::func_from_text("    <div class=\"from_top\"></div>
    ");
        // line 23
        $this->displayBlock('body', $context, $blocks);
        // line 24
        echo \layout::func_from_text("</div>
");
        // line 25
        $this->env->loadTemplate("/source/footer.html")->display($context);
        // line 26
        echo \layout::func_from_text("
<script src=\"http://yandex.st/jquery/2.1.1/jquery.min.js\"></script>
<script src=\"http://yandex.st/jquery-ui/1.10.4/jquery-ui.min.js\"></script>
<script src=\"/source/js/jquery.jgrowl.min.js\"></script>
<script src=\"/source/js/functions.js\"></script>
<script src=\"/source/js/message.js\"></script>
<script src=\"http://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
<script src=\"/source/js/styler/jquery.formstyler.min.js\"></script>
<script src=\"/source/js/socket.io/socket.io.js\"></script>
<script src=\"/source/js/jquery.scrollTo.min.js\"></script>
<!--<script src=\"");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "client.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>-->
<script>
    \$(document).ready(function(\$) {
        \$('#wrap input, #wrap select').styler();
    });
</script>
<script src=\"/source/js/sound_manager/soundmanager2-nodebug-jsmin.js\"></script>
<!--<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\"></script>-->
<script type=\"text/javascript\">
    \$(document).ready(function(\$) {
        soundManager.setup({
            useFlashBlock : false,
            url : '/source/js/sound_manager/',
            debugMode : false,
            consoleOnly : false,
            onready : function() {
                soundManager.createSound({
                    id:'new_message',
                    url:'/source/js/sound_manager/sound.mp3'
                });
                soundManager.createSound({
                    id:'call',
                    url:'/source/js/sound_manager/incoming_call.mp3'
                });
            }
        });
    });

    window.ms = {
        address: \"");
        // line 65
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "message_server"), "html", null, true));
        echo \layout::func_from_text("\",
        uniq_key: \"");
        // line 66
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "uniq_key"), "html", null, true));
        echo \layout::func_from_text("\"
    }
</script>
");
        // line 69
        $this->displayBlock('js', $context, $blocks);
        // line 71
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 16
    public function block_css($context, array $blocks = array())
    {
        // line 17
        echo \layout::func_from_text("    ");
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
    }

    // line 69
    public function block_js($context, array $blocks = array())
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
        return array (  140 => 69,  135 => 23,  131 => 17,  128 => 16,  123 => 4,  118 => 71,  116 => 69,  110 => 66,  106 => 65,  74 => 36,  62 => 26,  60 => 25,  57 => 24,  55 => 23,  52 => 22,  50 => 21,  45 => 18,  43 => 16,  28 => 4,  23 => 1,);
    }
}
