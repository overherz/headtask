<?php

/* /applications/groups/layouts/admin/elements/group.html */
class __TwigTemplate_afa6b7bcdbab3c2879b8fb4964820b2ce9537827bf2b8ac01b01b6a457df966f extends Twig_Template
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
        echo \layout::func_from_text("<tr group=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td group_option=\"");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "count"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td class=\"td-align-middle\" style=\"width: 1px;\"><a title=\"Изменить\" class=\"fa fa-15x fa-edit edit-btn\" id=\"");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle\" style=\"width: 1px;\">");
        // line 5
        if (($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id") != 1)) {
            echo \layout::func_from_text("<a title=\"Удалить\" class=\"fa fa-15x fa-trash-o del-btn\" id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"></a>");
        }
        echo \layout::func_from_text("</td>
</tr>
");
    }

    public function getTemplateName()
    {
        return "/applications/groups/layouts/admin/elements/group.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  36 => 4,  24 => 2,  67 => 14,  49 => 12,  32 => 3,  21 => 2,  19 => 1,  70 => 18,  68 => 17,  65 => 16,  62 => 15,  56 => 12,  53 => 13,  50 => 10,  42 => 7,  39 => 6,  34 => 3,  31 => 2,);
    }
}
