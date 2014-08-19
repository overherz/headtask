<?php

/* /applications/projects/layouts/category_table.html */
class __TwigTemplate_75ceb40acfecf41f25d61d1990b3833df55a871b9790a9df19ae4b1399cf4789 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-border\" style=\"margin-top: 15px;\" id=\"category_table\">
    <thead>
    <tr>
        <th>Название</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 10
            echo \layout::func_from_text("        <tr>
            <td>
                <span class=\"label\" style=\"background: ");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";color: ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</span>
            </td>
            <td style=\"width: 80px;\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-info btn-sm edit_category\" data-id=\"");
            // line 16
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
                    <a class=\"btn btn-danger btn-sm delete_category\" data-id=\"");
            // line 17
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>
                </div>
            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 22
            echo \layout::func_from_text("        <tr id=\"cat_not_found\">
            <td colspan=\"3\">категорий не найдено</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo \layout::func_from_text("    </tbody>
</table>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/category_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 26,  63 => 22,  53 => 17,  49 => 16,  38 => 12,  34 => 10,  19 => 1,  188 => 81,  183 => 78,  180 => 77,  174 => 74,  170 => 72,  168 => 71,  165 => 70,  161 => 69,  150 => 65,  146 => 63,  137 => 56,  135 => 55,  127 => 52,  118 => 46,  109 => 40,  100 => 34,  95 => 31,  89 => 30,  85 => 28,  74 => 19,  70 => 18,  67 => 17,  64 => 16,  58 => 13,  55 => 12,  52 => 11,  44 => 8,  41 => 7,  32 => 4,  29 => 9,);
    }
}
