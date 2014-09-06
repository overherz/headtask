<?php

/* applications/projects/layouts/logs.html */
class __TwigTemplate_571ada57d2ede507cd987b4cca260e6fa9ee865ca0d1fb4470fdece41cab2bc2 extends Twig_Template
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
        echo \layout::func_from_text("<div style=\"position: relative;\">");
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>
<table class=\"table table-hover table_style no_padding_left\">
    <thead>
    <tr>
        <th style=\"width: 1px;white-space: nowrap;\"></th>
        <th>Описание</th>
        ");
        // line 7
        if ((isset($context["all"]) ? $context["all"] : null)) {
            echo \layout::func_from_text("<th>Проект</th>");
        }
        // line 8
        echo \layout::func_from_text("        <th>Время</th>
        <th>Пользователь</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 14
            echo \layout::func_from_text("        ");
            if (((!(isset($context["date"]) ? $context["date"] : null)) || ((isset($context["date"]) ? $context["date"] : null) != twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y")))) {
                // line 15
                echo \layout::func_from_text("        ");
                $context["date"] = twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y");
                // line 16
                echo \layout::func_from_text("        <tr>
            <td colspan=\"5\" style=\"font-size: 14px;font-weight: bold;text-align: center;\">
                ");
                // line 18
                if ((twig_date_format_filter($this->env, "", "d.m.Y") == (isset($context["date"]) ? $context["date"] : null))) {
                    // line 19
                    echo \layout::func_from_text("                    сегодня
                ");
                } else {
                    // line 21
                    echo \layout::func_from_text("                ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true));
                    echo \layout::func_from_text("
                ");
                }
                // line 23
                echo \layout::func_from_text("            </td>
        </tr>
        ");
            }
            // line 26
            echo \layout::func_from_text("        <tr>
            <td><span class=\"label label-default log_");
            // line 27
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"))), "html", null, true));
            echo \layout::func_from_text("</span></td>
            <td>");
            // line 28
            echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
            echo \layout::func_from_text("</td>
            ");
            // line 29
            if ((isset($context["all"]) ? $context["all"] : null)) {
                echo \layout::func_from_text("<td>");
                if ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project")) {
                    echo \layout::func_from_text("<a href=\"/projects/~");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_project"), "html", null, true));
                    echo \layout::func_from_text("/\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "project_name"), "html", null, true));
                    echo \layout::func_from_text("</a>");
                } else {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_project_name"), "html", null, true));
                }
                echo \layout::func_from_text("</td>");
            }
            // line 30
            echo \layout::func_from_text("            <td>");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "H:i"), "html", null, true));
            echo \layout::func_from_text("</td>
            <td>
                ");
            // line 32
            if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"))) {
                // line 33
                echo \layout::func_from_text("                <span class=\"user_name\">я</span>
                ");
            } else {
                // line 35
                echo \layout::func_from_text("                    ");
                if ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user")) {
                    echo \layout::func_from_text("<a href=\"/users/~");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                    echo \layout::func_from_text("/\" style=\"color:");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                    echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                    echo \layout::func_from_text("</a>
                    ");
                } else {
                    // line 36
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_name_user"), "html", null, true));
                    echo \layout::func_from_text("
                    ");
                }
                // line 38
                echo \layout::func_from_text("                ");
            }
            // line 39
            echo \layout::func_from_text("            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 42
            echo \layout::func_from_text("        <td colspan=\"5\" id=\"no_file\"><span style=\"margin-left: 10px;\">событий нет</span></td>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo \layout::func_from_text("    </tbody>
</table>
<div style=\"position: relative;\">");
        // line 46
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/logs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 46,  147 => 44,  140 => 42,  133 => 39,  130 => 38,  125 => 36,  111 => 35,  107 => 33,  105 => 32,  99 => 30,  85 => 29,  81 => 28,  75 => 27,  72 => 26,  67 => 23,  61 => 21,  57 => 19,  55 => 18,  51 => 16,  48 => 15,  45 => 14,  40 => 13,  33 => 8,  29 => 7,  19 => 1,);
    }
}
