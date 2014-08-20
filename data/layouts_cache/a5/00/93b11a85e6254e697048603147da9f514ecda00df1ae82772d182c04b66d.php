<?php

/* /applications/logs/layouts/admin/list.html */
class __TwigTemplate_a50093b11a85e6254e697048603147da9f514ecda00df1ae82772d182c04b66d extends Twig_Template
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
        return array (  70 => 11,  64 => 9,  61 => 8,  48 => 6,  44 => 5,  28 => 3,  24 => 2,  75 => 18,  52 => 14,  34 => 13,  21 => 2,  19 => 1,  343 => 162,  338 => 122,  333 => 17,  325 => 163,  323 => 162,  319 => 161,  277 => 122,  268 => 115,  249 => 112,  242 => 111,  238 => 110,  212 => 86,  206 => 85,  199 => 81,  191 => 80,  187 => 79,  180 => 78,  177 => 77,  174 => 76,  171 => 75,  167 => 73,  165 => 72,  154 => 70,  151 => 69,  148 => 68,  143 => 66,  138 => 64,  130 => 63,  126 => 62,  123 => 61,  120 => 60,  117 => 59,  114 => 58,  110 => 57,  105 => 54,  94 => 52,  89 => 51,  87 => 50,  72 => 40,  68 => 16,  55 => 15,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 30,  118 => 28,  99 => 53,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 18,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 7,  43 => 6,  40 => 4,  35 => 3,  32 => 2,);
    }
}
