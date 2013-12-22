<?php

/* /applications/logs/layouts/admin/list.html */
class __TwigTemplate_12e8e50ef2f3df98904e9b77aa49d689 extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"tr-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td>");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "title"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 3
        if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "fio")) {
            echo \layout::func_from_text("<span style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "color"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</span>");
        } else {
            echo \layout::func_from_text("---");
        }
        echo \layout::func_from_text("</td>
    <td>");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "date"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "ip"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 6
        if (((isset($context["type"]) ? $context["type"] : null) == "login")) {
            // line 7
            echo \layout::func_from_text("            ");
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "status")) {
                echo \layout::func_from_text("<span style=\"color:green;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("</span>");
            } else {
                echo \layout::func_from_text("<span style=\"color:red;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("</span>");
            }
            // line 8
            echo \layout::func_from_text("        ");
        } else {
            // line 9
            echo \layout::func_from_text("        ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "message"), "html", null, true));
            echo \layout::func_from_text("
        ");
        }
        // line 11
        echo \layout::func_from_text("    </td>
</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/logs/layouts/admin/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 11,  64 => 9,  61 => 8,  48 => 6,  44 => 5,  28 => 3,  24 => 2,  97 => 14,  66 => 10,  60 => 8,  58 => 7,  34 => 5,  31 => 4,  21 => 2,  67 => 13,  54 => 12,  51 => 6,  33 => 10,  22 => 2,  19 => 1,  128 => 33,  124 => 31,  118 => 30,  114 => 28,  99 => 26,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 12,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 7,  43 => 6,  40 => 4,  35 => 3,  32 => 2,);
    }
}
