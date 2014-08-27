<?php

/* applications/projects/layouts/calendar/task_today.html */
class __TwigTemplate_6225c53bf6d3114e3ce09ef9c05fd5b676543890a7569f023a09b863f51bbd90 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-hover table-condensed table-border\">
    <thead>
    <tr>
        <th></th>
        <th>Проект</th>
        <th>Задача</th>
        ");
        // line 8
        if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
            echo \layout::func_from_text("<th><i class=\"fa fa-comment\"></i></th>");
        }
        // line 9
        echo \layout::func_from_text("        <th>Статус</th>
        ");
        // line 10
        if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
            echo \layout::func_from_text("<th>Делегировано</th>");
        }
        // line 11
        echo \layout::func_from_text("        <th><i class=\"fa fa-calendar\"></i></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 16
            echo \layout::func_from_text("        <tr id=\"task");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
            <td style=\"width: 1px;");
            // line 17
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                echo \layout::func_from_text("padding-left:0;padding-right: 0;text-align: center;");
            }
            echo \layout::func_from_text("\" class=\"priority");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"), "html", null, true));
            echo \layout::func_from_text("\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_priority_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))), "html", null, true));
            echo \layout::func_from_text("\">
                ");
            // line 18
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 19
                echo \layout::func_from_text("                    <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
                ");
            }
            // line 21
            echo \layout::func_from_text("            </td>
            <td style=\"width: 1px;white-space: nowrap;\"><a href=\"/projects/tasks/");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("/\" class=\"get_info_project\" data-id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
            // line 23
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("class=\"own_task\"");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
            </td>
            ");
            // line 25
            if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
                echo \layout::func_from_text("<td style=\"font-weight: bold;width: 1px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment_count"]) ? $context["comment_count"] : null), $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), array(), "array"), "count"), "html", null, true));
                echo \layout::func_from_text("</td>");
            }
            // line 26
            echo \layout::func_from_text("            <td style=\"width: 110px;height: 100%;\">
                ");
            // line 27
            $context["undate"] = false;
            // line 28
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 29
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 30
                echo \layout::func_from_text("                ");
            }
            // line 31
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 32
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <span class=\"progress-value\">");
            // line 33
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
            echo \layout::func_from_text("</span>
                    <div class=\"progress-bar ");
            // line 34
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("progress-bar-danger");
            }
            echo \layout::func_from_text("\" role=\"progressbar\" aria-valuenow=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text("\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text("%;\">
                    </div>
                </div>
            </td>
            ");
            // line 38
            if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
                // line 39
                echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\">
                <a href=\"/users/~");
                // line 40
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
                echo \layout::func_from_text("</a>
            </td>
            ");
            }
            // line 43
            echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
                echo \layout::func_from_text("class=\"task_diff_alert\"");
            }
            echo \layout::func_from_text(">
                ");
            // line 44
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                // line 45
                echo \layout::func_from_text("                    ");
                if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "0") && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "inf"))) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff"), "html", null, true));
                    echo \layout::func_from_text(" ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, lang("days", $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff")), "html", null, true));
                } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") == "inf")) {
                    echo \layout::func_from_text("&infin;");
                } else {
                    echo \layout::func_from_text("сегодня");
                }
                // line 46
                echo \layout::func_from_text("                ");
            }
            // line 47
            echo \layout::func_from_text("            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 50
            echo \layout::func_from_text("        <tr>
            <td colspan=\"9\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo \layout::func_from_text("    </tbody>
</table>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/calendar/task_today.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 54,  189 => 50,  182 => 47,  179 => 46,  168 => 45,  166 => 44,  159 => 43,  147 => 40,  144 => 39,  142 => 38,  129 => 34,  125 => 33,  119 => 32,  116 => 31,  113 => 30,  110 => 29,  107 => 28,  105 => 27,  102 => 26,  96 => 25,  85 => 23,  77 => 22,  74 => 21,  68 => 19,  66 => 18,  56 => 17,  51 => 16,  46 => 15,  40 => 11,  36 => 10,  33 => 9,  29 => 8,  21 => 2,  19 => 1,);
    }
}
