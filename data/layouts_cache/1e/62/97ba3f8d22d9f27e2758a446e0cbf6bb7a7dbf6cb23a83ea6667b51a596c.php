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
<table class=\"table table-border table-hover table-condensed\">
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
                ");
            // line 34
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action") >= $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "time"))) {
                // line 35
                echo \layout::func_from_text("                    <div class=\"user_online big\"></div>
                ");
            } else {
                // line 37
                echo \layout::func_from_text("                    <div class=\"user_offline big\"></div>
                ");
            }
            // line 39
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 41
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">Skype:</span> <a href=\"skype:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("?chat\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("</a>");
            }
            echo \layout::func_from_text("</div>
                ");
            // line 42
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">М. тел:</span> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone"), "html", null, true));
            }
            echo \layout::func_from_text("</div>
                ");
            // line 43
            if (((!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) && (!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")))) {
                echo \layout::func_from_text("&nbsp;");
            }
            // line 44
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 46
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
                echo \layout::func_from_text("
                ");
            } else {
                // line 47
                echo \layout::func_from_text("дата неизвестна
                ");
            }
            // line 49
            echo \layout::func_from_text("            </td>
            ");
            // line 50
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                // line 51
                echo \layout::func_from_text("            <td style=\"width: 85px;\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-primary btn-sm\" href=\"/projects/users/edit/");
                // line 53
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>
                    <a class=\"btn btn-primary btn-sm\" href=\"\" delete_project_user=\"");
                // line 54
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>
                </div>
            </td>
            ");
            }
            // line 58
            echo \layout::func_from_text("        </tr>
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
        return array (  208 => 62,  204 => 60,  197 => 58,  190 => 54,  184 => 53,  180 => 51,  178 => 50,  175 => 49,  171 => 47,  165 => 46,  161 => 44,  157 => 43,  150 => 42,  140 => 41,  136 => 39,  132 => 37,  128 => 35,  126 => 34,  118 => 31,  112 => 30,  106 => 29,  100 => 28,  94 => 27,  87 => 24,  83 => 22,  78 => 21,  68 => 20,  55 => 18,  46 => 17,  42 => 16,  37 => 13,  33 => 12,  21 => 2,  19 => 1,);
    }
}
