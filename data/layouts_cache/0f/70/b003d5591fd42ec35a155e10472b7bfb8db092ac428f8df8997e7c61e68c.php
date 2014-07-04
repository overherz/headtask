<?php

/* /applications/projects/layouts/logs.html */
class __TwigTemplate_0f70b003d5591fd42ec35a155e10472b7bfb8db092ac428f8df8997e7c61e68c extends Twig_Template
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
        echo \layout::func_from_text("<div>
    <table class=\"table table-hover table-border table-condensed\">
        <tr>
            <th>Тип</th>
            <th>Проект</th>
            <th>Описание</th>
            <th>Дата</th>
            <th>Пользователь</th>
        </tr>
        ");
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 11
            echo \layout::func_from_text("            <tr>
                <td>");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"))), "html", null, true));
            echo \layout::func_from_text("</td>
                <td>");
            // line 13
            if ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project")) {
                echo \layout::func_from_text("<a href=\"/projects/~");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a>");
            } else {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_project_name"), "html", null, true));
            }
            echo \layout::func_from_text("</td>
                <td>");
            // line 14
            echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
            echo \layout::func_from_text("</td>
                <td>");
            // line 15
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
            echo \layout::func_from_text("</td>
                <td>
                    ");
            // line 17
            if ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user")) {
                echo \layout::func_from_text("<a href=\"/users/~");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
                    ");
            } else {
                // line 18
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_name_user"), "html", null, true));
                echo \layout::func_from_text("
                    ");
            }
            // line 20
            echo \layout::func_from_text("                </td>
            </tr>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo \layout::func_from_text("    </table>
</div>

");
        // line 26
        if ((isset($context["logs_projects"]) ? $context["logs_projects"] : null)) {
            // line 27
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\"><span href=\"\" plus=\"project\"><i class=\"fa fa-minus\" style=\"position: absolute;top:7px;right:7px;cursor: pointer;\"></i></span>
    <li><a class=\"current\">Проекты</a></li>
</ul>


<div block=\"project\">
    <table class=\"table table-hover table-border table-condensed\">
        <tr>
            <th>Проект</th>
            <th>Описание</th>
            <th>Дата</th>
            <th>Пользователь</th>
        </tr>
        ");
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs_projects"]) ? $context["logs_projects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 41
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 42
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 43
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 44
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 46
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo \layout::func_from_text("    </table>
</div>
");
        }
        // line 53
        if ((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null)) {
            // line 54
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\"><span href=\"\" plus=\"task\"><i class=\"fa fa-minus\" style=\"position: absolute;top:7px;right:7px;cursor: pointer;\"></i></span>
    <li><a class=\"current\">Личные задачи</a></li>
</ul>
<div block=\"task\">
    <table class=\"table table-hover table-border table-condensed\">
        <tr>
            <th>Проект</th>
            <th>Задача</th>
            <th>Описание</th>
            <th>Дата</th>
            <th>Пользователь</th>
        </tr>
        ");
            // line 66
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 67
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 68
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
                // line 69
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_task"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "task_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 70
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 71
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 73
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo \layout::func_from_text("    </table>
</div>
");
        }
        // line 80
        if ((isset($context["manager_logs"]) ? $context["manager_logs"] : null)) {
            // line 81
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\"><span plus=\"manager\"><i class=\"fa fa-minus\" style=\"position: absolute;top:7px;right:7px;cursor: pointer;\"></i></span>
    <li><a class=\"current\">Блок менеджера</a></li>
</ul>
<div block=\"manager\">
    <table class=\"table table-hover table-border table-condensed\">
        <tr>
            <th>Проект</th>
            <th>Задача</th>
            <th>Описание</th>
            <th>Дата</th>
            <th>Пользователь</th>
        </tr>
        ");
            // line 93
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["manager_logs"]) ? $context["manager_logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 94
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 95
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
                // line 96
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_task"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "task_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 97
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 98
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 100
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo \layout::func_from_text("    </table>
</div>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/logs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 104,  262 => 100,  257 => 98,  253 => 97,  247 => 96,  241 => 95,  238 => 94,  234 => 93,  220 => 81,  218 => 80,  213 => 77,  197 => 73,  192 => 71,  188 => 70,  182 => 69,  176 => 68,  173 => 67,  169 => 66,  155 => 54,  153 => 53,  148 => 50,  132 => 46,  127 => 44,  123 => 43,  117 => 42,  114 => 41,  110 => 40,  95 => 27,  93 => 26,  88 => 23,  80 => 20,  75 => 18,  62 => 17,  53 => 14,  41 => 13,  37 => 12,  34 => 11,  30 => 10,  19 => 1,  57 => 15,  54 => 13,  46 => 10,  43 => 9,  40 => 8,  32 => 4,  29 => 3,);
    }
}
