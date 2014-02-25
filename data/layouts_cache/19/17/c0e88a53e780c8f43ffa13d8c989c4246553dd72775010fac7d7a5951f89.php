<?php

/* /applications/pages/layouts/admin/pages-list.html */
class __TwigTemplate_1917c0e88a53e780c8f43ffa13d8c989c4246553dd72775010fac7d7a5951f89 extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"page-tr-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
        echo \layout::func_from_text("\">
    ");
        // line 2
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            // line 3
            echo \layout::func_from_text("    <td>");
            if (($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "level") > 0)) {
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "level")));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    echo \layout::func_from_text("- ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</td>
    <td><a href=\"");
            // line 4
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "path"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, cut($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "path"), 50), "html", null, true));
            echo \layout::func_from_text("</a></td>
    <td>");
            // line 5
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "template"), "html", null, true));
            echo \layout::func_from_text("</td>
    <td>");
            // line 6
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "title")) {
                echo \layout::func_from_text("<i class=\"fa fa-check\"></i>");
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 7
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "keywords")) {
                echo \layout::func_from_text("<i class=\"fa fa-check\"></i>");
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 8
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "description")) {
                echo \layout::func_from_text("<i class=\"fa fa-check\"></i>");
            }
            echo \layout::func_from_text("</td>
    ");
        } else {
            // line 10
            echo \layout::func_from_text("        <td>");
            echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "text"), "html", null, true)));
            echo \layout::func_from_text("</td>
    ");
        }
        // line 12
        echo \layout::func_from_text("    <td style=\"width: 100px;\">");
        if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "created")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        }
        echo \layout::func_from_text("</td>
    ");
        // line 13
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            echo \layout::func_from_text("<td style=\"text-align: center;\">");
            if (($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "count") > 1)) {
                echo \layout::func_from_text("<a href=\"\" class=\"show_versions\" id_page='");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("'>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "count"), "html", null, true));
                echo \layout::func_from_text("</a>");
            } else {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "count"), "html", null, true));
            }
            echo \layout::func_from_text("</td>");
        }
        // line 14
        echo \layout::func_from_text("    ");
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            // line 15
            echo \layout::func_from_text("        <td>
            <span class=\"main_version\" main_version=\"");
            // line 16
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
            echo \layout::func_from_text("\" style=\"display:");
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "main")) {
                echo \layout::func_from_text("block");
            } else {
                echo \layout::func_from_text("none");
            }
            echo \layout::func_from_text(";\"><span style=\"color:green;\">выбрано</span></span>
            <span class=\"main_version_set\" set_version=\"");
            // line 17
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("-");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
            echo \layout::func_from_text("\" style=\"display:");
            if ((!$this->getAttribute((isset($context["i"]) ? $context["i"] : null), "main"))) {
                echo \layout::func_from_text("block");
            } else {
                echo \layout::func_from_text("none");
            }
            echo \layout::func_from_text(";\"><a href=\"\">выбрать</a></span>
        </td>
    ");
        }
        // line 20
        echo \layout::func_from_text("    <td class=\"td-align-middle w1\"><a title=\"Изменить\" class=\"fa fa-15x fa-edit edit-btn\" id=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle w1\"><a title=\"Удалить\" class=\"fa fa-15x fa-trash-o del-btn\" id=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            echo \layout::func_from_text("-");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
        }
        echo \layout::func_from_text("\"></a></td>
</tr>
");
    }

    public function getTemplateName()
    {
        return "/applications/pages/layouts/admin/pages-list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 21,  129 => 20,  105 => 16,  102 => 15,  99 => 14,  85 => 13,  78 => 12,  65 => 8,  59 => 7,  49 => 5,  43 => 4,  28 => 3,  122 => 26,  108 => 25,  100 => 23,  95 => 22,  93 => 21,  90 => 20,  82 => 18,  76 => 16,  74 => 15,  71 => 14,  61 => 11,  58 => 10,  41 => 9,  27 => 5,  25 => 4,  21 => 2,  125 => 36,  118 => 31,  115 => 17,  109 => 29,  104 => 28,  91 => 27,  70 => 25,  64 => 12,  57 => 18,  53 => 6,  46 => 14,  37 => 7,  35 => 6,  26 => 2,  24 => 2,  19 => 1,  524 => 344,  519 => 289,  514 => 17,  504 => 345,  502 => 344,  444 => 289,  435 => 282,  416 => 279,  409 => 278,  405 => 277,  237 => 111,  231 => 110,  224 => 106,  216 => 105,  212 => 104,  205 => 103,  202 => 102,  199 => 101,  196 => 100,  192 => 98,  190 => 97,  179 => 95,  176 => 94,  173 => 93,  168 => 91,  163 => 89,  155 => 88,  151 => 87,  148 => 86,  145 => 85,  142 => 84,  139 => 83,  135 => 82,  130 => 79,  124 => 78,  119 => 77,  114 => 76,  112 => 75,  55 => 29,  40 => 17,  22 => 1,  116 => 28,  113 => 27,  107 => 26,  103 => 24,  88 => 26,  84 => 21,  79 => 20,  77 => 19,  72 => 10,  68 => 13,  63 => 14,  60 => 19,  54 => 11,  50 => 16,  47 => 8,  42 => 18,  39 => 5,  34 => 3,  31 => 2,);
    }
}
