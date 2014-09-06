<?php

/* /core/dev_panel/dev_panel.html */
class __TwigTemplate_1ed4a2045d75d3fceaa2f88f60468fd59b677ffe12bdadb12215d51300ae8761 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("    <link rel=\"stylesheet\" href=\"/core/dev_panel/dev_panel.css\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"/source/css/plugins.css\" type=\"text/css\" />
    <style>
        .dev_panel_name {
            background: ");
        // line 5
        if (((isset($context["count_error"]) ? $context["count_error"] : null) || (isset($context["errors"]) ? $context["errors"] : null))) {
            echo \layout::func_from_text("darkred");
        } else {
            echo \layout::func_from_text("#000");
        }
        echo \layout::func_from_text(";
        }
    </style>
    <script type=\"text/javascript\" src=\"/core/dev_panel/dev_panel.js\"></script>
    <div class=\"dev_panel_wrapper\">
    ");
        // line 10
        if ((!(isset($context["to_email"]) ? $context["to_email"] : null))) {
            // line 11
            echo \layout::func_from_text("    <table cellspacing='0' cellpadding='0' style='width:100%;height:10px;'>
    <tr>
        <td class=\"dev_panel_name\" colspan=\"3\">Developer's Panel
            <a style=\"float: right;\" class=\"dev_panel_options_link\">Опции</a>
            <div class=\"dev_panel_options\">
                Запросы в одну строку: <input type='checkbox' id=\"queries_one_line\"><br/><br/>
                <form action='/core/repository/new_app.php' method='get' style='display:inline;'>
                    Новый модуль: <input type='text' name='app_name' value='' class=\"dev_panel_input\" />
                    <input type='submit' value='Создать' class=\"dev_panel_button\" />
                </form>
            </div>
        </td>
    </tr>
    </table>
    ");
        }
        // line 26
        echo \layout::func_from_text("    <div id='dev_panel'>
        <div>
            <div class=\"queries_tab hover\" mode=\"dev_panel_queries\" style=\"float:left;\">GET -
                Время (мс) - <span class=\"dev_panel_red\"> ");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["time"]) ? $context["time"] : null), "html", null, true));
        echo \layout::func_from_text("</span>
                Память (мб) - <span class=\"dev_panel_red\"> ");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["memory"]) ? $context["memory"] : null), "html", null, true));
        echo \layout::func_from_text("</span>
                Пик памяти (мб) - <span class=\"dev_panel_red\"> ");
        // line 31
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["memory_peak"]) ? $context["memory_peak"] : null), "html", null, true));
        echo \layout::func_from_text("</span>
                <div style=\"background:#F08080;float: right;padding: 2px 10px;margin:-2px 0;color:darkred !important;\">Ошибок (");
        // line 32
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("count_error", $context)) ? (_twig_default_filter((isset($context["count_error"]) ? $context["count_error"] : null), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text(")</div>
                <div style=\"float: right;padding-right: 10px;padding-left: 10px;\">Запросы (");
        // line 33
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count_queries"]) ? $context["count_queries"] : null), "html", null, true));
        echo \layout::func_from_text(")</div>
            </div>
            ");
        // line 35
        if ((!(isset($context["to_email"]) ? $context["to_email"] : null))) {
            echo \layout::func_from_text("<div class=\"queries_tab\" mode=\"dev_panel_ajax_queries\" style=\"float:right;\">AJAX -
                Время (мс) - <span class=\"dev_panel_red dev_panel_time\">0</span>
                Память (мб) - <span class=\"dev_panel_red dev_panel_memory\">0</span>
                Пик памяти (мб) - <span class=\"dev_panel_red dev_panel_memory_peak\">0</span>
                <div style=\"background:#F08080;float: right;padding: 2px 10px;margin:-2px 0;color:darkred !important;\">Ошибок (<span id=\"dev_panel_ajax_count_ajax_error\">0</span>)</div>
                <div style=\"float: right;padding-right: 10px;padding-left: 10px;\">Запросы (<span id=\"dev_panel_ajax_count_queries\">0</span>)</div>
            </div>
            ");
        }
        // line 43
        echo \layout::func_from_text("        </div>
        <div style=\"clear:both;\"></div>
        ");
        // line 45
        if ((!(isset($context["to_email"]) ? $context["to_email"] : null))) {
            // line 46
            echo \layout::func_from_text("            <div class=\"dev_panel_ajax_queries\" style=\"display:none;\">
                <div class=\"dev_errors\"></div>
                <div class=\"dev_queries\"><b style=\"margin: 5px;\">Запросы отсутствуют</b></div>
            </div>
        ");
        }
        // line 51
        echo \layout::func_from_text("        <div class=\"dev_panel_queries\">
            <div class=\"dev_errors\">
                ");
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["er"]) {
            // line 54
            echo \layout::func_from_text("                <div class=\"");
            if ($this->getAttribute((isset($context["er"]) ? $context["er"] : null), "type")) {
                echo \layout::func_from_text("fatal_error");
            } else {
                echo \layout::func_from_text("warning_error");
            }
            echo \layout::func_from_text("\" ");
            if ((isset($context["to_email"]) ? $context["to_email"] : null)) {
                echo \layout::func_from_text("style='font-weight:bold;color:darkred;'");
            }
            echo \layout::func_from_text(">
                    <div>");
            // line 55
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["er"]) ? $context["er"] : null), "err"), "html", null, true));
            echo \layout::func_from_text("</div>
                    <div>file ");
            // line 56
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["er"]) ? $context["er"] : null), "file"), "html", null, true));
            echo \layout::func_from_text(" line ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["er"]) ? $context["er"] : null), "line"), "html", null, true));
            echo \layout::func_from_text("</div>
                </div>
                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['er'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo \layout::func_from_text("            </div>
            <div class=\"dev_queries\">");
        // line 60
        $this->env->loadTemplate("/core/dev_panel/queries.html")->display($context);
        echo \layout::func_from_text("</div>
        </div>
    </div>");
    }

    public function getTemplateName()
    {
        return "/core/dev_panel/dev_panel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 60,  142 => 59,  131 => 56,  114 => 54,  82 => 35,  73 => 32,  65 => 30,  39 => 11,  37 => 10,  108 => 23,  94 => 22,  57 => 11,  50 => 9,  27 => 6,  120 => 26,  98 => 23,  93 => 43,  88 => 20,  80 => 18,  72 => 15,  59 => 11,  56 => 26,  28 => 7,  26 => 6,  78 => 9,  30 => 5,  22 => 2,  92 => 20,  84 => 18,  77 => 33,  74 => 16,  66 => 13,  58 => 10,  52 => 8,  48 => 6,  45 => 6,  25 => 5,  21 => 2,  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 39,  127 => 55,  125 => 33,  121 => 31,  112 => 29,  104 => 27,  99 => 46,  91 => 21,  86 => 20,  76 => 17,  67 => 17,  49 => 16,  38 => 9,  35 => 12,  19 => 1,  237 => 111,  232 => 31,  228 => 24,  225 => 23,  222 => 22,  218 => 16,  215 => 15,  210 => 4,  205 => 113,  203 => 111,  200 => 110,  194 => 107,  190 => 54,  186 => 105,  182 => 104,  179 => 103,  177 => 102,  173 => 100,  130 => 59,  128 => 58,  118 => 51,  115 => 50,  110 => 53,  106 => 51,  102 => 26,  97 => 45,  95 => 44,  81 => 19,  79 => 18,  71 => 18,  69 => 31,  62 => 13,  60 => 12,  55 => 9,  47 => 8,  42 => 5,  29 => 4,  24 => 3,  75 => 8,  70 => 18,  68 => 15,  63 => 14,  61 => 29,  54 => 10,  51 => 12,  44 => 7,  41 => 14,  34 => 3,  31 => 11,);
    }
}
