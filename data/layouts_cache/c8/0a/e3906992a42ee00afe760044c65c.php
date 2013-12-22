<?php

/* /applications/projects/layouts/tasks/task.html */
class __TwigTemplate_c80ae3906992a42ee00afe760044c65c extends Twig_Template
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
            echo \layout::func_from_text("class='error'");
        }
        echo \layout::func_from_text(">
    <td style=\"text-align: center;width: 10px;\">");
        // line 2
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
            echo \layout::func_from_text("<i class=\"icon-user\" style=\"font-size: 20px;\"></i>");
        }
        echo \layout::func_from_text("</td>
    ");
        // line 3
        if ((isset($context["all"]) ? $context["all"] : null)) {
            // line 4
            echo \layout::func_from_text("    <td><a href=\"/projects/tasks/show/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
    ");
        }
        // line 6
        echo \layout::func_from_text("    <td>
        ");
        // line 7
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
            echo \layout::func_from_text("новая
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            // line 8
            echo \layout::func_from_text("в процессе
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
            // line 9
            echo \layout::func_from_text("закрытая
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
            // line 10
            echo \layout::func_from_text("отклоненная
        <i class=\"icon icon-info-sign get_info\" rel=\"popover\" data-original-title=\"Причина отклонения\" data-content=\"");
            // line 11
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
            echo \layout::func_from_text("\"></i>
        ");
        }
        // line 13
        echo \layout::func_from_text("    </td>
    <td>
        ");
        // line 15
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "1")) {
            echo \layout::func_from_text("<span class=\"label\">низкий</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "2")) {
            // line 16
            echo \layout::func_from_text("<span class=\"label label-success\">обычный</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "3")) {
            // line 17
            echo \layout::func_from_text("<span class=\"label label-warning\">высокий</span>
        ");
        } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == "4")) {
            // line 18
            echo \layout::func_from_text("<span class=\"label label-important\">критический</span>
        ");
        }
        // line 20
        echo \layout::func_from_text("    </td>
    <td><a href=\"/users/~");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
        echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
        echo \layout::func_from_text("</a><div class=\"nickname\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_nickname"), "html", null, true));
        echo \layout::func_from_text("</div></td>
    ");
        // line 22
        if ((isset($context["all"]) ? $context["all"] : null)) {
            // line 23
            echo \layout::func_from_text("    <td>
        ");
            // line 24
            $context["undate"] = false;
            // line 25
            echo \layout::func_from_text("        ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
                // line 26
                echo \layout::func_from_text("            ");
                $context["undate"] = true;
                // line 27
                echo \layout::func_from_text("        ");
            }
            // line 28
            echo \layout::func_from_text("
        <div class=\"progress progress-striped ");
            // line 29
            if ((isset($context["undate"]) ? $context["undate"] : null)) {
                echo \layout::func_from_text("progress-danger");
            }
            echo \layout::func_from_text(" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
            <div class=\"bar\" style=\"width: ");
            // line 30
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
                echo \layout::func_from_text("0%;");
            } else {
                echo \layout::func_from_text("30px;");
            }
            echo \layout::func_from_text("text-align: right;\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
                echo \layout::func_from_text("data-width=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
                echo \layout::func_from_text("\"");
            }
            echo \layout::func_from_text(">
                <span class=\"progress_text\">");
            // line 31
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text(" %</span>
            </div>
        </div>
    </td>
    ");
        }
        // line 36
        echo \layout::func_from_text("    ");
        if ((!(isset($context["all"]) ? $context["all"] : null))) {
            // line 37
            echo \layout::func_from_text("    <td>");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("</td>
    <td>");
            // line 38
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 39
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
                echo \layout::func_from_text(" ч.");
            } else {
                echo \layout::func_from_text("не указано");
            }
            echo \layout::func_from_text("</td>
    <td>");
            // line 40
            echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), 0)) : (0)), "html", null, true));
            echo \layout::func_from_text(" ч.</td>
    <td><a href=\"/users/~");
            // line 41
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "user_name"), "html", null, true));
            echo \layout::func_from_text("</a><div class=\"nickname\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "user_nickname"), "html", null, true));
            echo \layout::func_from_text("</div></td>
    ");
        }
        // line 43
        echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            ");
        // line 45
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 46
            echo \layout::func_from_text("            ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                echo \layout::func_from_text("<a class=\"btn btn-success btn-small\" close_task=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("'><i class=\"icon-off white\"></i></a>");
            }
            // line 47
            echo \layout::func_from_text("            <a class=\"btn btn-info btn-small\" href=\"/projects/tasks/edit/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"icon-pencil white\"></i></a>
            ");
            // line 48
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                echo \layout::func_from_text("<a class=\"btn btn-danger btn-small\" delete_task=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' href=\"\"><i class=\"icon-trash white\"></i></a>");
            }
            // line 49
            echo \layout::func_from_text("            ");
        }
        // line 50
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
        return array (  230 => 50,  227 => 49,  217 => 48,  212 => 47,  201 => 46,  199 => 45,  195 => 43,  182 => 41,  178 => 40,  169 => 39,  163 => 38,  158 => 37,  155 => 36,  147 => 31,  133 => 30,  123 => 29,  120 => 28,  117 => 27,  114 => 26,  111 => 25,  109 => 24,  106 => 23,  104 => 22,  92 => 21,  77 => 16,  72 => 15,  68 => 13,  63 => 11,  56 => 9,  47 => 7,  44 => 6,  36 => 4,  28 => 2,  107 => 44,  103 => 42,  99 => 40,  96 => 39,  82 => 38,  78 => 37,  60 => 10,  58 => 35,  41 => 21,  19 => 1,  84 => 10,  80 => 8,  65 => 6,  61 => 5,  43 => 22,  40 => 3,  34 => 3,  21 => 1,  108 => 44,  105 => 43,  95 => 36,  89 => 20,  85 => 18,  81 => 17,  69 => 21,  67 => 20,  64 => 19,  57 => 15,  52 => 8,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
