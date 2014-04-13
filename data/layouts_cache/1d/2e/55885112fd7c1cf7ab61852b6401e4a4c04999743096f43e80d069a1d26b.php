<?php

/* applications\users\layouts\admin/elements/all_result.html */
class __TwigTemplate_1d2e55885112fd7c1cf7ab61852b6401e4a4c04999743096f43e80d069a1d26b extends Twig_Template
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
        return "applications\\users\\layouts\\admin/elements/all_result.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 33,  99 => 31,  92 => 28,  89 => 27,  82 => 26,  80 => 25,  76 => 23,  70 => 22,  63 => 20,  59 => 19,  55 => 18,  51 => 17,  45 => 16,  40 => 15,  35 => 14,  21 => 2,  19 => 1,);
    }
}
