<?php

/* /applications/projects/layouts/calendar/task_today.html */
class __TwigTemplate_6d1aa3cae54053f638bb77a4338a51e25c9a7ca5426ed2630d8fec11c65639e3 extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("<table class=\"table table-hover table-condensed\">
    <thead>
    <tr>
        <th></th>
        <th>Проект</th>
        <th>Задача</th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Статус выполнения</th>
        <th>Ответственный</th>
        <th>До окончания</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 17
            echo \layout::func_from_text("        <tr id=\"task");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
                echo \layout::func_from_text("class='danger'");
            }
            echo \layout::func_from_text(">
            <td style=\"text-align: center;width: 10px;\">");
            // line 18
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                echo \layout::func_from_text("<i class=\"fa fa-user\" style=\"font-size: 20px;\"></i>");
            }
            echo \layout::func_from_text("</td>
            <td><a href=\"/projects/~");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td>
                ");
            // line 22
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
                echo \layout::func_from_text("новая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                // line 23
                echo \layout::func_from_text("в процессе
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
                // line 24
                echo \layout::func_from_text("закрытая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 25
                echo \layout::func_from_text("отклоненная
                    <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
                // line 26
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
                ");
            }
            // line 28
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 30
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
                echo \layout::func_from_text("<span class=\"label\">низкий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
                // line 31
                echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
                // line 32
                echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
                // line 33
                echo \layout::func_from_text("<span class=\"label label-important\">критический</span>
                ");
            }
            // line 35
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 37
            $context["undate"] = false;
            // line 38
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 39
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 40
                echo \layout::func_from_text("                ");
            }
            // line 41
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 42
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <div class=\"progress-bar ");
            // line 43
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("progress-bar-danger");
            }
            echo \layout::func_from_text("\" role=\"progressbar\" aria-valuenow=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text("\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
                echo \layout::func_from_text("%;");
            } else {
                echo \layout::func_from_text("30px;");
            }
            echo \layout::func_from_text("\">
                        <span>");
            // line 44
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text(" %</span>
                    </div>
                </div>
            </td>
            <td>
                <a href=\"/users/~");
            // line 49
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
            echo \layout::func_from_text("</a>
                <div class=\"nickname\">");
            // line 50
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_nickname"), "html", null, true));
            echo \layout::func_from_text("</div>
            </td>
            <td>");
            // line 52
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("просрочен");
            }
            echo \layout::func_from_text(" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "0") && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "inf"))) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff"), "html", null, true));
                echo \layout::func_from_text(" ");
                echo \layout::func_from_text(twig_escape_filter($this->env, lang("days", $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff")), "html", null, true));
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") == "inf")) {
                echo \layout::func_from_text("&infin;");
            } else {
                echo \layout::func_from_text("сегодня");
            }
            echo \layout::func_from_text("</td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 55
            echo \layout::func_from_text("        <tr>
            <td colspan=\"6\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 61
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 62
        echo \layout::func_from_text("<script>
    \$(document).ready(function (\$) {
        animate_progress_bars();
    });
</script>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/calendar/task_today.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 62,  207 => 61,  203 => 59,  194 => 55,  174 => 52,  169 => 50,  159 => 49,  151 => 44,  136 => 43,  130 => 42,  127 => 41,  124 => 40,  121 => 39,  118 => 38,  116 => 37,  112 => 35,  108 => 33,  104 => 32,  100 => 31,  95 => 30,  91 => 28,  86 => 26,  83 => 25,  79 => 24,  75 => 23,  70 => 22,  63 => 20,  57 => 19,  51 => 18,  42 => 17,  37 => 16,  21 => 2,  19 => 1,);
    }
}
