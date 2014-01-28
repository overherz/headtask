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
        return array (  70 => 11,  48 => 6,  44 => 5,  28 => 3,  24 => 2,  108 => 25,  100 => 23,  95 => 22,  93 => 21,  90 => 20,  76 => 16,  64 => 9,  61 => 8,  58 => 10,  41 => 9,  37 => 7,  27 => 5,  25 => 4,  75 => 18,  68 => 13,  55 => 15,  52 => 14,  34 => 13,  19 => 1,  537 => 366,  532 => 301,  522 => 367,  520 => 366,  454 => 302,  452 => 301,  444 => 295,  425 => 292,  418 => 291,  414 => 290,  247 => 125,  241 => 124,  234 => 120,  226 => 119,  222 => 118,  215 => 117,  212 => 116,  209 => 115,  206 => 114,  202 => 112,  200 => 111,  189 => 109,  186 => 108,  183 => 107,  178 => 105,  173 => 103,  165 => 102,  161 => 101,  158 => 100,  155 => 99,  152 => 98,  149 => 97,  145 => 96,  140 => 93,  129 => 91,  122 => 26,  82 => 18,  78 => 53,  21 => 2,  142 => 43,  134 => 92,  128 => 36,  124 => 90,  105 => 32,  101 => 31,  96 => 30,  94 => 29,  89 => 28,  85 => 27,  74 => 15,  71 => 14,  65 => 43,  62 => 13,  56 => 10,  53 => 9,  50 => 7,  43 => 6,  40 => 4,  35 => 3,  32 => 2,);
    }
}
