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
        }
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
<link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/fancybox/jquery.fancybox.css\">
");
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/fancybox/jquery.fancybox.pack.js\"></script>
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
        echo \layout::func_from_text("
        <table class=\"table table-condensed table-border\" style=\"width: 700px;margin-top: 20px;\" id=\"tasks_table\">
            <tr>
                <th>Приоритет</th>
                <td style=\"width: 1px;\">");
        // line 48
        echo \layout::func_from_text(lang(("task_priority_label_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))));
        echo \layout::func_from_text("</td>
                <th>Начало</th>
                <td>");
        // line 50
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
        echo \layout::func_from_text("</td>
            </tr>
            <tr>
                <th>Статус
                    ");
        // line 54
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
            // line 55
            echo \layout::func_from_text("                        <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
            echo \layout::func_from_text("\"></i>
                    ");
        }
        // line 57
        echo \layout::func_from_text("                </th>
                <td style=\"width: 110px;\">
                    ");
        // line 59
        $context["undate"] = false;
        // line 60
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 61
            echo \layout::func_from_text("                        ");
            $context["undate"] = true;
            // line 62
            echo \layout::func_from_text("                    ");
        }
        // line 63
        echo \layout::func_from_text("
                    <div class=\"progress progress-striped ");
        // line 64
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                        <span class=\"progress-value\">");
        // line 65
        echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
        echo \layout::func_from_text("</span>
                        <div class=\"progress-bar ");
        // line 66
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
                <td>");
        // line 70
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
        } else {
            echo \layout::func_from_text("&infin;");
        }
        echo \layout::func_from_text("</td>
            </tr>
            <tr>
                <th>Делегировано</th>
                <td style=\"width: 200px;\"><a href=\"/users/~");
        // line 74
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
        echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
                <th>Расчетное время</th>
                <td>");
        // line 76
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
                <td><a href=\"/users/~");
        // line 80
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "user_name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
                <th>Затраченное время</th>
                <td>");
        // line 82
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text(" ч.</td>
            </tr>
            <tr>
                <th>Управление</th>
                <td>
                    <div class=\"btn-group\">
                        ");
        // line 88
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 89
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
                echo \layout::func_from_text("<a class=\"btn btn-success btn-sm\" forward_task=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' ><i class=\"fa fa-forward fa-fw\"></i></a>");
            }
            // line 90
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-pencil fa-fw\"></i></a>");
            }
            // line 91
            echo \layout::func_from_text("                            ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_tasks")) {
                echo \layout::func_from_text("<a class=\"btn btn-danger btn-sm\" delete_task=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" from='");
                if ((isset($context["show_task"]) ? $context["show_task"] : null)) {
                    echo \layout::func_from_text("show_task");
                }
                echo \layout::func_from_text("' href=\"\"><i class=\"fa fa-trash-o fa-fw\"></i></a>");
            }
            // line 92
            echo \layout::func_from_text("                        ");
        }
        // line 93
        echo \layout::func_from_text("                    </div>
                </td>
                <th>Дедлайн</th>
                <td style=\"width: 1px;\" ");
        // line 96
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
            echo \layout::func_from_text("class=\"task_diff_alert\"");
        }
        echo \layout::func_from_text(">
                    ");
        // line 97
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 98
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
            // line 99
            echo \layout::func_from_text("                    ");
        }
        // line 100
        echo \layout::func_from_text("                </td>
            </tr>
        </table>
        <div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        // line 103
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>
    </div>
    ");
        // line 105
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 106
            echo \layout::func_from_text("    <div id=\"tabs-2\" class=\"tab-pane fade\">
        ");
            // line 107
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 108
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 110
        echo \layout::func_from_text("    <div id=\"tabs-3\" class=\"tab-pane fade\">
    ");
        // line 111
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 112
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
            // line 121
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 122
                echo \layout::func_from_text("                <tr>
                    <td>
                        <a href=\"/users/~");
                // line 124
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
                // line 126
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
                    <td>");
                // line 127
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
                </tr>
            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 130
            echo \layout::func_from_text("            </tbody>
        </table>
    ");
        }
        // line 133
        echo \layout::func_from_text("    </div>
</div>

");
        // line 136
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed") || (isset($context["comments"]) ? $context["comments"] : null))) {
            // line 137
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\">
    <li><a class=\"current\">Комментарии</a></li>
</ul>

<div class=\"all_comments\">
    ");
            // line 142
            if ((isset($context["comments"]) ? $context["comments"] : null)) {
                // line 143
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
                    // line 144
                    echo \layout::func_from_text("            ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                    $template->display($context);
                    // line 145
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
                // line 146
                echo \layout::func_from_text("    ");
            }
            // line 147
            echo \layout::func_from_text("</div>
");
        }
        // line 149
        echo \layout::func_from_text("
");
        // line 150
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 151
            echo \layout::func_from_text("<div>
    <a href=\"#\" id=\"botnewcomm\" style=\"margin-top: 10px;\" class=\"btn btn-primary comment_to_comment\" to_comment=\"0\">Добавить комментарий</a>
    <form class=\"comment_form\" style=\"display: none;\">
        <input type=\"hidden\" name=\"act\" value=\"add_comment\">
        <input type=\"hidden\" name=\"parent\" value=\"0\">
        <input type=\"hidden\" name=\"id\" value=\"");
            // line 156
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
        return array (  454 => 156,  447 => 151,  445 => 150,  442 => 149,  438 => 147,  435 => 146,  421 => 145,  417 => 144,  399 => 143,  397 => 142,  390 => 137,  388 => 136,  383 => 133,  378 => 130,  369 => 127,  365 => 126,  354 => 124,  350 => 122,  346 => 121,  335 => 112,  333 => 111,  330 => 110,  326 => 108,  323 => 107,  320 => 106,  318 => 105,  313 => 103,  308 => 100,  305 => 99,  294 => 98,  292 => 97,  286 => 96,  281 => 93,  278 => 92,  267 => 91,  260 => 90,  249 => 89,  247 => 88,  238 => 82,  227 => 80,  215 => 76,  204 => 74,  193 => 70,  180 => 66,  176 => 65,  170 => 64,  167 => 63,  164 => 62,  161 => 61,  158 => 60,  156 => 59,  152 => 57,  146 => 55,  144 => 54,  137 => 50,  132 => 48,  126 => 44,  122 => 42,  109 => 40,  105 => 39,  101 => 37,  99 => 36,  90 => 31,  84 => 29,  82 => 28,  77 => 25,  74 => 23,  72 => 22,  70 => 21,  67 => 20,  64 => 19,  58 => 16,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
