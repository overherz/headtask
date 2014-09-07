<?php

/* applications/projects/layouts/tasks/show_task.html */
class __TwigTemplate_96757e7e6cbc1d42ff73e84aac9690bc7fbf3d4bfe12017d3656b0e1b1bdd18b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        if ((isset($context["task"]) ? $context["task"] : null)) {
            echo \layout::func_from_text("Задача - ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text(". Проект ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        }
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
<link rel=\"stylesheet\" type=\"text/css\" href=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/fancybox/", 1 => "jquery.fancybox.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script type =\"text/javascript\" src=\"");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/ckeditor/", 1 => "ckeditor.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
    <script type =\"text/javascript\" src=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/fancybox/", 1 => "jquery.fancybox.pack.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
    <script src=\"");
        // line 16
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 19
    public function block_project_data($context, array $blocks = array())
    {
        // line 20
        echo \layout::func_from_text("
");
        // line 21
        $context["undate"] = false;
        // line 22
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 23
            $context["undate"] = true;
        }
        // line 25
        echo \layout::func_from_text("
<ul class=\"nav nav-tabs\" id=\"form_tabs\">
    <li class=\"active\"><a href=\"#tabs-1\">Описание</a></li>
    ");
        // line 28
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 29
            echo \layout::func_from_text("        <li><a href=\"#tabs-2\" style=\"padding-right: 30px;\">Файлы <span class=\"label label-default\" style=\"position: absolute; top:0;right: 0;padding:3px;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["files"]) ? $context["files"] : null)), "html", null, true));
            echo \layout::func_from_text("</span></a></li>
    ");
        }
        // line 31
        echo \layout::func_from_text("    <li><a href=\"#tabs-3\" style=\"padding-right: 30px;\">Логи <span class=\"label label-default\" style=\"position: absolute; top:0;right: 0;padding:3px;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["logs"]) ? $context["logs"] : null)), "html", null, true));
        echo \layout::func_from_text("</span></a></li>
</ul>

<div class=\"tab-content\">
    <div id=\"tabs-1\" class=\"tab-pane fade in active\">
        ");
        // line 36
        if ((isset($context["task_categories"]) ? $context["task_categories"] : null)) {
            // line 37
            echo \layout::func_from_text("            <div>
                Метки:
                ");
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["task_categories"]) ? $context["task_categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 40
                echo \layout::func_from_text("                    <div style=\"margin-bottom:2px;display: inline-block;\"><span class=\"label label-cat\" style=\"background: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</span></div>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo \layout::func_from_text("            </div>
        ");
        }
        // line 44
        echo \layout::func_from_text("        ");
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 45
            echo \layout::func_from_text("            <div>
                Файлы:
                ");
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 48
                echo \layout::func_from_text("                    ");
                if (($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "type") == "image")) {
                    // line 49
                    echo \layout::func_from_text("                        <a href=\"/uploads/projects/projects_big/");
                    echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
                    echo \layout::func_from_text("\" download=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a>
                    ");
                } else {
                    // line 51
                    echo \layout::func_from_text("                        <a href=\"/uploads/projects/");
                    echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
                    echo \layout::func_from_text("\" download=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a>
                    ");
                }
                // line 53
                echo \layout::func_from_text("                ");
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    echo \layout::func_from_text(", ");
                }
                // line 54
                echo \layout::func_from_text("                ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo \layout::func_from_text("            </div>
        ");
        }
        // line 57
        echo \layout::func_from_text("
        <table class=\"table table-condensed table-border\" style=\"width: 700px;margin-top: 20px;\" id=\"tasks_table\">
            <tr>
                <th>Приоритет</th>
                <td style=\"width: 1px;\">");
        // line 61
        echo \layout::func_from_text(lang(("task_priority_label_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))));
        echo \layout::func_from_text("</td>
                <th>Начало</th>
                <td>
                    ");
        // line 64
        if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"))) {
            // line 65
            echo \layout::func_from_text("                        сегодня
                    ");
        } else {
            // line 67
            echo \layout::func_from_text("                        ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("
                    ");
        }
        // line 69
        echo \layout::func_from_text("                </td>
            </tr>
            <tr>
                <th>Статус
                    ");
        // line 73
        if (((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "feedback")) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message") != ""))) {
            // line 74
            echo \layout::func_from_text("                        <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Сообщение\" data-content=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
            echo \layout::func_from_text("\"></i>
                    ");
        }
        // line 76
        echo \layout::func_from_text("                </th>
                <td style=\"width: 110px;\">
                    ");
        // line 78
        $context["undate"] = false;
        // line 79
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 80
            echo \layout::func_from_text("                        ");
            $context["undate"] = true;
            // line 81
            echo \layout::func_from_text("                    ");
        }
        // line 82
        echo \layout::func_from_text("
                    <div class=\"progress progress-striped ");
        // line 83
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                        <span class=\"progress-value\">");
        // line 84
        echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
        echo \layout::func_from_text("</span>
                        <div class=\"progress-bar ");
        // line 85
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
                <th>Окончание</th>
                <td>
                    ");
        // line 90
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
            // line 91
            echo \layout::func_from_text("                        ");
            if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"))) {
                // line 92
                echo \layout::func_from_text("                            сегодня
                        ");
            } else {
                // line 94
                echo \layout::func_from_text("                            ");
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
                echo \layout::func_from_text("
                        ");
            }
            // line 96
            echo \layout::func_from_text("                    ");
        } else {
            echo \layout::func_from_text("&infin;
                    ");
        }
        // line 98
        echo \layout::func_from_text("                </td>
            </tr>
            <tr>
                <th>Делегировано</th>
                <td style=\"width: 200px;\">
                    ");
        // line 103
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"))) {
            // line 104
            echo \layout::func_from_text("                        <span class=\"user_name\">мне</span>
                    ");
        } else {
            // line 106
            echo \layout::func_from_text("                        <a href=\"/users/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
            echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
            echo \layout::func_from_text("</a>
                    ");
        }
        // line 108
        echo \layout::func_from_text("                </td>
                <th>Расчетное время</th>
                <td style=\"white-space: nowrap;\">");
        // line 110
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
            echo \layout::func_from_text(" ч.");
        } else {
            echo \layout::func_from_text("не указано");
        }
        echo \layout::func_from_text("</td>
            </tr>
            <tr>
                <th>Добавил</th>
                <td>
                    ");
        // line 115
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user"))) {
            // line 116
            echo \layout::func_from_text("                        <span class=\"user_name\">я</span>
                    ");
        } else {
            // line 118
            echo \layout::func_from_text("                        <a href=\"/users/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "user_name"), "html", null, true));
            echo \layout::func_from_text("</a>
                    ");
        }
        // line 120
        echo \layout::func_from_text("                </td>
                <th>Затраченное время</th>
                <td>");
        // line 122
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text(" ч.</td>
            </tr>
            <tr>
                <th>Управление</th>
                <td>
                    <div class=\"btn-group\">
                        ");
        // line 128
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 129
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                echo \layout::func_from_text("<a class=\"btn btn-success btn-sm\" forward_task=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' ><i class=\"fa fa-forward \"></i></a>");
            }
            // line 130
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>");
            }
            // line 131
            echo \layout::func_from_text("                            ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                echo \layout::func_from_text("<a class=\"btn btn-danger btn-sm\" delete_task=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' href=\"\"><i class=\"fa fa-trash-o\"></i></a>");
            }
            // line 132
            echo \layout::func_from_text("                        ");
        }
        // line 133
        echo \layout::func_from_text("                    </div>
                </td>
                <th>Дедлайн</th>
                <td style=\"width: 1px;\" ");
        // line 136
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
            echo \layout::func_from_text("class=\"task_diff_alert\"");
        }
        echo \layout::func_from_text(">
                    ");
        // line 137
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 138
            echo \layout::func_from_text("                        ");
            if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "0") && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") != "inf"))) {
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff"), "html", null, true));
                echo \layout::func_from_text(" ");
                echo \layout::func_from_text(twig_escape_filter($this->env, lang("days", $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff")), "html", null, true));
            } elseif (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") == "inf")) {
                echo \layout::func_from_text("&infin;");
            } else {
                echo \layout::func_from_text("сегодня");
            }
            // line 139
            echo \layout::func_from_text("                    ");
        }
        // line 140
        echo \layout::func_from_text("                </td>
            </tr>
        </table>
        <div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        // line 143
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>
    </div>
    ");
        // line 145
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 146
            echo \layout::func_from_text("    <div id=\"tabs-2\" class=\"tab-pane fade\">
        ");
            // line 147
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 148
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 150
        echo \layout::func_from_text("    <div id=\"tabs-3\" class=\"tab-pane fade\">
    ");
        // line 151
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 152
            echo \layout::func_from_text("        <table class=\"table table-hover table-condensed table-border\">
            <thead>
            <tr>
                <th>Пользователь</th>
                <th>Дата</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            ");
            // line 161
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 162
                echo \layout::func_from_text("                <tr>
                    <td>
                        <a href=\"/users/~");
                // line 164
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
                    </td>
                    <td>");
                // line 166
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i"), "html", null, true));
                echo \layout::func_from_text("</td>
                    <td>");
                // line 167
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
                </tr>
            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            echo \layout::func_from_text("            </tbody>
        </table>
    ");
        }
        // line 173
        echo \layout::func_from_text("    </div>
</div>

");
        // line 176
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed") || (isset($context["comments"]) ? $context["comments"] : null))) {
            // line 177
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\">
    <li><a class=\"current\">Комментарии</a></li>
</ul>

<div class=\"all_comments\">
    ");
            // line 182
            if ((isset($context["comments"]) ? $context["comments"] : null)) {
                // line 183
                echo \layout::func_from_text("        ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : null));
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
                foreach ($context['_seq'] as $context["_key"] => $context["com"]) {
                    // line 184
                    echo \layout::func_from_text("            ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                    $template->display($context);
                    // line 185
                    echo \layout::func_from_text("        ");
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['com'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 186
                echo \layout::func_from_text("    ");
            }
            // line 187
            echo \layout::func_from_text("</div>
");
        }
        // line 189
        echo \layout::func_from_text("
");
        // line 190
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 191
            echo \layout::func_from_text("<div>
    <a href=\"#\" id=\"botnewcomm\" style=\"margin-top: 10px;\" class=\"btn btn-primary comment_to_comment\" to_comment=\"0\">Добавить комментарий</a>
    <form class=\"comment_form\" style=\"display: none;\">
        <input type=\"hidden\" name=\"act\" value=\"add_comment\">
        <input type=\"hidden\" name=\"parent\" value=\"0\">
        <input type=\"hidden\" name=\"id\" value=\"");
            // line 196
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">

        <textarea style=\"height: 100px;\" name=\"comment\" class=\"form-control\"></textarea><div class=\"cl\"></div>
        <div style=\"margin-top: 10px;\">
            <a href=\"#\" class=\"btn btn-success add_comment\"><span>Добавить</span></a>
            <a href=\"#\" class=\"btn btn-danger canc_comm\"><span>Отмена</span></a>
        </div>
        <div class=\"cl\"></div>
    </form>
</div>
");
        }
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/show_task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  588 => 196,  581 => 191,  579 => 190,  576 => 189,  572 => 187,  569 => 186,  555 => 185,  551 => 184,  533 => 183,  531 => 182,  524 => 177,  522 => 176,  517 => 173,  512 => 170,  503 => 167,  499 => 166,  488 => 164,  484 => 162,  480 => 161,  469 => 152,  467 => 151,  464 => 150,  460 => 148,  457 => 147,  454 => 146,  452 => 145,  447 => 143,  442 => 140,  439 => 139,  428 => 138,  426 => 137,  420 => 136,  415 => 133,  412 => 132,  401 => 131,  394 => 130,  383 => 129,  381 => 128,  372 => 122,  368 => 120,  356 => 118,  352 => 116,  350 => 115,  337 => 110,  333 => 108,  321 => 106,  317 => 104,  315 => 103,  308 => 98,  302 => 96,  296 => 94,  292 => 92,  289 => 91,  287 => 90,  273 => 85,  269 => 84,  263 => 83,  260 => 82,  257 => 81,  254 => 80,  251 => 79,  249 => 78,  245 => 76,  239 => 74,  237 => 73,  231 => 69,  225 => 67,  221 => 65,  219 => 64,  213 => 61,  207 => 57,  203 => 55,  189 => 54,  184 => 53,  174 => 51,  164 => 49,  161 => 48,  144 => 47,  140 => 45,  137 => 44,  133 => 42,  120 => 40,  116 => 39,  112 => 37,  110 => 36,  101 => 31,  95 => 29,  93 => 28,  88 => 25,  85 => 23,  83 => 22,  81 => 21,  78 => 20,  75 => 19,  69 => 16,  65 => 15,  61 => 14,  57 => 13,  54 => 12,  48 => 9,  44 => 8,  41 => 7,  32 => 4,  29 => 3,);
    }
}
