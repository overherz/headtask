<?php

/* /source/admin/index.html */
class __TwigTemplate_a97a428f7fd1dd1c8eb1bde62761ff19a22e25c9f24f7d0404e89c79304b6bb6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Панель управления сайтом</title>

    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" media=\"screen, projection\" />
    <link rel=\"stylesheet\" href=\"/source/css/popup.css\" type=\"text/css\" media=\"screen, projection\" />
    <link href=\"http://yandex.st/bootstrap/3.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/source/admin/fonts/font-awesome/css/font-awesome.minba72.css?v=4.0.3\" rel=\"stylesheet\">
    <link href=\"/source/admin/css/libs/animate.min.css\" rel=\"stylesheet\">
    <link href=\"/source/admin/css/libs/bootstrap-switch.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/source/js/styler/jquery.formstyler.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/smoothness/jquery-ui-1.10.4.custom.css\" type=\"text/css\">
    <link href=\"/source/admin/css/styler/style.css\" rel=\"stylesheet\" type=\"text/css\">
    ");
        // line 17
        $this->displayBlock('css', $context, $blocks);
        // line 18
        echo \layout::func_from_text("
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
    <![endif]-->
</head>

<body>
<div class=\"top_div\">
    <i class=\"navbar-toggle2 fa fa-bars\" data-toggle=\"side-menu\" data-target=\"#sidebar\"></i>
    <span>Панель управления сайтом <a href=\"/\" target=\"_blank\">");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "site_name"), "value"), "html", null, true));
        echo \layout::func_from_text("</a></span>
</div>

<div id=\"wrapper\">
    <div id=\"sidebar\">
        <div class=\"inner\">
            <nav class=\"side-nav\">
                <ul class=\"nav nav-pills nav-stacked user-bar\">
                    <li>
                        <a href=\"#user-menu\" data-toggle=\"collapse\" class=\"dropdown-toggle\">
                                <div class=\"user-name\">");
        // line 39
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "fio"), "html", null, true));
        echo \layout::func_from_text("</div>
                                <div class=\"\" style=\"color:");
        // line 40
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "group_color"), "html", null, true));
        echo \layout::func_from_text(";margin-bottom: 0px;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "group_name"), "html", null, true));
        echo \layout::func_from_text("</div>
                            <b class=\"caret\"></b>
                        </a>
                        <ul class=\"panel-collapse collapse\" id=\"user-menu\">
                            <li><a href=\"\" change_admin_pass><i class=\"fa fa-user\"></i> Изменить пароль</a></li>
                            <li><a href=\"/admin/index/logout/\"><i class=\"fa fa-sign-out\"></i> Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            ");
        // line 50
        $context["submenu"] = "";
        // line 51
        echo \layout::func_from_text("            ");
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "root_menu"));
        foreach ($context['_seq'] as $context["k"] => $context["r_m"]) {
            // line 52
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "submenu") && ((isset($context["k"]) ? $context["k"] : null) == $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu")))) {
                $context["submenu"] = $this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "submenu");
            }
            // line 53
            echo \layout::func_from_text("            ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['r_m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo \layout::func_from_text("
            <nav class=\"side-nav\">
                <ul class=\"nav nav-pills nav-stacked\">
                    ");
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["submenu"]) ? $context["submenu"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 58
            echo \layout::func_from_text("                        ");
            if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "count") > 1) && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category") != ""))) {
                // line 59
                echo \layout::func_from_text("                            ");
                if (((isset($context["category"]) ? $context["category"] : null) != $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                    // line 60
                    echo \layout::func_from_text("                                ");
                    $context["count"] = 1;
                    // line 61
                    echo \layout::func_from_text("                                <li>
                                    <a href=\"#");
                    // line 62
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"), "html", null, true));
                    echo \layout::func_from_text("\" data-toggle=\"collapse\" data-parent=\".side-nav\" class=\"collapsed\">
                                        <i class=\"fa fa-fw fa-15x ");
                    // line 63
                    if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "icon")) {
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "icon"), "html", null, true));
                    } else {
                        echo \layout::func_from_text("fa-list-ul");
                    }
                    echo \layout::func_from_text("\"></i>
                                        <span class=\"fa-12x\">");
                    // line 64
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"), "html", null, true));
                    echo \layout::func_from_text("</span> <b class=\"caret\"></b>
                                    </a>
                                <ul class=\"panel-collapse in\" id=\"");
                    // line 66
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"), "html", null, true));
                    echo \layout::func_from_text("\">
                            ");
                }
                // line 68
                echo \layout::func_from_text("                            ");
                $context["category"] = $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category");
                // line 69
                echo \layout::func_from_text("
                            <li ");
                // line 70
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url") == $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "submenu"))) {
                    echo \layout::func_from_text("class=\"active\"");
                }
                echo \layout::func_from_text("><a href=\"/admin/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-fw fa-arrow-right\" style=\"margin-top: -3px;\"></i> <span>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</span></a></li>

                            ");
                // line 72
                if (((isset($context["count"]) ? $context["count"] : null) == $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "count"))) {
                    // line 73
                    echo \layout::func_from_text("                                </ul></li>
                            ");
                } else {
                    // line 75
                    echo \layout::func_from_text("                                ");
                    $context["count"] = ((isset($context["count"]) ? $context["count"] : null) + 1);
                    // line 76
                    echo \layout::func_from_text("                            ");
                }
                // line 77
                echo \layout::func_from_text("                        ");
            } else {
                // line 78
                echo \layout::func_from_text("                            <li ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url") == $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "submenu"))) {
                    echo \layout::func_from_text("class=\"active\"");
                }
                echo \layout::func_from_text(">
                                <a href=\"/admin/");
                // line 79
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\">
                                    <i class=\"fa fa-fw fa-15x ");
                // line 80
                if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "icon")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "icon"), "html", null, true));
                } else {
                    echo \layout::func_from_text("fa-list-ul");
                }
                echo \layout::func_from_text("\"></i>
                                    <span class=\"fa-12x\">");
                // line 81
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</span>
                                </a>
                            </li>
                        ");
            }
            // line 85
            echo \layout::func_from_text("                    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo \layout::func_from_text("                </ul>
            </nav>
        </div>
    </div>
    <div id=\"middle\">
        <header id=\"header\">
            <nav class=\"navbar navbar-default\">
                <div class=\"navbar-switcher\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"side-menu\" data-target=\"#sidebar\">
                        <span class=\"sr-only\">Toggle Sidebar</span>
                        <i class=\"fa fa-bars\"></i>
                    </button>
                </div>

                <div class=\"navbar-switcher navbar-switcher-right\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#topnav\">
                        <span class=\"sr-only\">Toggle Menu</span>
                        <i class=\"fa fa-bars\"></i>
                    </button>
                </div>
                <div class=\"navbar-header\">
                </div>
                <div class=\"collapse navbar-collapse\" id=\"topnav\">
                    <ul class=\"nav navbar-nav\">
                        ");
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "root_menu"));
        foreach ($context['_seq'] as $context["k"] => $context["r_m"]) {
            // line 111
            echo \layout::func_from_text("                            <li ");
            if (($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu") == (isset($context["k"]) ? $context["k"] : null))) {
                echo \layout::func_from_text("class=\"active\"");
            }
            echo \layout::func_from_text(" style=\"position: relative;\">
                                <a href=\"");
            // line 112
            if ((!$this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "url"))) {
                echo \layout::func_from_text("/admin/~");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("/");
            } else {
                echo \layout::func_from_text("/admin/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("/");
            }
            echo \layout::func_from_text("\" title=\"title\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
                            </li>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['r_m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo \layout::func_from_text("                    </ul>
                </div>
            </nav>
        </header>
        <div id=\"content\">
            <div class=\"container\" style=\"position: relative\">
                <div id=\"for_popup\" style=\"position: absolute;top:0;left:0;background: #fff\"></div>
                <div id=\"under_popup\">");
        // line 122
        $this->displayBlock('body', $context, $blocks);
        echo \layout::func_from_text("</div>
            </div>
        </div>
    </div>
</div>

<script src=\"http://yandex.st/jquery/2.1.1/jquery.min.js\"></script>
<script src=\"http://yandex.st/bootstrap/3.1.1/js/bootstrap.min.js\"></script>

    <!-- jQuery Transit -->
    <script src=\"/source/admin/js/libs/jquery.transit.min692f.js?v=0.9.9\"></script>

    <!-- Bootstrap Switch -->
    <script src=\"/source/admin/js/libs/bootstrap-switch.js\"></script>

    <!-- jQuery EqualHeights -->
    <script src=\"/source/admin/js/libs/jquery.equalheights.min.js\"></script>

    <!-- jQuery Nicescroll -->
    <script src=\"/source/admin/js/libs/jquery.nicescroll.min.js\"></script>

    <!-- Theme script -->
    <script src=\"/source/admin/js/styler/script.js\"></script>

    <script src=\"/source/js/head.min.js\"></script>
    <script src=\"/source/js/styler/jquery.formstyler.js\"></script>
    <script>
        \$(document).ready(function(\$) {
            if(jQuery().styler) {
                \$('#middle input, #middle select').styler();
            }
        });
    </script>
    <script>
        head.js(
                \"http://yandex.st/jquery-ui/1.10.4/jquery-ui.min.js\",
                \"/source/js/jquery.jgrowl.min.js\",
                \"/source/js/functions.js\",
                \"/source/js/message.js\",
                \"");
        // line 161
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "index", 1 => "index_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
                ");
        // line 162
        $this->displayBlock('js', $context, $blocks);
        // line 163
        echo \layout::func_from_text("        );
    </script>

</body>
</html>");
    }

    // line 17
    public function block_css($context, array $blocks = array())
    {
    }

    // line 122
    public function block_body($context, array $blocks = array())
    {
    }

    // line 162
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/source/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  343 => 162,  338 => 122,  333 => 17,  325 => 163,  323 => 162,  319 => 161,  277 => 122,  268 => 115,  249 => 112,  242 => 111,  238 => 110,  212 => 86,  206 => 85,  199 => 81,  191 => 80,  187 => 79,  180 => 78,  177 => 77,  174 => 76,  171 => 75,  167 => 73,  165 => 72,  154 => 70,  151 => 69,  148 => 68,  143 => 66,  138 => 64,  130 => 63,  126 => 62,  123 => 61,  120 => 60,  117 => 59,  114 => 58,  110 => 57,  105 => 54,  94 => 52,  89 => 51,  87 => 50,  72 => 40,  68 => 39,  55 => 29,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 30,  118 => 28,  99 => 53,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 18,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 17,  35 => 3,  32 => 2,);
    }
}
