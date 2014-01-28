<?php

/* /applications/options/layouts/admin/elements/group.html */
class __TwigTemplate_834ed901a3013f3a5669a0a3dd6742c3 extends Twig_Template
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
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td group_option=\"");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" class=\"cursor\" ");
        if ($this->getAttribute((isset($context["op"]) ? $context["op"] : null), "sub")) {
            echo \layout::func_from_text("style=\"font-weight: bold;\" ");
        }
        echo \layout::func_from_text(">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td><a href=\"\" open_options=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">открыть</a></td>
    ");
        // line 4
        if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
            // line 5
            echo \layout::func_from_text("    <td class=\"td-align-middle\"><a title=\"Изменить\" class=\"edit-btn edit-btn-category\" id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle\"><a title=\"Удалить\" class=\"del-btn\" id=\"");
            // line 6
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"></a></td>
    <td class=\"td-align-middle\"><a title=\"Добавить подкатегорию\" class=\"add-btn add-subcategory\" data-id=\"");
            // line 7
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"></a></td>
    ");
        }
        // line 9
        echo \layout::func_from_text("</tr>
");
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["op"]) ? $context["op"] : null), "sub"));
        foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
            // line 11
            echo \layout::func_from_text("    <tr>
        <td class=\"cursor\" style=\"padding-left: 20px;\">");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td>&nbsp;</td>
        ");
            // line 14
            if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                // line 15
                echo \layout::func_from_text("            <td class=\"td-align-middle\"><a title=\"Изменить\" class=\"edit-btn edit-btn-subcategory\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"></a></td>
            <td class=\"td-align-middle\"><a title=\"Удалить\" class=\"del-btn\" id=\"");
                // line 16
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"></a></td>
            <td>&nbsp;</td>
        ");
            }
            // line 19
            echo \layout::func_from_text("    </tr>
");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/applications/options/layouts/admin/elements/group.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 19,  76 => 16,  71 => 15,  64 => 12,  61 => 11,  57 => 10,  54 => 9,  45 => 6,  40 => 5,  38 => 4,  24 => 2,  79 => 18,  72 => 13,  69 => 14,  55 => 11,  35 => 9,  32 => 8,  28 => 7,  21 => 2,  19 => 1,  65 => 14,  62 => 13,  59 => 12,  52 => 10,  49 => 7,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
