<?php

/* /applications/projects/layouts/users/users_table.html */
class __TwigTemplate_1e6297ba3f8d22d9f27e2758a446e0cbf6bb7a7dbf6cb23a83ea6667b51a596c extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("
<table class=\"table table-hover table_style no_padding_right no_padding_left\">
    <thead>
    <tr>
        <th style=\"width: 100px;\"></th>
        <th>Имя</th>
        <th>Задачи</th>
        <th style=\"width: 10px;\">Статус</th>
        <th style=\"width: 200px;\">Контакты</th>
        <th style=\"width: 1px;\">Активность</th>
        ");
        // line 12
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 13
        echo \layout::func_from_text("    </tr>
    </thead>
    <tbody>
    ");
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 17
            echo \layout::func_from_text("        <tr ");
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "role") == "manager")) {
                echo \layout::func_from_text("class=\"success\"");
            }
            echo \layout::func_from_text(" id=\"tr_user");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">
            <td style=\"text-align: center;\"><a href=\"/users/~");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\">");
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")) {
                echo \layout::func_from_text("<img src=\"/uploads/users/ava_small/");
                echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")), "html", null, true));
                echo \layout::func_from_text("\">");
            } else {
                echo \layout::func_from_text("<img src='/source/images/no-ava-small.jpg' class=\"img-polaroid\">");
            }
            echo \layout::func_from_text("</a></td>
            <td>
                <div style=\"margin-bottom: 15px;\"><a href=\"/users/~");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a></div>
                ");
            // line 21
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "role") == "manager")) {
                echo \layout::func_from_text("<span style=\"font-weight: bold;\">Менеджер проекта</span>
                ");
            } elseif (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "role") == "user")) {
                // line 22
                echo \layout::func_from_text("<span style=\"font-weight: bold;\">Участник проекта</span>
                ");
            }
            // line 24
            echo \layout::func_from_text("                <div class=\"nickname\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</div>
            </td>
            <td>
                <div style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 27
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "all"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
            echo \layout::func_from_text("</div>
                <div style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 28
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</div>
                <div style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 29
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "in_progress"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
            echo \layout::func_from_text("</div>
                <div style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 30
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</div>
                <div style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 31
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</div>
            </td>
            <td style=\"text-align: center;\">
                <div class=\"get_ms_status user_offline big\" data-id=\"");
            // line 34
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\"></div>
            </td>
            <td>
                ");
            // line 37
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">Skype:</span> <a href=\"skype:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("?chat\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("</a>");
            }
            echo \layout::func_from_text("</div>
                ");
            // line 38
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">М. тел:</span> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone"), "html", null, true));
            }
            echo \layout::func_from_text("</div>
                ");
            // line 39
            if (((!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) && (!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")))) {
                echo \layout::func_from_text("&nbsp;");
            }
            // line 40
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 42
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
                echo \layout::func_from_text("
                ");
            } else {
                // line 43
                echo \layout::func_from_text("дата неизвестна
                ");
            }
            // line 45
            echo \layout::func_from_text("            </td>
            ");
            // line 46
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                // line 47
                echo \layout::func_from_text("            <td style=\"width: 75px;\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-primary btn-sm\" href=\"/projects/users/edit/");
                // line 49
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>
                    <a class=\"btn btn-primary btn-sm\" href=\"\" delete_project_user=\"");
                // line 50
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>
                </div>
            </td>
            ");
            }
            // line 54
            echo \layout::func_from_text("        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 56
            echo \layout::func_from_text("        <tr><td colspan=\"7\">
            <span style=\"margin-left: 10px;\">участников нет</span>
        </td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 62
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/users/users_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 62,  205 => 60,  196 => 56,  190 => 54,  183 => 50,  177 => 49,  173 => 47,  171 => 46,  168 => 45,  164 => 43,  158 => 42,  154 => 40,  150 => 39,  143 => 38,  133 => 37,  127 => 34,  119 => 31,  113 => 30,  107 => 29,  101 => 28,  95 => 27,  88 => 24,  84 => 22,  79 => 21,  69 => 20,  56 => 18,  47 => 17,  42 => 16,  37 => 13,  33 => 12,  21 => 2,  19 => 1,);
    }
}
