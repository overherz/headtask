<?php

/* /applications/tasks/layouts/admin/tasks-list.html */
class __TwigTemplate_d2822dcb4a9c302ee667fad17b4e5bcc8e4d58810975f092082a296901728f0d extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"tasks-tr-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td>");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "controller"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "period"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 5
        if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "last_start")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "last_start"), "d.m.Y H:i:s"), "html", null, true));
        } else {
            echo \layout::func_from_text("-");
        }
        echo \layout::func_from_text("</td>
    <td>");
        // line 6
        if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "completed")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "completed"), "d.m.Y H:i:s"), "html", null, true));
        } else {
            echo \layout::func_from_text("-");
        }
        echo \layout::func_from_text("</td>
    <td>");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "next_start"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 8
        if (($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "status") == "stand")) {
            echo \layout::func_from_text("не запущен");
        } elseif (($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "status") == "run")) {
            echo \layout::func_from_text("<span style=\"color:green;\">запущен</span>");
        }
        echo \layout::func_from_text("</td>
    <td style=\"color:red;\">");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "error_message"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td class=\"td-align-middle w1\"><a title=\"Запустить\" class=\"fa fa-15x fa-play run-btn\" id=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle w1\"><a title=\"Изменить\" class=\"fa fa-15x fa-edit edit-btn\" id=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle w1\"><a title=\"Удалить\" class=\"fa fa-15x fa-trash-o del-btn\" id=\"");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
</tr>
");
    }

    public function getTemplateName()
    {
        return "/applications/tasks/layouts/admin/tasks-list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 12,  64 => 9,  52 => 7,  44 => 6,  36 => 5,  32 => 4,  28 => 3,  24 => 2,  79 => 22,  72 => 11,  38 => 17,  21 => 2,  19 => 1,  149 => 39,  146 => 38,  142 => 36,  138 => 34,  132 => 33,  128 => 31,  113 => 29,  109 => 28,  104 => 27,  102 => 26,  97 => 25,  93 => 24,  86 => 19,  77 => 17,  73 => 16,  70 => 15,  68 => 10,  65 => 13,  59 => 19,  56 => 8,  53 => 9,  47 => 7,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
