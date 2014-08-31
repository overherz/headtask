<?php

/* applications/projects/layouts/tasks/add_task.html */
class __TwigTemplate_b2cbd7b55bd83e504f5dfb52ddae44640cfa589a8ebb924058bf2a71298d6afa extends Twig_Template
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
            echo \layout::func_from_text("Редактирование задачи");
        } else {
            echo \layout::func_from_text("Добавление задачи");
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
        echo \layout::func_from_text("    ");
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/fancybox/jquery.fancybox.pack.js\"></script>
    ");
        // line 17
        if ((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_task")) || (!(isset($context["task"]) ? $context["task"] : null)))) {
            // line 18
            echo \layout::func_from_text("        <script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
    ");
        }
        // line 20
        echo \layout::func_from_text("    <script src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 23
    public function block_project_data($context, array $blocks = array())
    {
        // line 24
        echo \layout::func_from_text("
");
        // line 25
        if ((isset($context["task"]) ? $context["task"] : null)) {
            // line 26
            echo \layout::func_from_text("        ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_task"))) {
                $context["full_edit"] = true;
            }
        } else {
            // line 28
            echo \layout::func_from_text("    ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task")) {
                $context["full_edit"] = true;
            }
        }
        // line 30
        echo \layout::func_from_text("
<form id=\"task_form\" class=\"form-horizontal\">
    <input type=\"hidden\" name=\"act\" value=\"save_task\">
    ");
        // line 33
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 34
        echo \layout::func_from_text("    ");
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 35
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"name\">Название задачи</label>
        <div class=\"col-md-10\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
            // line 38
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"description\">Описание задачи</label>
        <div class=\"col-md-10\">
            <div class=\"wysiwyg\"><textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
            // line 44
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</textarea></div>
        </div>
    </div>
    ");
        }
        // line 48
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"status\">Статус</label>
        <div class=\"col-md-4\">
            <select name=\"status\" id=\"status\">
                ");
        // line 52
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
            echo \layout::func_from_text("<option disabled selected>Закрытая</option>");
        }
        // line 53
        echo \layout::func_from_text("                <option value=\"new\" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Новая</option>
                ");
        // line 54
        if ((isset($context["task"]) ? $context["task"] : null)) {
            // line 55
            echo \layout::func_from_text("                <option value=\"in_progress\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">В процессе</option>
                <option value=\"rejected\" ");
            // line 56
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Отклоненная</option>
                ");
        }
        // line 58
        echo \layout::func_from_text("            </select>
        </div>

        <label class=\"col-md-2 control-label rejected\" for=\"message\" ");
        // line 61
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">Причина</label>
        <div class=\"col-md-4 rejected\" ");
        // line 62
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">
            <textarea rows=\"3\" class=\"form-control\" name=\"message\" id=\"message\">");
        // line 63
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
        echo \layout::func_from_text("</textarea>
        </div>
    </div>
    ");
        // line 66
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 67
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"priority\">Приоритет</label>
        <div class=\"col-md-4\">
            <select name=\"priority\" id=\"priority\">
                <option value=\"1\" ");
            // line 71
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 1)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Низкий</option>
                <option value=\"2\" ");
            // line 72
            if (((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 2))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Обычный</option>
                <option value=\"3\" ");
            // line 73
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 3)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Высокий</option>
                <option value=\"4\" ");
            // line 74
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 4)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Критический</option>
            </select>
        </div>

        ");
            // line 78
            if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
                // line 79
                echo \layout::func_from_text("
        <label class=\"col-md-2 control-label\" for=\"assigned\">Делегировано</label>
        <div class=\"col-md-4\">
            <select name=\"assigned\" id=\"assigned\">
                <option value=\"\">&nbsp;</option>
                ");
                // line 84
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                    // line 85
                    echo \layout::func_from_text("                <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user") == $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"))) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
                    echo \layout::func_from_text("</option>
                ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 87
                echo \layout::func_from_text("            </select>
        </div>
        ");
            }
            // line 90
            echo \layout::func_from_text("    </div>
    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"start\">Начало</label>
        <div class=\"col-md-4\">
            <input type=\"text\" name=\"start\" id=\"start\" class=\"form-control\" value=\"");
            // line 94
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>

        <label class=\"col-md-2 control-label\" for=\"end\">Окончание</label>
        <div class=\"col-md-4\">
            <input type=\"text\" name=\"end\" id=\"end\" class=\"form-control\" value=\"");
            // line 99
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("\">
        </div>
    </div>
    ");
        }
        // line 103
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"percent\">% выполнения</label>
        <div class=\"col-md-4\">
            <select name=\"percent\" id=\"percent\" style=\"width: 100px;\">
                ");
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 0, 1 => 10, 2 => 20, 3 => 30, 4 => 40, 5 => 50, 6 => 60, 7 => 70, 8 => 80, 9 => 90, 10 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 108
            echo \layout::func_from_text("                    <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") == (isset($context["i"]) ? $context["i"] : null))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
            echo \layout::func_from_text(" %</option>
                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo \layout::func_from_text("            </select>
        </div>
        <label class=\"col-md-2 control-label\" for=\"estimated_time\">Расчетное время</label>
        <div class=\"col-md-4\">
            <div class=\"input-group\">
                <input type=\"text\" name=\"estimated_time\" id=\"estimated_time\" class=\"form-control\" value=\"");
        // line 115
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
        echo \layout::func_from_text("\">
                <span class=\"input-group-addon\">ч.</span>
            </div>
        </div>
    </div>
    ");
        // line 120
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 121
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"category\">Категория</label>
        <div class=\"col-md-10\">
            <table>
                ");
            // line 125
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 126
                echo \layout::func_from_text("                    <tr>
                        <td style=\"padding: 3px;\">
                            <span class=\"label\" style=\"background: ");
                // line 128
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">
                                <input type=\"checkbox\" style=\"margin-top: -2px;\" name=\"category[]\" value=\"");
                // line 129
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" ");
                if ($this->getAttribute((isset($context["task_categories"]) ? $context["task_categories"] : null), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array")) {
                    echo \layout::func_from_text("checked");
                }
                echo \layout::func_from_text("> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                            </span>
                        </td>
                    </tr>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo \layout::func_from_text("            </table>
        </div>
    </div>
    ");
        }
        // line 138
        echo \layout::func_from_text("    ");
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 139
            echo \layout::func_from_text("        <center>
            <a class=\"btn btn-warning\" href=\"\" add_file_to_task style=\"margin: 20px 0 20px 0;\">Прикрепить файлы</a>
            ");
            // line 141
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
                echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" style=\"margin: 20px 0 20px 0;\" href=\"\">Загрузить файлы</a>");
            }
            // line 142
            echo \layout::func_from_text("        </center>
        ");
            // line 143
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 144
            echo \layout::func_from_text("    ");
        }
        // line 145
        echo \layout::func_from_text("
    <div style=\"text-align: center;\">
        ");
        // line 147
        if (((isset($context["full_edit"]) ? $context["full_edit"] : null) && (!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")))) {
            // line 148
            echo \layout::func_from_text("        <div style=\"margin-bottom: 10px;\">
        Послать уведомление&nbsp;&nbsp;
            <input type=\"checkbox\" name=\"email\" checked> по email&nbsp;&nbsp;
            ");
            // line 151
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                echo \layout::func_from_text("<input type=\"checkbox\" name=\"sms\"> по смс");
            }
            // line 152
            echo \layout::func_from_text("        </div>
        ");
        }
        // line 154
        echo \layout::func_from_text("        <button class=\"btn btn-large btn-primary save_task\" type=\"button\">");
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
        ");
        // line 155
        if ((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"))) {
            // line 156
            echo \layout::func_from_text("            <button class=\"btn btn-large btn-primary save_task create_other\" type=\"button\">Сохранить и создать еще</button>
        ");
        }
        // line 158
        echo \layout::func_from_text("    </div>
</form>
<div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/add_task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 158,  411 => 156,  409 => 155,  400 => 154,  396 => 152,  392 => 151,  387 => 148,  385 => 147,  381 => 145,  378 => 144,  375 => 143,  372 => 142,  368 => 141,  364 => 139,  361 => 138,  355 => 134,  338 => 129,  332 => 128,  328 => 126,  324 => 125,  318 => 121,  316 => 120,  308 => 115,  301 => 110,  286 => 108,  282 => 107,  276 => 103,  267 => 99,  259 => 94,  253 => 90,  248 => 87,  233 => 85,  229 => 84,  222 => 79,  220 => 78,  211 => 74,  205 => 73,  199 => 72,  193 => 71,  187 => 67,  185 => 66,  179 => 63,  173 => 62,  167 => 61,  162 => 58,  155 => 56,  148 => 55,  146 => 54,  139 => 53,  135 => 52,  129 => 48,  122 => 44,  113 => 38,  108 => 35,  105 => 34,  99 => 33,  94 => 30,  88 => 28,  82 => 26,  80 => 25,  77 => 24,  74 => 23,  67 => 20,  63 => 18,  61 => 17,  53 => 13,  50 => 12,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
