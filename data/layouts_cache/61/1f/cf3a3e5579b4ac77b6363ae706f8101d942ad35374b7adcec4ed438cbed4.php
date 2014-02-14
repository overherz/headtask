<?php

/* applications\projects\layouts\tasks/add_task.html */
class __TwigTemplate_611fcf3a3e5579b4ac77b6363ae706f8101d942ad35374b7adcec4ed438cbed4 extends Twig_Template
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
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_error"))) {
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
        echo \layout::func_from_text("            ");
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 35
            echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"name\">Название задачи</label>
                <div class=\"col-lg-10\">
                    <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
            // line 38
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">
                </div>
            </div>
            ");
            // line 41
            if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
                // line 42
                echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"type\">Тип</label>
                <div class=\"col-lg-10\">
                    <select name=\"type\" id=\"type\">
                        ");
                // line 46
                if (twig_in_filter("task", (isset($context["types_tasks"]) ? $context["types_tasks"] : null))) {
                    echo \layout::func_from_text("<option value=\"task\">Задача</option>");
                }
                // line 47
                echo \layout::func_from_text("                        ");
                if (twig_in_filter("error", (isset($context["types_tasks"]) ? $context["types_tasks"] : null))) {
                    echo \layout::func_from_text("<option value=\"error\" ");
                    if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "type") == "error")) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">Ошибка</option>");
                }
                // line 48
                echo \layout::func_from_text("                    </select>
                </div>
            </div>
            ");
            }
            // line 52
            echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"description\">Описание задачи</label>
                <div class=\"col-lg-10\">
                    <div class=\"wysiwyg\"><textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
            // line 55
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</textarea></div>
                </div>
            </div>
            ");
        }
        // line 59
        echo \layout::func_from_text("
                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"status\">Статус</label>
                            <div class=\"col-lg-4\">
                                <select name=\"status\" id=\"status\">
                                    ");
        // line 64
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
            echo \layout::func_from_text("<option disabled selected>Закрытая</option>");
        }
        // line 65
        echo \layout::func_from_text("                                    <option value=\"new\" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Новая</option>
                                    ");
        // line 66
        if ((isset($context["task"]) ? $context["task"] : null)) {
            // line 67
            echo \layout::func_from_text("                                    <option value=\"in_progress\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">В процессе</option>
                                    <option value=\"rejected\" ");
            // line 68
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Отклоненная</option>
                                    ");
        }
        // line 70
        echo \layout::func_from_text("                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\" id=\"rejected\" ");
        // line 73
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">
                            <label class=\"col-lg-2 control-label\" for=\"message\">Причина</label>
                            <div class=\"col-lg-4\">
                                <textarea rows=\"3\" class=\"form-control\" name=\"message\" id=\"message\">");
        // line 76
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
        echo \layout::func_from_text("</textarea>
                            </div>
                        </div>
                        ");
        // line 79
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 80
            echo \layout::func_from_text("                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"priority\">Приоритет</label>
                            <div class=\"col-lg-4\">
                                <select name=\"priority\" id=\"priority\">
                                    <option value=\"1\" ");
            // line 84
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 1)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Низкий</option>
                                    <option value=\"2\" ");
            // line 85
            if (((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 2))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Обычный</option>
                                    <option value=\"3\" ");
            // line 86
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 3)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Высокий</option>
                                    <option value=\"4\" ");
            // line 87
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 4)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Критический</option>
                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"estimated_time\">Расчетное время</label>
                            <div class=\"col-lg-2\">
                                <div class=\"input-group\">
                                    <input type=\"text\" name=\"estimated_time\" id=\"estimated_time\" class=\"form-control\" value=\"");
            // line 95
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
            echo \layout::func_from_text("\">
                                    <span class=\"input-group-addon\">ч.</span>
                                </div>
                            </div>
                        </div>
                        ");
        }
        // line 101
        echo \layout::func_from_text("
                        ");
        // line 102
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 103
            echo \layout::func_from_text("                        ");
            if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
                // line 104
                echo \layout::func_from_text("                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"assigned\">Делегировано</label>
                            <div class=\"col-lg-2\">
                                <select name=\"assigned\" id=\"assigned\">
                                    <option value=\"\">&nbsp;</option>
                                    ");
                // line 109
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                    // line 110
                    echo \layout::func_from_text("                                    <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user") == $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned"))) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
                    echo \layout::func_from_text(" ");
                    if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "nickname")) {
                        echo \layout::func_from_text("<span>(");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "nickname"), "html", null, true));
                        echo \layout::func_from_text(")</span>");
                    }
                    echo \layout::func_from_text("</option>
                                    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 112
                echo \layout::func_from_text("                                </select>
                            </div>
                        </div>
                        ");
            }
            // line 116
            echo \layout::func_from_text("                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"start\">Начало</label>
                            <div class=\"col-lg-2\">
                                <input type=\"text\" name=\"start\" id=\"start\" class=\"form-control\" value=\"");
            // line 119
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"end\">Окончание</label>
                            <div class=\"col-lg-2\">
                                <input type=\"text\" name=\"end\" id=\"end\" class=\"form-control\" value=\"");
            // line 125
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("\">
                            </div>
                        </div>
                        ");
        }
        // line 129
        echo \layout::func_from_text("                        <div class=\"form-group\">
                            <label class=\"col-lg-2 control-label\" for=\"percent\">Статус выполнения</label>
                            <div class=\"col-lg-2\">
                                <select name=\"percent\" id=\"percent\" style=\"width: 100px;\">
                                    ");
        // line 133
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 0, 1 => 10, 2 => 20, 3 => 30, 4 => 40, 5 => 50, 6 => 60, 7 => 70, 8 => 80, 9 => 90, 10 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 134
            echo \layout::func_from_text("                                        <option value=\"");
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
        // line 136
        echo \layout::func_from_text("                                </select>
                            </div>
                        </div>
            ");
        // line 139
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 140
            echo \layout::func_from_text("                <center>
                    <a class=\"btn btn-warning\" href=\"\" add_file_to_task style=\"margin: 20px 0 20px 0;\">Прикрепить файлы</a>
                    ");
            // line 142
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
                echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" style=\"margin: 20px 0 20px 0;\" href=\"\">Загрузить файлы</a>");
            }
            // line 143
            echo \layout::func_from_text("                </center>
                ");
            // line 144
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 145
            echo \layout::func_from_text("            ");
        }
        // line 146
        echo \layout::func_from_text("
                <div style=\"text-align: center;\">
                    ");
        // line 148
        if (((isset($context["full_edit"]) ? $context["full_edit"] : null) && (!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")))) {
            // line 149
            echo \layout::func_from_text("                    <div style=\"margin-bottom: 10px;\">
                    Послать уведомление&nbsp;&nbsp;
                        <input type=\"checkbox\" name=\"email\" checked> по email&nbsp;&nbsp;
                        ");
            // line 152
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                echo \layout::func_from_text("<input type=\"checkbox\" name=\"sms\"> по смс");
            }
            // line 153
            echo \layout::func_from_text("                    </div>
                    ");
        }
        // line 155
        echo \layout::func_from_text("                    <button class=\"btn btn-large btn-primary save_task\" type=\"button\">");
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
                </div>
</form>
<div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks/add_task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 155,  392 => 153,  388 => 152,  383 => 149,  381 => 148,  377 => 146,  374 => 145,  371 => 144,  368 => 143,  364 => 142,  360 => 140,  358 => 139,  353 => 136,  338 => 134,  334 => 133,  328 => 129,  319 => 125,  310 => 119,  305 => 116,  299 => 112,  278 => 110,  274 => 109,  267 => 104,  264 => 103,  262 => 102,  259 => 101,  250 => 95,  237 => 87,  231 => 86,  225 => 85,  219 => 84,  213 => 80,  211 => 79,  205 => 76,  197 => 73,  192 => 70,  185 => 68,  178 => 67,  176 => 66,  169 => 65,  165 => 64,  158 => 59,  151 => 55,  146 => 52,  140 => 48,  131 => 47,  127 => 46,  121 => 42,  119 => 41,  113 => 38,  108 => 35,  105 => 34,  99 => 33,  94 => 30,  88 => 28,  82 => 26,  80 => 25,  77 => 24,  74 => 23,  67 => 20,  63 => 18,  61 => 17,  53 => 13,  50 => 12,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
