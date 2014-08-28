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
        echo \layout::func_from_text("<div style=\"position: relative;\">");
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>
<table class=\"table table-hover table_style no_padding_left\">
    <tr>
        <th style=\"width: 1px;white-space: nowrap;\"></th>
        <th>Описание</th>
        ");
        // line 6
        if ((isset($context["all"]) ? $context["all"] : null)) {
            echo \layout::func_from_text("<th>Проект</th>");
        }
        // line 7
        echo \layout::func_from_text("        <th>Дата</th>
        <th>Пользователь</th>
    </tr>
    ");
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 11
            echo \layout::func_from_text("        <tr>
            <td><span class=\"label label-default log_");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"))), "html", null, true));
            echo \layout::func_from_text("</span></td>
            <td>");
            // line 13
            echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
            echo \layout::func_from_text("</td>
            ");
            // line 14
            if ((isset($context["all"]) ? $context["all"] : null)) {
                echo \layout::func_from_text("<td>");
                if ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project")) {
                    echo \layout::func_from_text("<a href=\"/projects/~");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                    echo \layout::func_from_text("/\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                    echo \layout::func_from_text("</a>");
                } else {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_project_name"), "html", null, true));
                }
                echo \layout::func_from_text("</td>");
            }
            // line 15
            echo \layout::func_from_text("            <td>");
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
            echo \layout::func_from_text("            </td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo \layout::func_from_text("</table>
<div style=\"position: relative;\">");
        // line 24
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>");
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
        return array (  103 => 24,  100 => 23,  92 => 20,  87 => 18,  74 => 17,  68 => 15,  54 => 14,  50 => 13,  44 => 12,  41 => 11,  37 => 10,  32 => 7,  28 => 6,  19 => 1,);
    }
}
