<?php

/* /applications/logs/layouts/admin/list.html */
class __TwigTemplate_bb92a4200ab8d1e4d42c856bb4c72f2089dad1c850df7c0c5b9356ba87c1a83a extends Twig_Template
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
        return array (  70 => 11,  48 => 6,  44 => 5,  28 => 3,  24 => 2,  108 => 25,  100 => 23,  93 => 21,  82 => 18,  76 => 16,  64 => 9,  61 => 8,  58 => 10,  41 => 9,  37 => 7,  27 => 5,  25 => 4,  75 => 18,  52 => 14,  34 => 13,  21 => 2,  19 => 1,  525 => 345,  520 => 288,  515 => 17,  505 => 346,  503 => 345,  445 => 289,  443 => 288,  435 => 282,  416 => 279,  409 => 278,  405 => 277,  237 => 111,  231 => 110,  224 => 106,  216 => 105,  212 => 104,  205 => 103,  202 => 102,  199 => 101,  196 => 100,  192 => 98,  190 => 97,  179 => 95,  176 => 94,  173 => 93,  168 => 91,  163 => 89,  155 => 88,  151 => 87,  148 => 86,  145 => 85,  142 => 84,  139 => 83,  135 => 82,  130 => 79,  124 => 78,  119 => 77,  114 => 76,  112 => 75,  72 => 40,  68 => 13,  55 => 15,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 26,  118 => 28,  99 => 26,  95 => 22,  90 => 20,  88 => 23,  83 => 22,  79 => 21,  74 => 15,  71 => 14,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 7,  43 => 6,  40 => 4,  35 => 3,  32 => 2,);
    }
}
