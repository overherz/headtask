<?php

/* applications\projects\layouts\calendar/calendar_current_day.html */
class __TwigTemplate_2c81bd88f59379006a0ba417a8a94231 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'css' => array($this, 'block_css'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Календарь. Задачи сегодня");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
    <script>
        \$(document).ready(function (\$) {
            animate_progress_bars();
        });
    </script>
");
    }

    // line 14
    public function block_css($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/libraries/calendar/calendar.css\">
");
    }

    // line 18
    public function block_context($context, array $blocks = array())
    {
        // line 19
        echo \layout::func_from_text("<ul class=\"breadcrumb\">
    <li>Общая статистика: </li>
    <li>
        <span class=\"label label-info\">");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("count_project", $context)) ? (_twig_default_filter((isset($context["count_project"]) ? $context["count_project"] : null), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_projects", ((array_key_exists("count_project", $context)) ? (_twig_default_filter((isset($context["count_project"]) ? $context["count_project"] : null), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("count_personal_tasks", $context)) ? (_twig_default_filter((isset($context["count_personal_tasks"]) ? $context["count_personal_tasks"] : null), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_personal_tasks", ((array_key_exists("count_personal_tasks", $context)) ? (_twig_default_filter((isset($context["count_personal_tasks"]) ? $context["count_personal_tasks"] : null), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("

        <span style=\"margin-left: 20px;font-weight: bold;\" title='У участника с ролью \"Менеджер\" учитываются все задачи в проекте. У просто участника только задачи, которые создавал он'>Менеджер: </span>
        <span class=\"label label-info\">");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
    </li>
</ul>

<table class=\"table table-hover table-bordered table-condensed\">
    <tr>
        <th></th>
        <th>Проект</th>
        <th>Задача</th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Статус выполнения</th>
        <th>Ответственный</th>
    </tr>
    ");
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 44
            echo \layout::func_from_text("        <tr id=\"task");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
                echo \layout::func_from_text("class='error'");
            }
            echo \layout::func_from_text(">
            <td style=\"text-align: center;width: 10px;\">");
            // line 45
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                echo \layout::func_from_text("<i class=\"icon-user\" style=\"font-size: 20px;\"></i>");
            }
            echo \layout::func_from_text("</td>
            <td><a href=\"/projects/~");
            // line 46
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
            // line 47
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td>
                ");
            // line 49
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
                echo \layout::func_from_text("новая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                // line 50
                echo \layout::func_from_text("в процессе
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
                // line 51
                echo \layout::func_from_text("закрытая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 52
                echo \layout::func_from_text("отклоненная
                    <i class=\"icon icon-info-sign get_info\" rel=\"popover\" data-original-title=\"Причина отклонения\" data-content=\"");
                // line 53
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
                ");
            }
            // line 55
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 57
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
                echo \layout::func_from_text("<span class=\"label\">низкий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
                // line 58
                echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
                // line 59
                echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
                // line 60
                echo \layout::func_from_text("<span class=\"label label-important\">критический</span>
                ");
            }
            // line 62
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 64
            $context["undate"] = false;
            // line 65
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 66
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 67
                echo \layout::func_from_text("                ");
            }
            // line 68
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 69
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("progress-danger");
            }
            echo \layout::func_from_text(" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <div class=\"bar\" style=\"width: ");
            // line 70
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
                echo \layout::func_from_text("0%;");
            } else {
                echo \layout::func_from_text("30px;");
            }
            echo \layout::func_from_text("text-align: right;\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
                echo \layout::func_from_text("data-width=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
                echo \layout::func_from_text("\"");
            }
            echo \layout::func_from_text(">
                        <span class=\"progress_text\">");
            // line 71
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text(" %</span>
                    </div>
                </div>
            </td>
            <td>
                <a href=\"/users/~");
            // line 76
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
            echo \layout::func_from_text("</a>
                <div class=\"nickname\">");
            // line 77
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_nickname"), "html", null, true));
            echo \layout::func_from_text("</div>
            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 81
            echo \layout::func_from_text("        <tr>
            <td colspan=\"6\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo \layout::func_from_text("</table>

<ul class=\"breadcrumb second\">
    <li>Форумы</li>
</ul>
<table class=\"table table-hover table-bordered table-condensed\">
    <tr>
        <th>Проект</th>
        <th style=\"width: 350px;\">Количество новых сообщений</th>
    </tr>
    ");
        // line 95
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 96
            echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/forum/new_posts/");
            // line 97
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td>");
            // line 98
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
            echo \layout::func_from_text("</td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 101
            echo \layout::func_from_text("        <tr>
            <td colspan=\"2\">Новых сообщений на форумах нет</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo \layout::func_from_text("</table>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\calendar/calendar_current_day.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 105,  306 => 101,  298 => 98,  292 => 97,  289 => 96,  284 => 95,  272 => 85,  263 => 81,  254 => 77,  244 => 76,  236 => 71,  222 => 70,  212 => 69,  209 => 68,  206 => 67,  203 => 66,  200 => 65,  198 => 64,  194 => 62,  190 => 60,  186 => 59,  182 => 58,  177 => 57,  173 => 55,  168 => 53,  165 => 52,  161 => 51,  157 => 50,  152 => 49,  145 => 47,  139 => 46,  133 => 45,  124 => 44,  119 => 43,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 6,  37 => 5,  31 => 3,);
    }
}
