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
        <th><i class=\"fa fa-comment\"></i></th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Статус выполнения</th>
        <th>Ответственный</th>
        <th>Deadline</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 18
            echo \layout::func_from_text("        <tr id=\"task");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
                echo \layout::func_from_text("class='danger'");
            }
            echo \layout::func_from_text(">
            <td style=\"text-align: center;width: 10px;\">");
            // line 19
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                echo \layout::func_from_text("<i class=\"fa fa-user\" style=\"font-size: 20px;\"></i>");
            }
            echo \layout::func_from_text("</td>
            <td><a href=\"/projects/~");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
            // line 21
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td style=\"font-weight: bold;\">");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment_count"]) ? $context["comment_count"] : null), $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), array(), "array"), "count"), "html", null, true));
            echo \layout::func_from_text("</td>
            <td>
                ");
            // line 24
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
                echo \layout::func_from_text("новая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                // line 25
                echo \layout::func_from_text("в процессе
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
                // line 26
                echo \layout::func_from_text("закрытая
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 27
                echo \layout::func_from_text("отклоненная
                    <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
                // line 28
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
                ");
            }
            // line 30
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 32
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
                echo \layout::func_from_text("<span class=\"label\">низкий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
                // line 33
                echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
                // line 34
                echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
                // line 35
                echo \layout::func_from_text("<span class=\"label label-important\">критический</span>
                ");
            }
            // line 37
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 39
            $context["undate"] = false;
            // line 40
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 41
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 42
                echo \layout::func_from_text("                ");
            }
            // line 43
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 44
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <div class=\"progress-bar ");
            // line 45
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
            // line 46
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text(" %</span>
                    </div>
                </div>
            </td>
            <td>
                <a href=\"/users/~");
            // line 51
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
            echo \layout::func_from_text("</a>
                <!--<div class=\"nickname\">");
            // line 52
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_nickname"), "html", null, true));
            echo \layout::func_from_text("</div>-->
            </td>
            <td style=\"width: 1px;white-space: nowrap;\">");
            // line 54
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("-");
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
            // line 57
            echo \layout::func_from_text("        <tr>
            <td colspan=\"6\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 63
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 64
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
        return array (  214 => 64,  212 => 63,  208 => 61,  199 => 57,  179 => 54,  174 => 52,  164 => 51,  156 => 46,  141 => 45,  135 => 44,  132 => 43,  129 => 42,  126 => 41,  123 => 40,  121 => 39,  117 => 37,  113 => 35,  109 => 34,  105 => 33,  100 => 32,  96 => 30,  91 => 28,  88 => 27,  84 => 26,  80 => 25,  75 => 24,  70 => 22,  64 => 21,  58 => 20,  52 => 19,  43 => 18,  38 => 17,  21 => 2,  19 => 1,);
    }
}
