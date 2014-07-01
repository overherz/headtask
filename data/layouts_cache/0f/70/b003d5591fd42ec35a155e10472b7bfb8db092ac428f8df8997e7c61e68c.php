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
        if ((isset($context["logs_projects"]) ? $context["logs_projects"] : null)) {
            // line 2
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
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs_projects"]) ? $context["logs_projects"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 14
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 15
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 16
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 17
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 19
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
            // line 23
            echo \layout::func_from_text("    </table>
</div>
");
        }
        // line 26
        if ((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null)) {
            // line 27
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
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 40
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 41
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
                // line 42
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_task"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "task_name"), "html", null, true));
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
        if ((isset($context["manager_logs"]) ? $context["manager_logs"] : null)) {
            // line 54
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
            // line 66
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["manager_logs"]) ? $context["manager_logs"] : null));
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
        return array (  202 => 77,  186 => 73,  181 => 71,  177 => 70,  171 => 69,  165 => 68,  162 => 67,  158 => 66,  144 => 54,  142 => 53,  137 => 50,  121 => 46,  116 => 44,  112 => 43,  106 => 42,  100 => 41,  97 => 40,  93 => 39,  79 => 27,  77 => 26,  72 => 23,  56 => 19,  51 => 17,  47 => 16,  41 => 15,  38 => 14,  34 => 13,  21 => 2,  19 => 1,  57 => 14,  54 => 13,  46 => 10,  43 => 9,  40 => 8,  32 => 4,  29 => 3,);
    }
}
