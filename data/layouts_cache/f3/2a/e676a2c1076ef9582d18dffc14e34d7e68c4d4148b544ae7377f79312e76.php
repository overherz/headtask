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
");
    }

    // line 12
    public function block_project_data($context, array $blocks = array())
    {
        // line 13
        if (($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description") || $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"))) {
            // line 14
            echo \layout::func_from_text("<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <h3 class=\"panel-title\">Описание проекта</h3>
    </div>
    <div class=\"panel-body\">
        ");
            // line 19
            if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description")) {
                echo \layout::func_from_text("<div>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description"), "html", null, true));
                echo \layout::func_from_text("</div>");
            }
            // line 20
            echo \layout::func_from_text("        ");
            if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url")) {
                echo \layout::func_from_text("<div><a href=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("</a></div>");
            }
            // line 21
            echo \layout::func_from_text("    </div>
</div>
");
        }
        // line 24
        echo \layout::func_from_text("
<table class=\"table review_table table-condensed table-border\">
    <tr>
        <th class=\"left_column\">Статистика</th>
        ");
        // line 28
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")) && (isset($context["news"]) ? $context["news"] : null))) {
            echo \layout::func_from_text("<th>Последние новости</th>");
        }
        // line 29
        echo \layout::func_from_text("    </tr>
    <tr>
        <td class=\"left_column\" style=\"vertical-align: top !important;padding: 0;width: 50%;\">
            <table class=\"table-condensed table_statistic\">
                <tr>
                    <td class=\"first\">Задачи</td>
                    <td>
                        <span class=\"label label-info\">");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
        echo \layout::func_from_text(" :
                        <span class=\"label label-info\">");
        // line 37
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 38
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 39
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 40
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("

                        ");
        // line 42
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 43
            echo \layout::func_from_text("                        <div style=\"margin-top: 15px;\">
                        <div style=\"font-weight:bold;margin-bottom: 10px;\">Открытые задачи по категориям </div>
                        ");
            // line 45
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 46
                echo \layout::func_from_text("                            <a href=\"/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/?cat=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"list-group-item\">
                                <span class=\"label\" style=\"margin-right: 20px;background: ");
                // line 47
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">
                                    ");
                // line 48
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                                </span>
                                <span class=\"label label-info pull-right\" style=\"margin-top: 3px;\">");
                // line 50
                echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array"), "0")) : ("0")), "html", null, true));
                echo \layout::func_from_text("</span>
                            </a>
                        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo \layout::func_from_text("                        </div>
                        ");
        }
        // line 55
        echo \layout::func_from_text("                    </td>
                </tr>
                ");
        // line 57
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 58
            echo \layout::func_from_text("                <tr>
                    <td class=\"first\">Новости</td>
                    <td>
                        <span class=\"label label-info\">");
            // line 61
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_news", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "news"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                    </td>
                </tr>
                ");
        }
        // line 65
        echo \layout::func_from_text("                <tr>
                    <td class=\"first\">Файлы</td>
                    <td>
                        <span class=\"label label-info\">");
        // line 68
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_files", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files", array(), "any", false, true), "count"), 0)) : (0))), "html", null, true));
        if ($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size")) {
            echo \layout::func_from_text(", общим размером <span class=\"label label-info\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "files"), "sum_size"), "html", null, true));
            echo \layout::func_from_text("</span>");
        }
        // line 69
        echo \layout::func_from_text("                    </td>
                </tr>
                ");
        // line 71
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 72
            echo \layout::func_from_text("                <tr>
                    <td class=\"first\">Участники</td>
                    <td>
                        <span class=\"label label-info\">");
            // line 75
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_users", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "users"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                    </td>
                </tr>
                ");
        }
        // line 79
        echo \layout::func_from_text("                <tr>
                    <td class=\"first\">Wiki</td>
                    <td>
                        <span class=\"label label-info\">");
        // line 82
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_docs", (($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "docs"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                    </td>
                </tr>
                ");
        // line 85
        if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
            // line 86
            echo \layout::func_from_text("                <tr>
                    <td class=\"first\">Форум</td>
                    <td>
                        <span class=\"label label-info\">");
            // line 89
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_forums", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "forums_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                        <span class=\"label label-info\">");
            // line 90
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_topics", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "topics_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                        <span class=\"label label-info\">");
            // line 91
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_forum_posts", (($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats_other"]) ? $context["stats_other"] : null), "forum", array(), "any", false, true), "posts_count"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("
                    </td>
                </tr>
                ");
        }
        // line 95
        echo \layout::func_from_text("            </table>
        </td>
        ");
        // line 97
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")) && (isset($context["news"]) ? $context["news"] : null))) {
            // line 98
            echo \layout::func_from_text("        <td class=\"right_column\" style=\"padding: 0;vertical-align: top !important;\">
            ");
            // line 99
            if ((isset($context["news"]) ? $context["news"] : null)) {
                // line 100
                echo \layout::func_from_text("                <table class=\"table table-striped table-condensed\">
                    ");
                // line 101
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["news"]) ? $context["news"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                    // line 102
                    echo \layout::func_from_text("                    <tr>
                        <td style=\"white-space: nowrap;width: 1px;\">");
                    // line 103
                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "created"), "d.m.Y H:i"), "html", null, true));
                    echo \layout::func_from_text("</td>
                        <td><a href=\"/projects/news/show/");
                    // line 104
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a></td></tr>
                    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 106
                echo \layout::func_from_text("                </table>
            ");
            } else {
                // line 108
                echo \layout::func_from_text("                <div>новостей нет</div>
            ");
            }
            // line 110
            echo \layout::func_from_text("        </td>
        ");
        }
        // line 112
        echo \layout::func_from_text("    </tr>
</table>
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
        return array (  316 => 112,  312 => 110,  308 => 108,  304 => 106,  294 => 104,  290 => 103,  287 => 102,  283 => 101,  280 => 100,  278 => 99,  275 => 98,  273 => 97,  269 => 95,  260 => 91,  254 => 90,  248 => 89,  243 => 86,  241 => 85,  233 => 82,  228 => 79,  219 => 75,  214 => 72,  212 => 71,  208 => 69,  199 => 68,  194 => 65,  185 => 61,  180 => 58,  178 => 57,  174 => 55,  170 => 53,  161 => 50,  156 => 48,  150 => 47,  143 => 46,  139 => 45,  135 => 43,  133 => 42,  126 => 40,  120 => 39,  114 => 38,  108 => 37,  102 => 36,  93 => 29,  89 => 28,  83 => 24,  78 => 21,  69 => 20,  63 => 19,  56 => 14,  54 => 13,  51 => 12,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
