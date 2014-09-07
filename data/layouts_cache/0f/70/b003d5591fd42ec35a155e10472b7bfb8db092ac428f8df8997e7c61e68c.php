<?php

/* /applications/projects/layouts/logs.html */
class __TwigTemplate_0f70b003d5591fd42ec35a155e10472b7bfb8db092ac428f8df8997e7c61e68c extends Twig_Template
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
        <th style=\"width: 1px;white-space: nowrap;\">Тип</th>
        <th></th>
        <th>Описание</th>
        ");
        // line 8
        if ((isset($context["all"]) ? $context["all"] : null)) {
            echo \layout::func_from_text("<th>Проект</th>");
        }
        // line 9
        echo \layout::func_from_text("        <th>Время</th>
        <th>Пользователь</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 15
            echo \layout::func_from_text("        ");
            if (((!(isset($context["date"]) ? $context["date"] : null)) || ((isset($context["date"]) ? $context["date"] : null) != twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y")))) {
                // line 16
                echo \layout::func_from_text("        ");
                $context["date"] = twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y");
                // line 17
                echo \layout::func_from_text("        <tr>
            <td colspan=\"5\" style=\"font-size: 14px;font-weight: bold;text-align: center;\">
                ");
                // line 19
                if ((twig_date_format_filter($this->env, "", "d.m.Y") == (isset($context["date"]) ? $context["date"] : null))) {
                    // line 20
                    echo \layout::func_from_text("                    сегодня
                ");
                } else {
                    // line 22
                    echo \layout::func_from_text("                ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true));
                    echo \layout::func_from_text("
                ");
                }
                // line 24
                echo \layout::func_from_text("            </td>
        </tr>
        ");
            }
            // line 27
            echo \layout::func_from_text("        <tr>
            <td><span class=\"label label-default log_");
            // line 28
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "type"))), "html", null, true));
            echo \layout::func_from_text("</span></td>
            <td>
                ");
            // line 30
            if (($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "action") == "add")) {
                echo \layout::func_from_text("<i class=\"fa fa-plus\" style=\"color:#5cb85c;\"></i>
                ");
            } elseif (($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "action") == "edit")) {
                // line 31
                echo \layout::func_from_text("<i class=\"fa fa-pencil\" style=\"color:#5bc0de;\"></i>
                ");
            } elseif (($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "action") == "delete")) {
                // line 32
                echo \layout::func_from_text("<i class=\"fa fa-trash-o\" style=\"color:#d9534f;\"></i>
                ");
            }
            // line 34
            echo \layout::func_from_text("            </td>
            <td>");
            // line 35
            echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
            echo \layout::func_from_text("</td>
            ");
            // line 36
            if ((isset($context["all"]) ? $context["all"] : null)) {
                echo \layout::func_from_text("<td style=\"white-space: nowrap;\">");
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
            // line 37
            echo \layout::func_from_text("            <td>");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "H:i"), "html", null, true));
            echo \layout::func_from_text("</td>
            <td>
                ");
            // line 39
            if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"))) {
                // line 40
                echo \layout::func_from_text("                <span class=\"user_name\">я</span>
                ");
            } else {
                // line 42
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
                    // line 43
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "trash_name_user"), "html", null, true));
                    echo \layout::func_from_text("
                    ");
                }
                // line 45
                echo \layout::func_from_text("                ");
            }
            // line 46
            echo \layout::func_from_text("            </td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 49
            echo \layout::func_from_text("        <td colspan=\"5\" id=\"no_file\"><span style=\"margin-left: 10px;\">событий нет</span></td>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo \layout::func_from_text("    </tbody>
</table>
<div style=\"position: relative;\">");
        // line 53
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/logs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 53,  165 => 51,  158 => 49,  151 => 46,  148 => 45,  143 => 43,  129 => 42,  125 => 40,  123 => 39,  117 => 37,  103 => 36,  99 => 35,  96 => 34,  92 => 32,  88 => 31,  83 => 30,  76 => 28,  73 => 27,  68 => 24,  62 => 22,  58 => 20,  56 => 19,  52 => 17,  49 => 16,  46 => 15,  41 => 14,  34 => 9,  30 => 8,  19 => 1,);
    }
}
