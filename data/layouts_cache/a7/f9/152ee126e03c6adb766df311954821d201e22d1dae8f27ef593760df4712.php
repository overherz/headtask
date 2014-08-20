<?php

/* /applications/projects/layouts/tasks/task.html */
class __TwigTemplate_a7f9152ee126e03c6adb766df311954821d201e22d1dae8f27ef593760df4712 extends Twig_Template
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
        echo \layout::func_from_text("\">
    <td style=\"width: 1px;\" class=\"priority");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"), "html", null, true));
        echo \layout::func_from_text("\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_priority_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))), "html", null, true));
        echo \layout::func_from_text("\"></td>
    <td ");
        // line 3
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "cats")) {
            echo \layout::func_from_text("style=\"padding-bottom: 0;\" ");
        }
        echo \layout::func_from_text("><a href=\"/projects/tasks/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
            echo \layout::func_from_text("class=\"own_task\"");
        }
        echo \layout::func_from_text(">");
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
        echo \layout::func_from_text("        ");
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "cats")) {
            // line 8
            echo \layout::func_from_text("            <div>
                ");
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "cats"));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 10
                echo \layout::func_from_text("                    <div style=\"margin-bottom:2px;display: inline-block;\"><span class=\"label label-cat\" style=\"background: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cats"]) ? $context["cats"] : null), (isset($context["k"]) ? $context["k"] : null), array(), "array"), "name"), "html", null, true));
                echo \layout::func_from_text("</span></div>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo \layout::func_from_text("            </div>
        ");
        }
        // line 14
        echo \layout::func_from_text("    </td>
    <td style=\"width: 110px;\">
        ");
        // line 16
        $context["undate"] = false;
        // line 17
        echo \layout::func_from_text("        ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 18
            echo \layout::func_from_text("            ");
            $context["undate"] = true;
            // line 19
            echo \layout::func_from_text("        ");
        }
        // line 20
        echo \layout::func_from_text("
        <div class=\"progress progress-striped ");
        // line 21
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
            <span class=\"progress-value\">");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
        echo \layout::func_from_text("</span>
            <div class=\"progress-bar ");
        // line 23
        if ((isset($context["undate"]) ? $context["undate"] : null)) {
            echo \layout::func_from_text("progress-bar-danger");
        }
        echo \layout::func_from_text("\" role=\"progressbar\" aria-valuenow=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("%;\"></div>
        </div>
    </td>
    <td style=\"width: 200px;\"><a href=\"/users/~");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
        echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
    <td style=\"width: 1px;\" ");
        // line 27
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
            echo \layout::func_from_text("class=\"task_diff_alert\"");
        }
        echo \layout::func_from_text(">
        ");
        // line 28
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 29
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
            // line 30
            echo \layout::func_from_text("        ");
        }
        // line 31
        echo \layout::func_from_text("    </td>
    <td style=\"width: 140px;text-align: right;\">
        <div class=\"btn-group\">
            ");
        // line 34
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 35
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                echo \layout::func_from_text("<a class=\"btn btn-success btn-sm\" forward_task=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("'><i class=\"fa fa-forward fa-fw\"></i></a>");
            }
            // line 36
            echo \layout::func_from_text("                ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-pencil fa-fw\"></i></a>");
            }
            // line 37
            echo \layout::func_from_text("                ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                echo \layout::func_from_text("<a class=\"btn btn-danger btn-sm\" delete_task=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' href=\"\"><i class=\"fa fa-trash-o fa-fw\"></i></a>");
            }
            // line 38
            echo \layout::func_from_text("            ");
        }
        // line 39
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
        return array (  190 => 39,  187 => 38,  176 => 37,  169 => 36,  158 => 35,  156 => 34,  151 => 31,  148 => 30,  137 => 29,  135 => 28,  129 => 27,  119 => 26,  107 => 23,  103 => 22,  97 => 21,  94 => 20,  91 => 19,  88 => 18,  85 => 17,  83 => 16,  79 => 14,  75 => 12,  62 => 10,  58 => 9,  55 => 8,  52 => 7,  46 => 5,  44 => 4,  30 => 3,  24 => 2,  19 => 1,);
    }
}
