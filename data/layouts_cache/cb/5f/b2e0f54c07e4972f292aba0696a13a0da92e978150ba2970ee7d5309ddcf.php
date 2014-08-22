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
    <link type=\"text/css\" href=\"http://jscrollpane.kelvinluck.com/style/jquery.jscrollpane.css\" rel=\"stylesheet\" media=\"all\" />
    ");
        // line 17
        $this->displayBlock('css', $context, $blocks);
        // line 19
        echo \layout::func_from_text("</head>

<body>
<div id=\"wrapper\">

    <!-- Sidebar -->
    <div id=\"sidebar-wrapper\">
        <ul class=\"sidebar-nav\">
            <li class=\"sidebar-brand\">
                <span class=\"navbar-brand\" id=\"menu-toggle\">Task me!</span>
                <div style=\"position: absolute;top:0;right:5px;\">
                    <a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\" style=\"display: inline-block;\"><i class=\"fa fa-user\"></i></a>
                    <a href=\"/users/logout/\" id=\"logout\" style=\"display: inline-block;\"><i class=\"fa fa-power-off\"></i></a>
                </div>
            </li>

            ");
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
        foreach ($context['_seq'] as $context["k"] => $context["m"]) {
            // line 36
            echo \layout::func_from_text("                ");
            if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                // line 37
                echo \layout::func_from_text("                    ");
                if ((!$this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                    // line 38
                    echo \layout::func_from_text("                        <li ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), array(), "array"))) {
                        echo \layout::func_from_text("class=\"active\"");
                    }
                    echo \layout::func_from_text(">
                            <div style=\"position: relative;\"><a ");
                    // line 39
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "clickable") && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "application") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")))) {
                        echo \layout::func_from_text("href=\"");
                        if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")) {
                        }
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), "html", null, true));
                        echo \layout::func_from_text("\"");
                    } else {
                        echo \layout::func_from_text("href='javascript:void(0);'");
                    }
                    echo \layout::func_from_text(" class=\"menu");
                    echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), array("/" => "_")), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "new_window")) {
                        echo \layout::func_from_text("target=\"_blank\"");
                    }
                    echo \layout::func_from_text(">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a>
                        ");
                    // line 40
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                        // line 41
                        echo \layout::func_from_text("                            <div style=\"position: absolute;top:0;right:5px;\">
                                ");
                        // line 42
                        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_own_project"))) {
                            // line 43
                            echo \layout::func_from_text("                                    <a href=\"/projects/add/\" class=\"");
                            if ((isset($context["add"]) ? $context["add"] : null)) {
                                echo \layout::func_from_text("active");
                            }
                            echo \layout::func_from_text("\" style=\"display: inline-block;text-indent: 2px;padding-right: 4px;\"><i class=\"fa fa-plus\"></i></a>
                                ");
                        }
                        // line 45
                        echo \layout::func_from_text("                                <a href=\"/projects/all/\" class=\"");
                        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
                            echo \layout::func_from_text("active");
                        }
                        echo \layout::func_from_text("\" style=\"display: inline-block;text-indent: 2px;padding-right: 4px;\" title=\"Все проекты\"><i class=\"fa fa-book\"></i></a>
                            </div>
                        ");
                    }
                    // line 47
                    echo \layout::func_from_text("</div>
                        </li>
                        ");
                    // line 49
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                        // line 50
                        echo \layout::func_from_text("                            <div id=\"project_panel_result\">[[projects__get_projects]]</div>

                            <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                                <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                                <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                                <input type=\"hidden\" name=\"id_project\" value=\"");
                        // line 55
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\">
                            </form>
                        ");
                    }
                    // line 58
                    echo \layout::func_from_text("                    ");
                } else {
                    // line 59
                    echo \layout::func_from_text("                        <li class=\"dropdown\">
                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">");
                    // line 60
                    echo \layout::func_from_text($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"));
                    echo \layout::func_from_text(" <b class=\"caret\"></b></a>
                            <ul class=\"dropdown-menu\">
                                ");
                    // line 62
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                        // line 63
                        echo \layout::func_from_text("                                    <li><a ");
                        if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "clickable")) {
                            echo \layout::func_from_text("href=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), "html", null, true));
                            echo \layout::func_from_text("\"");
                        } else {
                            echo \layout::func_from_text("href='javascript:void(0);'");
                        }
                        echo \layout::func_from_text(" class=\"");
                        if (($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), array(), "array"))) {
                            echo \layout::func_from_text("active");
                        }
                        echo \layout::func_from_text("\">");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
                        echo \layout::func_from_text("</a></li>
                                ");
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 65
                    echo \layout::func_from_text("                            </ul>
                        </li>
                    ");
                }
                // line 68
                echo \layout::func_from_text("                ");
            }
            // line 69
            echo \layout::func_from_text("            ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo \layout::func_from_text("        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id=\"page-content-wrapper\">
        <div class=\"container-fluid\" style=\"padding: 0\">
            <div class=\"row\" style=\"margin-right: 0;\">
                <div class=\"col-lg-12\" style=\"padding-right: 0;\">
                ");
        // line 79
        $this->displayBlock('body', $context, $blocks);
        // line 80
        echo \layout::func_from_text("                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->



<script src=\"http://yandex.st/jquery/2.1.1/jquery.min.js\"></script>
<script src=\"http://yandex.st/jquery-ui/1.10.4/jquery-ui.min.js\"></script>
<script src=\"/source/js/jquery.jgrowl.min.js\"></script>
<script src=\"/source/js/functions.js\"></script>
<script src=\"/source/js/message.js\"></script>
<script src=\"http://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
<script src=\"/source/js/styler/jquery.formstyler.min.js\"></script>
<script src=\"/source/js/socket.io/socket.io.js\"></script>
<script src=\"/source/js/jquery.scrollTo.min.js\"></script>
<script type=\"text/javascript\" src=\"");
        // line 100
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<!--<script src=\"");
        // line 101
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "client.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>-->
<script src=\"/source/js/sound_manager/soundmanager2-nodebug-jsmin.js\"></script>
<!--<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\"></script>-->
<script type=\"text/javascript\">
    \$(document).ready(function(\$) {
        \$('input,select').styler();

        \$(\"#menu-toggle\").click(function(e) {
            \$(\"#wrapper\").toggleClass(\"toggled\");
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
        // line 131
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "message_server"), "html", null, true));
        echo \layout::func_from_text("\",
        uniq_key: \"");
        // line 132
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "uniq_key"), "html", null, true));
        echo \layout::func_from_text("\"
    }
</script>
");
        // line 135
        $this->displayBlock('js', $context, $blocks);
        // line 137
        echo \layout::func_from_text("</body>
</html>");
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 17
    public function block_css($context, array $blocks = array())
    {
        // line 18
        echo \layout::func_from_text("    ");
    }

    // line 79
    public function block_body($context, array $blocks = array())
    {
    }

    // line 135
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
        return array (  300 => 135,  295 => 79,  291 => 18,  288 => 17,  283 => 4,  278 => 137,  276 => 135,  270 => 132,  266 => 131,  233 => 101,  229 => 100,  207 => 80,  205 => 79,  194 => 70,  188 => 69,  185 => 68,  180 => 65,  159 => 63,  155 => 62,  150 => 60,  147 => 59,  144 => 58,  138 => 55,  131 => 50,  129 => 49,  125 => 47,  116 => 45,  108 => 43,  106 => 42,  103 => 41,  101 => 40,  81 => 39,  74 => 38,  71 => 37,  68 => 36,  64 => 35,  46 => 19,  44 => 17,  28 => 4,  23 => 1,);
    }
}
