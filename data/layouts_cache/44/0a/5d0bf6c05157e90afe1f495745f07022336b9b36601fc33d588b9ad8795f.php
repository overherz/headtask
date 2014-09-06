<?php

/* /applications/projects/layouts/calendar/task_today.html */
class __TwigTemplate_440a5d0bf6c05157e90afe1f495745f07022336b9b36601fc33d588b9ad8795f extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-hover table_style\">
    <thead>
    <tr>
        <th></th>
        ");
        // line 6
        if ((!(isset($context["id_project"]) ? $context["id_project"] : null))) {
            echo \layout::func_from_text("<th>Проект</th>");
        }
        // line 7
        echo \layout::func_from_text("        <th>Задача</th>
        ");
        // line 8
        if ((isset($context["dashboard"]) ? $context["dashboard"] : null)) {
            echo \layout::func_from_text("<th><i class=\"fa fa-comment\"></i></th>");
        }
        // line 9
        echo \layout::func_from_text("        <th>Статус</th>
        ");
        // line 10
        if ((isset($context["dashboard"]) ? $context["dashboard"] : null)) {
            echo \layout::func_from_text("<th>Делегировано</th>");
        }
        // line 11
        echo \layout::func_from_text("        <th><i class=\"fa fa-calendar\"></i></th>
        ");
        // line 12
        if ((isset($context["id_project"]) ? $context["id_project"] : null)) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 13
        echo \layout::func_from_text("    </tr>
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
            echo \layout::func_from_text("\">
            <td style=\"width: 1px;");
            // line 18
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                echo \layout::func_from_text("padding-left:0;padding-right: 0;text-align: center;");
            }
            echo \layout::func_from_text("\" class=\"priority");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"), "html", null, true));
            echo \layout::func_from_text("\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_priority_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))), "html", null, true));
            echo \layout::func_from_text("\">
                ");
            // line 19
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 20
                echo \layout::func_from_text("                    <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
                ");
            }
            // line 22
            echo \layout::func_from_text("            </td>
            ");
            // line 23
            if ((!(isset($context["id_project"]) ? $context["id_project"] : null))) {
                // line 24
                echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\"><a href=\"/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\" class=\"get_info_project\" data-id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            ");
            }
            // line 26
            echo \layout::func_from_text("            <td><a href=\"/projects/tasks/show/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("class=\"own_task\"");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
                ");
            // line 27
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "cats")) {
                // line 28
                echo \layout::func_from_text("                    ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "cats"));
                foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                    // line 29
                    echo \layout::func_from_text("                        <div style=\"margin-bottom:2px;display: inline-block;\"><span class=\"label label-cat\" style=\"background: ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "color"), "html", null, true));
                    echo \layout::func_from_text(";color: ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "color_text"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "name"), "html", null, true));
                    echo \layout::func_from_text("</span></div>
                    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 31
                echo \layout::func_from_text("                ");
            }
            // line 32
            echo \layout::func_from_text("            </td>
            ");
            // line 33
            if ((isset($context["dashboard"]) ? $context["dashboard"] : null)) {
                echo \layout::func_from_text("<td style=\"font-weight: bold;width: 1px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment_count"]) ? $context["comment_count"] : null), $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), array(), "array"), "count"), "html", null, true));
                echo \layout::func_from_text("</td>");
            }
            // line 34
            echo \layout::func_from_text("            <td style=\"width: 110px;height: 100%;\">
                ");
            // line 35
            $context["undate"] = false;
            // line 36
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 37
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 38
                echo \layout::func_from_text("                ");
            }
            // line 39
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 40
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <span class=\"progress-value\">");
            // line 41
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
            echo \layout::func_from_text("</span>
                    <div class=\"progress-bar ");
            // line 42
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
            // line 46
            if ((isset($context["dashboard"]) ? $context["dashboard"] : null)) {
                // line 47
                echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\">
                ");
                // line 48
                if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"))) {
                    // line 49
                    echo \layout::func_from_text("                    <span class=\"user_name\">мне</span>
                ");
                } else {
                    // line 51
                    echo \layout::func_from_text("                <a href=\"/users/~");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
                    echo \layout::func_from_text("/\" style=\"color:");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
                    echo \layout::func_from_text(" !important;\" class=\"user_name\" title=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
                    echo \layout::func_from_text("</a>
                ");
                }
                // line 53
                echo \layout::func_from_text("            </td>
            ");
            }
            // line 55
            echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
                echo \layout::func_from_text("class=\"task_diff_alert\"");
            }
            echo \layout::func_from_text(">
                ");
            // line 56
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                // line 57
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
                // line 58
                echo \layout::func_from_text("                ");
            }
            // line 59
            echo \layout::func_from_text("            </td>

            ");
            // line 61
            if ((isset($context["id_project"]) ? $context["id_project"] : null)) {
                // line 62
                echo \layout::func_from_text("            <td style=\"width: 140px;text-align: right;\">
                <div class=\"btn-group\">
                    ");
                // line 64
                if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
                    // line 65
                    echo \layout::func_from_text("                        ");
                    if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                        echo \layout::func_from_text("<a class=\"btn btn-success btn-sm\" forward_task=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\" from='");
                        if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                            echo \layout::func_from_text("show_task");
                        }
                        echo \layout::func_from_text("'><i class=\"fa fa-forward fa-fw\"></i></a>");
                    }
                    // line 66
                    echo \layout::func_from_text("                        ");
                    if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                        echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\"><i class=\"fa fa-pencil fa-fw\"></i></a>");
                    }
                    // line 67
                    echo \layout::func_from_text("                        ");
                    if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                        echo \layout::func_from_text("<a class=\"btn btn-danger btn-sm\" delete_task=");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text(" from='");
                        if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                            echo \layout::func_from_text("show_task");
                        }
                        echo \layout::func_from_text("' href=\"\"><i class=\"fa fa-trash-o fa-fw\"></i></a>");
                    }
                    // line 68
                    echo \layout::func_from_text("                    ");
                }
                // line 69
                echo \layout::func_from_text("                </div>
            </td>
            ");
            }
            // line 72
            echo \layout::func_from_text("        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo \layout::func_from_text("        <tr>
            <td colspan=\"9\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 80
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
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
        return array (  301 => 80,  297 => 78,  288 => 74,  282 => 72,  277 => 69,  274 => 68,  263 => 67,  256 => 66,  245 => 65,  243 => 64,  239 => 62,  237 => 61,  233 => 59,  230 => 58,  219 => 57,  217 => 56,  210 => 55,  206 => 53,  190 => 49,  188 => 48,  185 => 47,  183 => 46,  160 => 40,  157 => 39,  154 => 38,  148 => 36,  146 => 35,  137 => 33,  134 => 32,  131 => 31,  118 => 29,  113 => 28,  111 => 27,  100 => 26,  90 => 24,  88 => 23,  85 => 22,  79 => 20,  77 => 19,  67 => 18,  62 => 17,  57 => 16,  52 => 13,  45 => 11,  41 => 10,  31 => 7,  27 => 6,  119 => 16,  99 => 13,  94 => 12,  84 => 10,  65 => 6,  61 => 5,  43 => 4,  40 => 3,  34 => 8,  21 => 2,  197 => 86,  194 => 51,  184 => 78,  178 => 75,  174 => 74,  170 => 42,  166 => 41,  151 => 37,  143 => 34,  136 => 49,  130 => 46,  127 => 45,  125 => 44,  120 => 42,  116 => 15,  110 => 40,  104 => 39,  98 => 38,  92 => 37,  87 => 35,  80 => 8,  76 => 28,  74 => 27,  59 => 15,  55 => 14,  48 => 12,  42 => 7,  38 => 9,  25 => 3,  22 => 2,  19 => 1,);
    }
}
