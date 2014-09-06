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
    <title>");
        // line 4
        $this->displayBlock('title', $context, $blocks);
        if ($this->renderBlock("title", $context, $blocks)) {
            echo \layout::func_from_text(" - ");
        }
        echo \layout::func_from_text(" ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "site_name"), "value"), "html", null, true));
        echo \layout::func_from_text("</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/css/", 1 => "plugins.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"//yastatic.net/bootstrap/3.1.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/admin/fonts/font-awesome/css/", 1 => "font-awesome.min.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\">
    <link rel=\"stylesheet\" href=\"");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/css/", 1 => "content.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/css/ui-lightness/", 1 => "jquery-ui-1.10.4.custom.min.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\" />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic'  type='text/css'>
    ");
        // line 15
        $this->displayBlock('css', $context, $blocks);
        // line 17
        echo \layout::func_from_text("</head>

<body>
<div id=\"wrapper\">

");
        // line 22
        $this->displayBlock('menu', $context, $blocks);
        // line 25
        echo \layout::func_from_text("
    <!-- Page Content -->
    <div id=\"page-content-wrapper\">
        <div class=\"container-fluid\" style=\"padding: 0\">
            <div class=\"row\" style=\"margin-right: 0;\">
                <div class=\"col-lg-12\" style=\"padding-right: 0;\">
                ");
        // line 31
        $this->displayBlock('body', $context, $blocks);
        // line 32
        echo \layout::func_from_text("                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->



<script src=\"//yastatic.net/jquery/2.1.1/jquery.min.js\"></script>
");
        // line 44
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) {
            // line 45
            echo \layout::func_from_text("    <script src=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/socket.io/", 1 => "socket.io.js", 2 => true), "method"), "html", null, true));
            echo \layout::func_from_text("\"></script>
    <script src=\"");
            // line 46
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/notifications/", 1 => "client.js", 2 => true), "method"), "html", null, true));
            echo \layout::func_from_text("\"></script>
    <script src=\"");
            // line 47
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects.js"), "method"), "html", null, true));
            echo \layout::func_from_text("\"></script>
    <script src=\"");
            // line 48
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/sound_manager/", 1 => "soundmanager2-nodebug-jsmin.js", 2 => true), "method"), "html", null, true));
            echo \layout::func_from_text("\"></script>
");
        }
        // line 50
        echo \layout::func_from_text("<script src=\"//yastatic.net/jquery-ui/1.10.4/jquery-ui.min.js\"></script>
<script src=\"");
        // line 51
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/", 1 => "functions.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"//yastatic.net/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
<!--<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\"></script>-->
<script type=\"text/javascript\">
    \$(document).ready(function(\$) {
        \$('input,select').styler();

        ");
        // line 58
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) {
            // line 59
            echo \layout::func_from_text("        \$(\".sidebar-nav\").click(function(event){
            event.stopPropagation();
        })

        var window_width = parseInt(\$(window).width()) + parseInt(scrollbarWidth(false,true));
        if (window_width >= 1100)
        {
            if (\$.cookie('sidebar') == \"toggled\") \$(\"#wrapper\").addClass('toggled');
        }

        \$(\".sidebar-brand a\").click(function(e) {
            e.stopPropagation();
        });

        \$(\".sidebar-brand\").click(function(e) {
            if (parseInt(\$(window).width()) + parseInt(scrollbarWidth(false,true)) >= 1100)
            {
                \$(\"#wrapper\").toggleClass(\"toggled\");
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
        ");
        }
        // line 100
        echo \layout::func_from_text("    });

    ");
        // line 102
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) {
            // line 103
            echo \layout::func_from_text("    window.ms = {
        address: \"");
            // line 104
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "message_server"), "html", null, true));
            echo \layout::func_from_text("\",
        uniq_key: \"");
            // line 105
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "uniq_key"), "html", null, true));
            echo \layout::func_from_text("\",
        name: \"");
            // line 106
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
            echo \layout::func_from_text("\",
        id: \"");
            // line 107
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"), "html", null, true));
            echo \layout::func_from_text("\"
    }
    ");
        }
        // line 110
        echo \layout::func_from_text("</script>
");
        // line 111
        $this->displayBlock('js', $context, $blocks);
        // line 113
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

    // line 22
    public function block_menu($context, array $blocks = array())
    {
        // line 23
        echo \layout::func_from_text("    ");
        $this->env->loadTemplate("/source/menu.html")->display($context);
        // line 24
        echo \layout::func_from_text(" ");
    }

    // line 31
    public function block_body($context, array $blocks = array())
    {
    }

    // line 111
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
        return array (  237 => 111,  232 => 31,  228 => 24,  225 => 23,  222 => 22,  218 => 16,  215 => 15,  210 => 4,  205 => 113,  203 => 111,  200 => 110,  194 => 107,  190 => 106,  186 => 105,  182 => 104,  179 => 103,  177 => 102,  173 => 100,  130 => 59,  128 => 58,  118 => 51,  115 => 50,  110 => 48,  106 => 47,  102 => 46,  97 => 45,  95 => 44,  81 => 32,  79 => 31,  71 => 25,  69 => 22,  62 => 17,  60 => 15,  55 => 13,  47 => 11,  42 => 9,  29 => 4,  24 => 1,  75 => 17,  70 => 18,  68 => 17,  63 => 14,  61 => 13,  54 => 10,  51 => 12,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
