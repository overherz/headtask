<?php

/* /applications/users/layouts/admin/elements/all_result.html */
class __TwigTemplate_c721ca509a21656bde8d6361e3e2aca75bc6e85709e2b601598880f58c99361e extends Twig_Template
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
        $this->env->loadTemplate("/source/admin/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("    <table class=\"table table-bordered table-striped table-condensed\" all_users>
    <thead>
    <tr>
        <th>Email</th>
        <th>ФИО</th>
        <th>Ник</th>
        <th>Зарегистрирован</th>
        <th style=\"white-space: nowrap;\">Группа</th>
        <th colspan=\"2\">Управление</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["k"] => $context["d"]) {
            // line 15
            echo \layout::func_from_text("    <tr user=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
            echo \layout::func_from_text("\">
        <td class=\"w1\"><a href=\"mailto:");
            // line 16
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "email"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "email"), "html", null, true));
            echo \layout::func_from_text("</a></td>
        <td style=\"width:2000px;\">");
            // line 17
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td>");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "nickname"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td>");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "created"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td style=\"white-space: nowrap;color:");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "group_color"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td class=\"w1\">
            ");
            // line 22
            if ((($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "id_group") == 1) || ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id_group") != 1))) {
                echo \layout::func_from_text("<a class=\"fa fa-15x fa-edit edit-btn\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\"></a>");
            }
            // line 23
            echo \layout::func_from_text("        </td>
        <td class=\"w1\">
            ");
            // line 25
            if (((isset($context["k"]) ? $context["k"] : null) != 1)) {
                // line 26
                echo \layout::func_from_text("                ");
                if ((($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "id_group") == 1) || ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id_group") != 1))) {
                    echo \layout::func_from_text("<a class=\"fa fa-15x fa-trash-o del-btn\" id=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                    echo \layout::func_from_text("\"></a>");
                }
                // line 27
                echo \layout::func_from_text("            ");
            }
            // line 28
            echo \layout::func_from_text("        </td>
    </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 31
            echo \layout::func_from_text("    <tr><td colspan=\"7\">Ничего не найдено</td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo \layout::func_from_text("        <tr>
            <td colspan=\"5\" style=\"width:2000px;\">&nbsp;</td>
            <td colspan=\"2\"><a title=\"Добавить\" class=\"fa fa-15x fa-plus add-btn\"></a></td>
        </tr>
    </tbody>
    </table>
");
    }

    public function getTemplateName()
    {
        return "/applications/users/layouts/admin/elements/all_result.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 33,  99 => 31,  89 => 27,  82 => 26,  80 => 25,  76 => 23,  70 => 22,  63 => 20,  59 => 19,  51 => 17,  35 => 14,  21 => 2,  19 => 1,  526 => 346,  521 => 289,  516 => 17,  506 => 347,  504 => 346,  444 => 289,  435 => 282,  416 => 279,  409 => 278,  405 => 277,  237 => 111,  231 => 110,  224 => 106,  216 => 105,  212 => 104,  205 => 103,  202 => 102,  199 => 101,  196 => 100,  192 => 98,  190 => 97,  179 => 95,  176 => 94,  173 => 93,  168 => 91,  163 => 89,  155 => 88,  151 => 87,  148 => 86,  145 => 85,  142 => 84,  139 => 83,  135 => 82,  130 => 79,  124 => 78,  119 => 77,  114 => 76,  112 => 75,  72 => 40,  68 => 39,  55 => 18,  42 => 18,  40 => 15,  22 => 1,  104 => 24,  102 => 23,  98 => 21,  92 => 28,  88 => 18,  73 => 16,  69 => 15,  64 => 14,  62 => 13,  57 => 12,  53 => 11,  48 => 8,  45 => 16,  39 => 4,  36 => 3,  30 => 2,);
    }
}
