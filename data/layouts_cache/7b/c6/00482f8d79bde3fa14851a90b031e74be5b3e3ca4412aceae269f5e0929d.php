<?php

/* /applications/projects/layouts/logs.html */
class __TwigTemplate_7bc600482f8d79bde3fa14851a90b031e74be5b3e3ca4412aceae269f5e0929d extends Twig_Template
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
                <div class=\"nickname\">");
                // line 20
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</div>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo \layout::func_from_text("    </table>
</div>
");
        }
        // line 27
        if ((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null)) {
            // line 28
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
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs_tasks"]) ? $context["logs_tasks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 41
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 42
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
                // line 43
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_task"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "task_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 44
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 45
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 47
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
                <div class=\"nickname\">");
                // line 48
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</div>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo \layout::func_from_text("    </table>
</div>
");
        }
        // line 55
        if ((isset($context["manager_logs"]) ? $context["manager_logs"] : null)) {
            // line 56
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
            // line 68
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["manager_logs"]) ? $context["manager_logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 69
                echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/~");
                // line 70
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td><a href=\"/projects/tasks/show/");
                // line 71
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_task"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "task_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
            <td>");
                // line 72
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
            <td>");
                // line 73
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
            <td>
                <a href=\"/users/~");
                // line 75
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
                <div class=\"nickname\">");
                // line 76
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</div>
            </td>
        </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
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
        return array (  214 => 80,  204 => 76,  194 => 75,  189 => 73,  185 => 72,  179 => 71,  173 => 70,  170 => 69,  166 => 68,  152 => 56,  150 => 55,  145 => 52,  135 => 48,  125 => 47,  120 => 45,  116 => 44,  110 => 43,  104 => 42,  101 => 41,  97 => 40,  83 => 28,  81 => 27,  76 => 24,  66 => 20,  56 => 19,  51 => 17,  47 => 16,  41 => 15,  38 => 14,  34 => 13,  21 => 2,  19 => 1,);
    }
}
