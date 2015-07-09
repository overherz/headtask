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
        <th>Права</th>
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
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
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
                <div style=\"margin-bottom: 5px;\"><a href=\"/users/~");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a>
                    <div style=\"font-weight: bold;\">
                        ");
            // line 22
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("role_" . $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "role"))), "html", null, true));
            echo \layout::func_from_text("
                    </div>
                <div class=\"nickname\">");
            // line 24
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</div>
                </div>
                <span style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 26
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "all"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
            echo \layout::func_from_text("</span>
                <span style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 27
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "new"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</span>
                <span style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 28
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "in_progress"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
            echo \layout::func_from_text("</span>
                <span style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 29
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "closed"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</span>
                <span style=\"white-space: nowrap;\"><span class=\"label label-info\">");
            // line 30
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text("</span> ");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), array(), "array", false, true), "rejected"), 0)) : (0))), "html", null, true));
            echo \layout::func_from_text("</span>
            </td>
            <td>
                ");
            // line 33
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "role") == "manager")) {
                // line 34
                echo \layout::func_from_text("                все
                ");
            } else {
                // line 36
                echo \layout::func_from_text("                    <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-html='true' data-content=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("
                    ");
                // line 37
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "rights"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                    // line 38
                    echo \layout::func_from_text("                        ");
                    if (((isset($context["group"]) ? $context["group"] : null) != $this->getAttribute($this->getAttribute((isset($context["rights"]) ? $context["rights"] : null), (isset($context["r"]) ? $context["r"] : null), array(), "array"), "id_access_group"))) {
                        // line 39
                        echo \layout::func_from_text("                            ");
                        $context["group"] = $this->getAttribute($this->getAttribute((isset($context["rights"]) ? $context["rights"] : null), (isset($context["r"]) ? $context["r"] : null), array(), "array"), "id_access_group");
                        // line 40
                        echo \layout::func_from_text("                                ");
                        if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first"))) {
                            echo \layout::func_from_text("<hr style='margin: 5px 0;'>");
                        }
                        // line 41
                        echo \layout::func_from_text("                        ");
                    }
                    // line 42
                    echo \layout::func_from_text("                        ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["rights"]) ? $context["rights"] : null), (isset($context["r"]) ? $context["r"] : null), array(), "array"), "name"), "html", null, true));
                    if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                        echo \layout::func_from_text(" <br> ");
                    }
                    // line 43
                    echo \layout::func_from_text("                    ");
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo \layout::func_from_text("                    \"></i>
                ");
            }
            // line 46
            echo \layout::func_from_text("            </td>
            <td style=\"text-align: center;\">
                <div class=\"get_ms_status user_offline big\" data-id=\"");
            // line 48
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\"></div>
            </td>
            <td>
                ");
            // line 51
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">Skype:</span> <a href=\"skype:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("?chat\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("</a>");
            }
            echo \layout::func_from_text("</div>
                ");
            // line 52
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">М. тел:</span> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone"), "html", null, true));
            }
            echo \layout::func_from_text("</div>
                ");
            // line 53
            if (((!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) && (!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")))) {
                echo \layout::func_from_text("&nbsp;");
            }
            // line 54
            echo \layout::func_from_text("            </td>
            <td>
                ");
            // line 56
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
                echo \layout::func_from_text("
                ");
            } else {
                // line 57
                echo \layout::func_from_text("дата неизвестна
                ");
            }
            // line 59
            echo \layout::func_from_text("            </td>
            ");
            // line 60
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "users")) {
                // line 61
                echo \layout::func_from_text("            <td style=\"width: 75px;\">
                <div class=\"btn-group pull-right\">
                    <a class=\"btn btn-primary btn-sm\" href=\"/projects/users/edit/");
                // line 63
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\"><i class=\"fa fa-pencil\"></i></a>
                    <a class=\"btn btn-primary btn-sm\" href=\"\" delete_project_user=\"");
                // line 64
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-trash-o\"></i></a>
                </div>
            </td>
            ");
            }
            // line 68
            echo \layout::func_from_text("        </tr>
    ");
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 70
            echo \layout::func_from_text("        <tr><td colspan=\"7\">
            <span style=\"margin-left: 10px;\">участников нет</span>
        </td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 76
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
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
        return array (  295 => 76,  291 => 74,  282 => 70,  268 => 68,  261 => 64,  255 => 63,  251 => 61,  249 => 60,  246 => 59,  242 => 57,  236 => 56,  232 => 54,  228 => 53,  221 => 52,  211 => 51,  205 => 48,  201 => 46,  197 => 44,  183 => 43,  177 => 42,  174 => 41,  169 => 40,  166 => 39,  163 => 38,  146 => 37,  141 => 36,  137 => 34,  135 => 33,  127 => 30,  121 => 29,  115 => 28,  109 => 27,  103 => 26,  98 => 24,  93 => 22,  82 => 20,  69 => 18,  60 => 17,  42 => 16,  37 => 13,  33 => 12,  21 => 2,  19 => 1,);
    }
}
