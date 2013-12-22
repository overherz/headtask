<?php

/* /source/html/admin.html */
class __TwigTemplate_73dbd95efb0c96867139e2c634087b8c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'message' => array($this, 'block_message'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
\t<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
\t<title>Панель управления ");
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo \layout::func_from_text("</title>
\t<meta name=\"keywords\" content=\"\" />
\t<meta name=\"description\" content=\"\" />
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"stylesheet\" href=\"http://yandex.st/jquery-ui/1.10.3/themes/blitzer/jquery-ui.min.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" media=\"screen, projection\" />
    <link rel=\"stylesheet\" href=\"/source/css/popup.css\" type=\"text/css\" media=\"screen, projection\" />
    <link rel=\"stylesheet\" href=\"/source/css/admin.css\" type=\"text/css\" media=\"screen, projection\" />
    ");
        // line 14
        $this->displayBlock('css', $context, $blocks);
        // line 15
        echo \layout::func_from_text("    <script src=\"/source/js/head.min.js\"></script>
    <script src=\"http://yandex.st/jquery/1.10.2/jquery.min.js\"></script>
    <script>
        head.js(
         \"http://yandex.st/jquery-ui/1.10.3/jquery-ui.min.js\",
         \"/source/js/jquery.jgrowl_minimized.js\",
         \"/source/js/functions.js\",
         \"/applications/index/source/js/change_pass.js\",
         \"/source/js/message.js\",
         \"/applications/index/source/js/index_admin.js\"
         ");
        // line 25
        $this->displayBlock('js', $context, $blocks);
        // line 26
        echo \layout::func_from_text("         );
    </script>
</head>

<body>

<div id=\"wrapper\">
\t<div id=\"header\">
            <div id=\"topline-wrap\">
                <div id=\"topline-img\"></div>
                <div id=\"sitename\">Панель управления <a class=\"cityname\" href=\"/admin/index/logout/\">[выход]</a> <a href=\"/\" target=\"_blank\" class=\"cityname\">[перейти на сайт]</a></div>
            </div>
        <div id=\"middlehead\">
            <div id=\"logo\"><a href=\"http://www.cube-in-cube.ru\" target=\"_blank\" title=\"Куб в кубе. Создание и продвижение сайтов.\"><img src=\"/source/images/admin/logo.png\"/></a></div>
            <div id=\"hellotext\">
                Добро пожаловать,<br />
                <span class=\"user-fio\">");
        // line 42
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "fio"), "html", null, true));
        echo \layout::func_from_text("</span>
                &nbsp;[ <span style=\"color:");
        // line 43
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "group_color"), "html", null, true));
        echo \layout::func_from_text(";\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "group_name"), "html", null, true));
        echo \layout::func_from_text("</span> ]
                <br />
                <a href=\"\" change_admin_pass>изменить пароль</a>
            </div>
        </div>
\t</div>

\t<div id=\"middle\">
\t\t<div id=\"container\">
\t\t\t<div id=\"content\">
                <div id=\"mainmenu\">
                    <ul>
                        ");
        // line 55
        $context["submenu"] = "";
        // line 56
        echo \layout::func_from_text("                        ");
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "root_menu"));
        foreach ($context['_seq'] as $context["k"] => $context["r_m"]) {
            // line 57
            echo \layout::func_from_text("                        <li ");
            if (($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu") == (isset($context["k"]) ? $context["k"] : null))) {
                echo \layout::func_from_text("class=\"current\"");
            }
            echo \layout::func_from_text("><a href=\"");
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
            echo \layout::func_from_text("</a></li>
                            ");
            // line 58
            if (($this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "submenu") && ((isset($context["k"]) ? $context["k"] : null) == $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu")))) {
                $context["submenu"] = $this->getAttribute((isset($context["r_m"]) ? $context["r_m"] : null), "submenu");
            }
            // line 59
            echo \layout::func_from_text("                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['r_m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo \layout::func_from_text("                    </ul>
                </div>
                <div id=\"messagewrap\"><div class=\"message\">");
        // line 62
        $this->displayBlock('message', $context, $blocks);
        echo \layout::func_from_text("</div></div>
                <div id=\"realcont\">
                ");
        // line 64
        $this->displayBlock('body', $context, $blocks);
        // line 67
        echo \layout::func_from_text("                </div>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"sidebar\" id=\"sideLeft\">
            <div id=\"sidehead\">
                <div id=\"date\"><strong>");
        // line 73
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "d.m.Y"), "html", null, true));
        echo \layout::func_from_text("</strong></div>
                <a id=\"show_date\" title=\"Календарь\"></a>
            </div>
            <div id=\"sidecontent\">
                <ul id=\"leftmenu\">
                    ");
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["submenu"]) ? $context["submenu"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 79
            echo \layout::func_from_text("                    <li>
                        ");
            // line 80
            if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "count") > 1) && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category") != ""))) {
                // line 81
                echo \layout::func_from_text("                        ");
                if (((isset($context["category"]) ? $context["category"] : null) != $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                    echo \layout::func_from_text("<span style=\"margin-left: 5px;font-weight: bold;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"), "html", null, true));
                    echo \layout::func_from_text("</span>");
                }
                // line 82
                echo \layout::func_from_text("                        ");
                $context["category"] = $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category");
                $context["show_category"] = true;
                // line 83
                echo \layout::func_from_text("                        ");
            } else {
                // line 84
                echo \layout::func_from_text("                        ");
                $context["show_category"] = false;
                // line 85
                echo \layout::func_from_text("                        ");
            }
            // line 86
            echo \layout::func_from_text("                        <a href=\"/admin/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "url") == $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "submenu"))) {
                echo \layout::func_from_text("class=\"active\"");
            }
            echo \layout::func_from_text(" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">");
            if ((isset($context["show_category"]) ? $context["show_category"] : null)) {
                echo \layout::func_from_text(" – ");
            }
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
                    </li>
                    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo \layout::func_from_text("                </ul>
            </div>
\t\t</div>
\t</div>
</div>

</body>
</html>
");
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("&rarr;");
    }

    // line 14
    public function block_css($context, array $blocks = array())
    {
    }

    // line 25
    public function block_js($context, array $blocks = array())
    {
    }

    // line 62
    public function block_message($context, array $blocks = array())
    {
    }

    // line 64
    public function block_body($context, array $blocks = array())
    {
        // line 65
        echo \layout::func_from_text("
                ");
    }

    public function getTemplateName()
    {
        return "/source/html/admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 65,  243 => 64,  238 => 62,  233 => 25,  228 => 14,  222 => 5,  210 => 89,  189 => 86,  186 => 85,  183 => 84,  180 => 83,  176 => 82,  169 => 81,  167 => 80,  164 => 79,  160 => 78,  152 => 73,  144 => 67,  142 => 64,  137 => 62,  133 => 60,  127 => 59,  123 => 58,  104 => 57,  99 => 56,  97 => 55,  80 => 43,  76 => 42,  58 => 26,  56 => 25,  44 => 15,  30 => 5,  24 => 1,  65 => 14,  62 => 13,  59 => 12,  52 => 9,  49 => 8,  42 => 14,  39 => 5,  34 => 3,  31 => 2,);
    }
}
