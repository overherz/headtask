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
    <script type =\"text/javascript\" src=\"/source/js/fancybox/jquery.fancybox.pack.js\"></script>
    <script src=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 18
    public function block_project_data($context, array $blocks = array())
    {
        // line 19
        echo \layout::func_from_text("
");
        // line 20
        $context["undate"] = false;
        // line 21
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 22
            $context["undate"] = true;
        }
        // line 24
        echo \layout::func_from_text("
<ul class=\"nav nav-tabs\" id=\"form_tabs\">
    <li class=\"active\"><a href=\"#tabs-1\">Описание</a></li>
    ");
        // line 27
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 28
            echo \layout::func_from_text("        <li><a href=\"#tabs-2\">Файлы</a></li>
    ");
        }
        // line 30
        echo \layout::func_from_text("    <li><a href=\"#tabs-3\">Логи</a></li>
</ul>

<div class=\"tab-content\">
    <div id=\"tabs-1\" class=\"tab-pane fade in active\">
        ");
        // line 35
        if ((isset($context["task_categories"]) ? $context["task_categories"] : null)) {
            // line 36
            echo \layout::func_from_text("            <div style=\"margin-bottom: 10px;\">
                ");
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["task_categories"]) ? $context["task_categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 38
                echo \layout::func_from_text("                    <div style=\"margin-bottom:5px;display: inline-block;\"><span class=\"label\" style=\"background: ");
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
            // line 40
            echo \layout::func_from_text("            </div>
        ");
        }
        // line 42
        echo \layout::func_from_text("
        <table class=\"table table-condensed table-border\" style=\"width: 700px;\" id=\"tasks_table\">
            <tr>
                <th>Приоритет</th>
                <td style=\"width: 1px;\">");
        // line 46
        echo \layout::func_from_text(lang(("task_priority_label_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority"))));
        echo \layout::func_from_text("</td>
                <th>Начало</th>
                <td>");
        // line 48
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
        echo \layout::func_from_text("</td>
            </tr>
            <tr>
                <th>Статус
                    ");
        // line 52
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
            // line 53
            echo \layout::func_from_text("                        <i class=\"fa fa-info-circle get_info\" rel=\"popover\" data-title=\"Причина отклонения\" data-content=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
            echo \layout::func_from_text("\"></i>
                    ");
        }
        // line 55
        echo \layout::func_from_text("                </th>
                <td style=\"width: 110px;\">
                    ");
        // line 57
        $context["undate"] = false;
        // line 58
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 59
            echo \layout::func_from_text("                        ");
            $context["undate"] = true;
            // line 60
            echo \layout::func_from_text("                    ");
        }
        // line 61
        echo \layout::func_from_text("
                    <div class=\"progress progress-striped ");
        // line 62
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                        <span class=\"progress-value\">");
        // line 63
        echo \layout::func_from_text(twig_escape_filter($this->env, lang(("task_status_" . $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status"))), "html", null, true));
        echo \layout::func_from_text("</span>
                        <div class=\"progress-bar ");
        // line 64
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
        // line 68
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
        // line 72
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
        // line 74
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
        // line 78
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
        // line 80
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text(" ч.</td>
            </tr>
            <tr>
                <th>Управление</th>
                <td>
                    <div class=\"btn-group\">
                        ");
        // line 86
        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) || (!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned")))) {
            // line 87
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
            // line 88
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                echo \layout::func_from_text("<a class=\"btn btn-info btn-sm\" href=\"/projects/tasks/edit/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-pencil fa-fw\"></i></a>");
            }
            // line 89
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
            // line 90
            echo \layout::func_from_text("                        ");
        }
        // line 91
        echo \layout::func_from_text("                    </div>
                </td>
                <th>Дедлайн</th>
                <td style=\"width: 1px;\" ");
        // line 94
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "diff") < 0) && ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed"))) {
            echo \layout::func_from_text("class=\"task_diff_alert\"");
        }
        echo \layout::func_from_text(">
                    ");
        // line 95
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 96
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
            // line 97
            echo \layout::func_from_text("                    ");
        }
        // line 98
        echo \layout::func_from_text("                </td>
            </tr>
        </table>
        <div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        // line 101
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>
    </div>
    ");
        // line 103
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 104
            echo \layout::func_from_text("    <div id=\"tabs-2\" class=\"tab-pane fade\">
        ");
            // line 105
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 106
            echo \layout::func_from_text("    </div>
    ");
        }
        // line 108
        echo \layout::func_from_text("    <div id=\"tabs-3\" class=\"tab-pane fade\">
    ");
        // line 109
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 110
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
            // line 119
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 120
                echo \layout::func_from_text("                <tr>
                    <td>
                        <a href=\"/users/~");
                // line 122
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
                // line 124
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
                    <td>");
                // line 125
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
                </tr>
            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo \layout::func_from_text("            </tbody>
        </table>
    ");
        }
        // line 131
        echo \layout::func_from_text("    </div>
</div>

");
        // line 134
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed") || (isset($context["comments"]) ? $context["comments"] : null))) {
            // line 135
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\">
    <li><a class=\"current\">Комментарии</a></li>
</ul>

<div class=\"all_comments\">
    ");
            // line 140
            if ((isset($context["comments"]) ? $context["comments"] : null)) {
                // line 141
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
                    // line 142
                    echo \layout::func_from_text("            ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                    $template->display($context);
                    // line 143
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
                // line 144
                echo \layout::func_from_text("    ");
            }
            // line 145
            echo \layout::func_from_text("</div>
");
        }
        // line 147
        echo \layout::func_from_text("
");
        // line 148
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 149
            echo \layout::func_from_text("<div>
    <a href=\"#\" id=\"botnewcomm\" style=\"margin-top: 10px;\" class=\"btn btn-primary comment_to_comment\" to_comment=\"0\">Добавить комментарий</a>
    <form class=\"comment_form\" style=\"display: none;\">
        <input type=\"hidden\" name=\"act\" value=\"add_comment\">
        <input type=\"hidden\" name=\"parent\" value=\"0\">
        <input type=\"hidden\" name=\"id\" value=\"");
            // line 154
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">

        <textarea style=\"height: 100px;margin-bottom: 10px;\" name=\"comment\" class=\"form-control\"></textarea><div class=\"cl\"></div>
        <a href=\"#\" class=\"btn btn-success add_comment\"><span>Добавить</span></a>
        <a href=\"#\" class=\"btn btn-danger canc_comm\"><span>Отмена</span></a>
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
        return array (  448 => 154,  441 => 149,  439 => 148,  436 => 147,  432 => 145,  429 => 144,  415 => 143,  411 => 142,  393 => 141,  391 => 140,  384 => 135,  382 => 134,  377 => 131,  372 => 128,  363 => 125,  359 => 124,  348 => 122,  344 => 120,  340 => 119,  329 => 110,  327 => 109,  324 => 108,  320 => 106,  317 => 105,  314 => 104,  312 => 103,  307 => 101,  302 => 98,  299 => 97,  288 => 96,  286 => 95,  280 => 94,  275 => 91,  272 => 90,  261 => 89,  254 => 88,  243 => 87,  241 => 86,  232 => 80,  221 => 78,  209 => 74,  198 => 72,  187 => 68,  174 => 64,  170 => 63,  164 => 62,  161 => 61,  158 => 60,  155 => 59,  152 => 58,  150 => 57,  146 => 55,  140 => 53,  138 => 52,  131 => 48,  126 => 46,  120 => 42,  116 => 40,  103 => 38,  99 => 37,  96 => 36,  94 => 35,  87 => 30,  83 => 28,  81 => 27,  76 => 24,  73 => 22,  71 => 21,  69 => 20,  66 => 19,  63 => 18,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
