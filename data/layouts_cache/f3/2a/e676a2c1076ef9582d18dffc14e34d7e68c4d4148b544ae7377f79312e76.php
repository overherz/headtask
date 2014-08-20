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
    <li class=\"active\"><a href=\"#tabs-1\">Лента</a></li>
    <li><a href=\"#tabs-2\">Статистика</a></li>
</ul>

<div class=\"tab-content\">
    <div id=\"tabs-1\" class=\"tab-pane fade in active\">
        <form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:0;\" path=\"/projects/logs/\">
            <input type=\"hidden\" name=\"page\" value=\"\">
            <input type=\"hidden\" name=\"project\" value=\"");
        // line 37
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
            Тип <select name=\"type\">
                <option>&nbsp;</option>
                ");
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 41
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
        // line 43
        echo \layout::func_from_text("            </select>&nbsp;
            <i class=\"fa fa-calendar\"></i> <input type=\"text\" name=\"start\" value=\"");
        // line 44
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly> <i class=\"fa fa-arrow-right\"></i> <input type=\"text\" name=\"end\" value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly>
        </form>

        <div id=\"search_result\">
            ");
        // line 48
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.html"), "method"));
        $template->display($context);
        // line 49
        echo \layout::func_from_text("        </div>
    </div>
    <div id=\"tabs-2\" class=\"tab-pane\">
        <table class=\"table review_table table-condensed table-border\">
            <tr>
                <td class=\"left_column\" style=\"vertical-align: top !important;padding: 0;width: 50%;\">
                    <table class=\"table-condensed table_statistic\">
                        <tr>
                            <td class=\"first\">Задачи</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 59
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
        echo \layout::func_from_text(" :
                                <span class=\"label label-info\">");
        // line 60
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 61
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 62
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                                <span class=\"label label-info\">");
        // line 63
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                            </td>
                        </tr>
                        ");
        // line 66
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 67
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Открытые задачи <br>по меткам</td>
                                <td>
                                    ");
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 71
                echo \layout::func_from_text("                                        <a href=\"/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/?cat=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"list-group-item\">
                            <span class=\"label label-cat\" style=\"margin-right: 20px;background: ");
                // line 72
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">
                                ");
                // line 73
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                            </span>
                                            <span class=\"label label-info pull-right\" style=\"margin-top: 3px;\">");
                // line 75
                echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array"), "0")) : ("0")), "html", null, true));
                echo \layout::func_from_text("</span>
                                        </a>
                                    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo \layout::func_from_text("                                </td>
                            </tr>
                        ");
        }
        // line 81
        echo \layout::func_from_text("                        ");
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 82
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Новости</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 85
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_news", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 89
        echo \layout::func_from_text("                        <tr>
                            <td class=\"first\">Файлы</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 92
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_files", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0))), "html", null, true));
        if ($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size")) {
            echo \layout::func_from_text(", общим размером <span class=\"label label-info\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size"), "html", null, true));
            echo \layout::func_from_text("</span>");
        }
        // line 93
        echo \layout::func_from_text("                            </td>
                        </tr>
                        ");
        // line 95
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 96
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Участники</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 99
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_users", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 103
        echo \layout::func_from_text("                        <tr>
                            <td class=\"first\">Wiki</td>
                            <td>
                                <span class=\"label label-info\">");
        // line 106
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_docs", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                            </td>
                        </tr>
                        ");
        // line 109
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 110
            echo \layout::func_from_text("                            <tr>
                                <td class=\"first\">Форум</td>
                                <td>
                                    <span class=\"label label-info\">");
            // line 113
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_forums", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                    <span class=\"label label-info\">");
            // line 114
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_topics", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                    <span class=\"label label-info\">");
            // line 115
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_posts", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                                </td>
                            </tr>
                        ");
        }
        // line 119
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
        return array (  315 => 119,  306 => 115,  300 => 114,  294 => 113,  289 => 110,  287 => 109,  279 => 106,  274 => 103,  265 => 99,  260 => 96,  258 => 95,  254 => 93,  245 => 92,  240 => 89,  231 => 85,  226 => 82,  223 => 81,  218 => 78,  209 => 75,  204 => 73,  198 => 72,  191 => 71,  187 => 70,  182 => 67,  180 => 66,  172 => 63,  166 => 62,  160 => 61,  154 => 60,  148 => 59,  136 => 49,  133 => 48,  124 => 44,  121 => 43,  110 => 41,  106 => 40,  100 => 37,  87 => 26,  82 => 23,  73 => 22,  67 => 21,  60 => 16,  58 => 15,  55 => 14,  52 => 13,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
