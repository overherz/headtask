<?php

/* applications/projects/layouts/review.html */
class __TwigTemplate_f32ae676a2c1076ef9582d18dffc14e34d7e68c4d4148b544ae7377f79312e76 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
");
    }

    // line 13
    public function block_project_data($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("
");
        // line 15
        if (($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description") || $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"))) {
            // line 16
            echo \layout::func_from_text("<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <h3 class=\"panel-title\">Описание проекта</h3>
    </div>
    <div class=\"panel-body\">
        ");
            // line 21
            if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description")) {
                echo \layout::func_from_text("<div>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description"), "html", null, true));
                echo \layout::func_from_text("</div>");
            }
            // line 22
            echo \layout::func_from_text("        ");
            if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url")) {
                echo \layout::func_from_text("<div><a href=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("</a></div>");
            }
            // line 23
            echo \layout::func_from_text("    </div>
</div>
");
        }
        // line 26
        echo \layout::func_from_text("

<ul class=\"nav nav-tabs\" id=\"form_tabs\">
    ");
        // line 29
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            echo \layout::func_from_text("<li class=\"active\"><a href=\"#tabs-1\">Лента</a></li>");
        }
        // line 30
        echo \layout::func_from_text("    <li><a href=\"#tabs-2\">Статистика</a></li>
</ul>

<div class=\"tab-content\">
    ");
        // line 34
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 35
            echo \layout::func_from_text("    <div id=\"tabs-1\" class=\"tab-pane fade in active\">
        <form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:0;\" path=\"/projects/logs/\">
            <input type=\"hidden\" name=\"page\" value=\"\">
            <input type=\"hidden\" name=\"project\" value=\"");
            // line 38
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
            Тип <select name=\"type\">
                <option>&nbsp;</option>
                ");
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 42
                echo \layout::func_from_text("                    <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . (isset($context["i"]) ? $context["i"] : null))), "html", null, true));
                echo \layout::func_from_text("</option>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo \layout::func_from_text("            </select>&nbsp;
            <i class=\"fa fa-calendar\"></i> <input type=\"text\" name=\"start\" value=\"");
            // line 45
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly> <i class=\"fa fa-arrow-right\"></i> <input type=\"text\" name=\"end\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly>
        </form>

        <div id=\"search_result\">
            ");
            // line 49
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.html"), "method"));
            $template->display($context);
            // line 50
            echo \layout::func_from_text("        </div>
    </div>
    ");
        }
        // line 53
        echo \layout::func_from_text("    <div id=\"tabs-2\" class=\"tab-pane ");
        if ((!(isset($context["logs"]) ? $context["logs"] : null))) {
            echo \layout::func_from_text("fade in active");
        }
        echo \layout::func_from_text("\">
        <table class=\"table review_table table-condensed table-border\">
            <tr>
                <td class=\"left_column\" style=\"vertical-align: top !important;padding: 0;width: 50%;\">
                    <table class=\"table-condensed table_statistic\">
                        <tr>
                            <td class=\"first\">Задачи</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 61
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
        echo \layout::func_from_text(" :
                                <span class=\"label label-info\">");
        // line 62
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 63
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 64
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 65
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                            </td>
                        </tr>
                        ");
        // line 68
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 69
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Открытые задачи <br>по меткам</td>
                                <td>
                                    ");
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 73
                echo \layout::func_from_text("                                        <a href=\"/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/?cat=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"list-group-item\">
                            <span class=\"label label-cat\" style=\"margin-right: 20px;background: ");
                // line 74
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">
                                ");
                // line 75
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                            </span>
                                            <span class=\"label label-info pull-right\" style=\"margin-top: 3px;\">");
                // line 77
                echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array"), "0")) : ("0")), "html", null, true));
                echo \layout::func_from_text("</span>
                                        </a>
                                    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo \layout::func_from_text("                                </td>
                            </tr>
                        ");
        }
        // line 83
        echo \layout::func_from_text("                        ");
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 84
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Новости</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 87
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_news", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 91
        echo \layout::func_from_text("                        <tr>
                            <td class=\"first\">Файлы</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 94
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_files", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0))), "html", null, true));
        if ($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size")) {
            echo \layout::func_from_text(", общим размером <span class=\"label label-info\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size"), "html", null, true));
            echo \layout::func_from_text("</span>");
        }
        // line 95
        echo \layout::func_from_text("                            </td>
                        </tr>
                        ");
        // line 97
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 98
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Участники</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 101
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_users", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 105
        echo \layout::func_from_text("                        <tr>
                            <td class=\"first\">Wiki</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 108
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_docs", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                            </td>
                        </tr>
                        ");
        // line 111
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 112
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Форум</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 115
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_forums", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                    <span class=\"label label-info\">");
            // line 116
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_topics", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                    <span class=\"label label-info\">");
            // line 117
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_posts", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 121
        echo \layout::func_from_text("                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/review.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  331 => 121,  322 => 117,  316 => 116,  310 => 115,  305 => 112,  303 => 111,  295 => 108,  290 => 105,  281 => 101,  276 => 98,  274 => 97,  270 => 95,  261 => 94,  256 => 91,  247 => 87,  242 => 84,  239 => 83,  234 => 80,  225 => 77,  220 => 75,  214 => 74,  207 => 73,  203 => 72,  198 => 69,  196 => 68,  188 => 65,  182 => 64,  176 => 63,  170 => 62,  164 => 61,  150 => 53,  145 => 50,  142 => 49,  133 => 45,  130 => 44,  119 => 42,  115 => 41,  109 => 38,  104 => 35,  102 => 34,  96 => 30,  92 => 29,  87 => 26,  82 => 23,  73 => 22,  67 => 21,  60 => 16,  58 => 15,  55 => 14,  52 => 13,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
