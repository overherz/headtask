<?php

/* /applications/pages/layouts/admin/pages-list.html */
class __TwigTemplate_baf0971e2b756e75e81a4241ab5f2941 extends Twig_Template
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
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</td>
    <td><a href=\"/pages/~");
            // line 4
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "url"), "html", null, true));
            echo \layout::func_from_text("/\">/pages/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "url"), "html", null, true));
            echo \layout::func_from_text("/</a></td>
    ");
        }
        // line 6
        echo \layout::func_from_text("    <td>");
        echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "text"), "html", null, true)));
        echo \layout::func_from_text("</td>
    <td style=\"white-space: nowrap;\">");
        // line 7
        if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "created")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        }
        echo \layout::func_from_text("</td>
    ");
        // line 8
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
        // line 9
        echo \layout::func_from_text("    ");
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            // line 10
            echo \layout::func_from_text("        <td>
            <span class=\"main_version\" main_version=\"");
            // line 11
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
            echo \layout::func_from_text("\" style=\"display:");
            if ($this->getAttribute((isset($context["i"]) ? $context["i"] : null), "main")) {
                echo \layout::func_from_text("block");
            } else {
                echo \layout::func_from_text("none");
            }
            echo \layout::func_from_text(";\"><span style=\"color:green;\">выбрано</span></span>
            <span class=\"main_version_set\" set_version=\"");
            // line 12
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
        // line 15
        echo \layout::func_from_text("    <td class=\"td-align-middle w1\"><a title=\"Изменить\" class=\"fa fa-15x fa-edit edit-btn\" id=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("-");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : null), "id_text"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle w1\"><a title=\"Удалить\" class=\"fa fa-15x fa-trash-o del-btn\" id=\"");
        // line 16
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
        return array (  102 => 16,  95 => 15,  81 => 12,  71 => 11,  68 => 10,  65 => 9,  51 => 8,  45 => 7,  40 => 6,  33 => 4,  28 => 3,  26 => 2,  19 => 1,);
    }
}
