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
        echo \layout::func_from_text("<table class=\"table table-hover table-condensed table-border\">
    <thead>
    <tr>
        <th>Проект</th>
        <th>Задача</th>
        ");
        // line 7
        if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
            echo \layout::func_from_text("<th><i class=\"fa fa-comment\"></i></th>");
        }
        // line 8
        echo \layout::func_from_text("        <th>Статус</th>
        <th>Приоритет</th>
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
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
                echo \layout::func_from_text("class='danger'");
            }
            echo \layout::func_from_text(">
            <td style=\"width: 1px;white-space: nowrap;\"><a href=\"/projects/tasks/");
            // line 17
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("/\" class=\"get_info_project\" data-id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_project"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "task_creater") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("class=\"own_task\"");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
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
            if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
                echo \layout::func_from_text("<td style=\"font-weight: bold;width: 1px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment_count"]) ? $context["comment_count"] : null), $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), array(), "array"), "count"), "html", null, true));
                echo \layout::func_from_text("</td>");
            }
            // line 24
            echo \layout::func_from_text("            <td style=\"width: 110px;\">
                ");
            // line 25
            $context["undate"] = false;
            // line 26
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 27
                echo \layout::func_from_text("                    ");
                $context["undate"] = true;
                // line 28
                echo \layout::func_from_text("                ");
            }
            // line 29
            echo \layout::func_from_text("
                <div class=\"progress progress-striped ");
            // line 30
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
                    <span class=\"progress-value\">
                                            ");
            // line 32
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
                echo \layout::func_from_text("новая
                                            ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                // line 33
                echo \layout::func_from_text("в процессе
                                            ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
                // line 34
                echo \layout::func_from_text("закрытая
                                            ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 35
                echo \layout::func_from_text("отклоненная
                                            ");
            }
            // line 37
            echo \layout::func_from_text("                    </span>
                    <div class=\"progress-bar ");
            // line 38
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
            <td style=\"width: 1px;\">
                ");
            // line 43
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
                echo \layout::func_from_text("<span class=\"label label-default\">низкий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
                // line 44
                echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
                // line 45
                echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
                ");
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
                // line 46
                echo \layout::func_from_text("<span class=\"label label-danger\">критический</span>
                ");
            }
            // line 48
            echo \layout::func_from_text("            </td>
            ");
            // line 49
            if ((!(isset($context["show_user"]) ? $context["show_user"] : null))) {
                // line 50
                echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\">
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
            </td>
            ");
            }
            // line 54
            echo \layout::func_from_text("            <td style=\"width: 1px;white-space: nowrap;\">
                ");
            // line 55
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                // line 56
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
                // line 57
                echo \layout::func_from_text("                ");
            }
            // line 58
            echo \layout::func_from_text("            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 61
            echo \layout::func_from_text("        <tr>
            <td colspan=\"9\">Задачи не найдены</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo \layout::func_from_text("    </tbody>
</table>");
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
        return array (  225 => 65,  216 => 61,  209 => 58,  206 => 57,  195 => 56,  193 => 55,  190 => 54,  178 => 51,  175 => 50,  173 => 49,  170 => 48,  166 => 46,  162 => 45,  158 => 44,  153 => 43,  139 => 38,  136 => 37,  132 => 35,  128 => 34,  124 => 33,  119 => 32,  112 => 30,  109 => 29,  106 => 28,  103 => 27,  100 => 26,  98 => 25,  95 => 24,  89 => 23,  86 => 22,  80 => 20,  78 => 19,  68 => 18,  60 => 17,  51 => 16,  46 => 15,  40 => 11,  36 => 10,  32 => 8,  28 => 7,  21 => 2,  19 => 1,);
    }
}
