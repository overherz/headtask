<?php

/* /applications/projects/layouts/tasks/task.html */
class __TwigTemplate_7f4ce7a7f82fe260dcde1abf7e6ff35351a7b785a4721233705c6b5cf9cdc76e extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"task");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
            echo \layout::func_from_text("class='danger'");
        }
        echo \layout::func_from_text(">
    ");
        // line 2
        if ((isset($context["all"]) ? $context["all"] : null)) {
            // line 3
            echo \layout::func_from_text("    <td><a href=\"/projects/tasks/show/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                echo \layout::func_from_text("class=\"own_task\"");
            }
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
    ");
            // line 4
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                // line 5
                echo \layout::func_from_text("        <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
                echo \layout::func_from_text("\"></i>
    ");
            }
            // line 7
            echo \layout::func_from_text("    </td>
    ");
        }
        // line 9
        echo \layout::func_from_text("    <td style=\"width: 110px;\">
        ");
        // line 10
        $context["undate"] = false;
        // line 11
        echo \layout::func_from_text("        ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 12
            echo \layout::func_from_text("            ");
            $context["undate"] = true;
            // line 13
            echo \layout::func_from_text("        ");
        }
        // line 14
        echo \layout::func_from_text("
        <div class=\"progress progress-striped ");
        // line 15
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                    <span class=\"progress-value\">
                                            ");
        // line 17
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
            echo \layout::func_from_text("новая
                                            ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            // line 18
            echo \layout::func_from_text("в процессе
                                            ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
            // line 19
            echo \layout::func_from_text("закрытая
                                            ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
            // line 20
            echo \layout::func_from_text("отклоненная
                                            ");
        }
        // line 22
        echo \layout::func_from_text("                    </span>
            <div class=\"progress-bar ");
        // line 23
        if ((isset($context["undate"]) ? $context["undate"] : null)) {
            echo \layout::func_from_text("progress-bar-danger");
        }
        echo \layout::func_from_text("\" role=\"progressbar\" aria-valuenow=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("%;\">
            </div>
        </div>
    </td>
    <td style=\"width: 1px;\">
        ");
        // line 28
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
            echo \layout::func_from_text("<span class=\"label label-default\">низкий</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
            // line 29
            echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
            // line 30
            echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
            // line 31
            echo \layout::func_from_text("<span class=\"label label-danger\">критический</span>
        ");
        }
        // line 33
        echo \layout::func_from_text("    </td>
    <td style=\"width: 1px;white-space: nowrap;\"><a href=\"/users/~");
        // line 34
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
        echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
    ");
        // line 35
        if ((!(isset($context["all"]) ? $context["all"] : null))) {
            // line 36
            echo \layout::func_from_text("    <td>");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(" - ");
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 37
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
                echo \layout::func_from_text(" ч.");
            } else {
                echo \layout::func_from_text("не указано");
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 38
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text(" ч.</td>
    <td><a href=\"/users/~");
            // line 39
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "user_name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
    ");
        }
        // line 41
        echo \layout::func_from_text("    <td style=\"width: 1px;white-space: nowrap;\">
        ");
        // line 42
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 43
            echo \layout::func_from_text("            ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "0") && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "inf"))) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff"), "html", null, true));
                echo \layout::func_from_text(" ");
                echo \layout::func_from_text(twig_escape_filter($this->env, lang("days", $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff")), "html", null, true));
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") == "inf")) {
                echo \layout::func_from_text("&infin;");
            } else {
                echo \layout::func_from_text("сегодня");
            }
            // line 44
            echo \layout::func_from_text("        ");
        }
        // line 45
        echo \layout::func_from_text("    </td>
    <td style=\"width: 120px;text-align: right;\">
        <div class=\"btn-group\">
            ");
        // line 48
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 49
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                echo \layout::func_from_text("<a class=\"btn btn-success btn-sm\" forward_task=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' style=\"padding: 5px 10px !important;\"><i class=\"fa fa-forward\"></i></a>");
            }
            // line 50
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>");
            }
            // line 51
            echo \layout::func_from_text("                ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                echo \layout::func_from_text("<a class=\"btn btn-danger btn-sm\" delete_task=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' href=\"\"><i class=\"fa fa-trash-o\"></i></a>");
            }
            // line 52
            echo \layout::func_from_text("            ");
        }
        // line 53
        echo \layout::func_from_text("        </div>
    </td>
</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/tasks/task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 53,  231 => 52,  220 => 51,  213 => 50,  200 => 48,  195 => 45,  181 => 43,  179 => 42,  176 => 41,  165 => 39,  152 => 37,  143 => 36,  141 => 35,  128 => 33,  124 => 31,  120 => 30,  111 => 28,  97 => 23,  70 => 15,  53 => 9,  28 => 2,  82 => 18,  37 => 15,  84 => 10,  80 => 8,  211 => 41,  202 => 49,  192 => 44,  189 => 38,  182 => 35,  172 => 34,  164 => 33,  161 => 38,  159 => 31,  156 => 30,  146 => 29,  138 => 28,  135 => 27,  121 => 24,  113 => 23,  110 => 22,  105 => 20,  101 => 19,  93 => 18,  89 => 16,  63 => 13,  56 => 10,  46 => 9,  38 => 8,  35 => 7,  23 => 3,  79 => 15,  76 => 17,  62 => 13,  60 => 12,  50 => 9,  21 => 1,  58 => 11,  47 => 8,  36 => 4,  27 => 6,  75 => 19,  61 => 12,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  140 => 55,  131 => 34,  129 => 55,  117 => 46,  108 => 21,  100 => 39,  92 => 37,  83 => 31,  74 => 27,  44 => 7,  41 => 4,  34 => 2,  31 => 2,  78 => 20,  71 => 14,  68 => 15,  65 => 6,  54 => 10,  51 => 12,  43 => 5,  40 => 3,  33 => 6,  30 => 3,  119 => 46,  116 => 29,  106 => 38,  102 => 36,  96 => 34,  94 => 22,  90 => 20,  86 => 19,  81 => 19,  77 => 17,  69 => 21,  67 => 14,  64 => 13,  57 => 17,  52 => 13,  49 => 7,  42 => 8,  39 => 16,  32 => 4,  29 => 3,);
    }
}
