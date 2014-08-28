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
            'menu' => array($this, 'block_menu'),
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
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"/source/js/styler/jquery.formstyler.css\" type=\"text/css\" />
    <link href=\"http://yandex.st/bootstrap/3.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/source/admin/fonts/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/popup.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/content.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/ui-lightness/jquery-ui-1.10.4.custom.min.css\" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600,400italic,600italic,400' rel='stylesheet' type='text/css'>
    <link type=\"text/css\" href=\"http://jscrollpane.kelvinluck.com/style/jquery.jscrollpane.css\" rel=\"stylesheet\" media=\"all\" />
    ");
        // line 18
        $this->displayBlock('css', $context, $blocks);
        // line 20
        echo \layout::func_from_text("</head>

<body>
<div id=\"wrapper\">

");
        // line 25
        $this->displayBlock('menu', $context, $blocks);
        // line 28
        echo \layout::func_from_text("
    <!-- Page Content -->
    <div id=\"page-content-wrapper\">
        <div class=\"container-fluid\" style=\"padding: 0\">
            <div class=\"row\" style=\"margin-right: 0;\">
                <div class=\"col-lg-12\" style=\"padding-right: 0;\">
                ");
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 35
        echo \layout::func_from_text("                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->



<script src=\"http://yandex.st/jquery/2.1.1/jquery.min.js\"></script>
<script src=\"/source/js/socket.io/socket.io.js\"></script>
<script src=\"");
        // line 48
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "client.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"http://yandex.st/jquery-ui/1.10.4/jquery-ui.min.js\"></script>
<script src=\"/source/js/jquery.jgrowl.min.js\"></script>
<script src=\"/source/js/functions.js\"></script>
<script src=\"/source/js/message.js\"></script>
<script src=\"http://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
<script src=\"/source/js/styler/jquery.formstyler.min.js\"></script>
<script src=\"/source/js/jquery.scrollTo.min.js\"></script>
<script src=\"/source/js/jquery.cookie.js\"></script>
<script type=\"text/javascript\" src=\"");
        // line 57
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"/source/js/sound_manager/soundmanager2-nodebug-jsmin.js\"></script>
<!--<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\"></script>-->
<script type=\"text/javascript\">
    \$(document).ready(function(\$) {
        \$('input,select').styler();

        \$(\".sidebar-nav\").click(function(event){
            event.stopPropagation();
        })

        var window_width = parseInt(\$(window).width()) + parseInt(scrollbarWidth(false,true));
        if (window_width >= 1100)
        {
            if (\$.cookie('sidebar') == \"toggled\") \$(\"#wrapper\").addClass('toggled');
        }

        \$(\"#sidebar-wrapper\").click(function(e) {
            \$(\"#wrapper\").toggleClass(\"toggled\");
            if (window_width >= 1100)
            {
                var c_tog = false;
                if (\$(\"#wrapper\").hasClass('toggled')) c_tog = 'toggled';
                \$.cookie('sidebar', c_tog, { expires: 30, path: '/' });
            }
        });

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
        // line 103
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "message_server"), "html", null, true));
        echo \layout::func_from_text("\",
        uniq_key: \"");
        // line 104
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "uniq_key"), "html", null, true));
        echo \layout::func_from_text("\",
        name: \"");
        // line 105
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
        echo \layout::func_from_text("\",
        id: \"");
        // line 106
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"), "html", null, true));
        echo \layout::func_from_text("\"
    }
</script>
");
        // line 109
        $this->displayBlock('js', $context, $blocks);
        // line 111
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 18
    public function block_css($context, array $blocks = array())
    {
        // line 19
        echo \layout::func_from_text("    ");
    }

    // line 25
    public function block_menu($context, array $blocks = array())
    {
        // line 26
        echo \layout::func_from_text("    ");
        $this->env->loadTemplate("/source/menu.html")->display($context);
        // line 27
        echo \layout::func_from_text(" ");
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
    }

    // line 109
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
        return array (  195 => 109,  190 => 34,  186 => 27,  183 => 26,  180 => 25,  176 => 19,  173 => 18,  168 => 4,  163 => 111,  161 => 109,  155 => 106,  151 => 105,  147 => 104,  143 => 103,  94 => 57,  82 => 48,  67 => 35,  65 => 34,  57 => 28,  55 => 25,  48 => 20,  46 => 18,  29 => 4,  24 => 1,);
    }
}
