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
<div id=\"wrapper\" ");
        // line 20
        if (($this->getAttribute((isset($context["cookie_data"]) ? $context["cookie_data"] : null), "sidebar") == "toggled")) {
            echo \layout::func_from_text("class=\"toggled\" ");
        }
        echo \layout::func_from_text(">

");
        // line 22
        $this->displayBlock('menu', $context, $blocks);
        // line 25
        echo \layout::func_from_text("
    <!-- Page Content -->
    <div id=\"page-content-wrapper\">
        <div class=\"container-fluid\" style=\"padding: 0\">
            <div class=\"row\" style=\"margin-right: 0;\">
                <div class=\"col-lg-12\" style=\"padding-right: 0;\" id=\"pajax\">
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


<script src=\"/source/js/jquery.pjax.js\"></script>


<script src=\"");
        // line 56
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/", 1 => "functions.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"//yastatic.net/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
<!--<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\"></script>-->
<script type=\"text/javascript\">
    \$(document).ready(function(\$) {
        //\$(document).pjax('.pajax', '#pajax');

        if (\$.support.pjax) {
            \$(document).on('click', '.pajax', function(event) {
                var container = \$(\"#pajax\");
                \$.pjax.click(event, {container: container})
            })
        }

        \$(document).on('pjax:complete', function() {
            \$('input,select').styler();
        })

        \$('input,select').styler();

        ");
        // line 76
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) {
            // line 77
            echo \layout::func_from_text("
        var window_width = get_window_width();

        \$(\".sidebar-brand a\").click(function(e) {
            e.stopPropagation();
        });

        var id_dropdown;
        \$(\".dropdown\").click(function(e){
            window_width = get_window_width();
            if (\$(\"#wrapper\").hasClass('toggled') || window_width < 1100)
            {
                e.preventDefault();
                var this_id_dropdown = \$(this).data('dropdown');
                hide_sudmenu();

                if (id_dropdown != this_id_dropdown)
                {
                    id_dropdown = this_id_dropdown;
                    var position = \$(this).position();
                    var html = \$(\".dropdown\"+id_dropdown).clone().addClass('clone').show();
                    html.find(\"a,li\").show();
                    if (\$(this).find('.menu_projects_').length == 0) html.css('paddingTop',position.top);
                    \$(this).css('backgroundColor','#333');
                    show_overlay();
                    \$(\"body\").append(html);
                }
                else id_dropdown = false;
            }
        });

        \$(document).on('click','#overlay',function(){
            hide_sudmenu();
            id_dropdown = false;
        });

        \$(\".sidebar-brand\").click(function(e) {
            window_width = get_window_width();
            if (window_width >= 1100)
            {
                hide_sudmenu();
                id_dropdown = false;

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
        // line 144
        echo \layout::func_from_text("    });

    function hide_sudmenu()
    {
        var clones = \$(\".submenu.clone\");
        if (clones.length > 0)
        {
            clones.remove();
            hide_overlay();
            \$(\".dropdown\").css('backgroundColor','');
        }
    }

    ");
        // line 157
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) {
            // line 158
            echo \layout::func_from_text("    window.ms = {
        address: \"");
            // line 159
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "message_server"), "html", null, true));
            echo \layout::func_from_text("\",
        uniq_key: \"");
            // line 160
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "uniq_key"), "html", null, true));
            echo \layout::func_from_text("\",
        name: \"");
            // line 161
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
            echo \layout::func_from_text("\",
        id: \"");
            // line 162
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"), "html", null, true));
            echo \layout::func_from_text("\"
    }
    ");
        }
        // line 165
        echo \layout::func_from_text("</script>
");
        // line 166
        $this->displayBlock('js', $context, $blocks);
        // line 168
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

    // line 166
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
        return array (  297 => 166,  292 => 31,  288 => 24,  285 => 23,  282 => 22,  278 => 16,  275 => 15,  270 => 4,  265 => 168,  263 => 166,  260 => 165,  254 => 162,  250 => 161,  246 => 160,  242 => 159,  239 => 158,  237 => 157,  222 => 144,  153 => 77,  151 => 76,  128 => 56,  120 => 50,  115 => 48,  111 => 47,  107 => 46,  102 => 45,  100 => 44,  86 => 32,  84 => 31,  76 => 25,  74 => 22,  67 => 20,  62 => 17,  60 => 15,  55 => 13,  51 => 12,  47 => 11,  42 => 9,  29 => 4,  24 => 1,);
    }
}
