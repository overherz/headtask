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
        return array (  136 => 21,  129 => 20,  105 => 16,  102 => 15,  99 => 14,  85 => 13,  78 => 12,  72 => 10,  65 => 8,  59 => 7,  49 => 5,  43 => 4,  28 => 3,  125 => 36,  118 => 31,  115 => 17,  109 => 29,  104 => 28,  91 => 27,  88 => 26,  70 => 25,  64 => 21,  60 => 19,  57 => 18,  53 => 6,  50 => 16,  46 => 14,  37 => 7,  35 => 6,  26 => 2,  24 => 2,  19 => 1,);
    }
}
