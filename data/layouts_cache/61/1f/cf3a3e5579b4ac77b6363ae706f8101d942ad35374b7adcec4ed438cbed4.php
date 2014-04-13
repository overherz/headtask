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
        <label class=\"col-lg-2 control-label\" for=\"name\">Название задачи</label>
        <div class=\"col-lg-10\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
            // line 38
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"description\">Описание задачи</label>
        <div class=\"col-lg-10\">
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
        <label class=\"col-lg-2 control-label\" for=\"status\">Статус</label>
        <div class=\"col-lg-4\">
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
    </div>
    <div class=\"form-group\" id=\"rejected\" ");
        // line 61
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">
        <label class=\"col-lg-2 control-label\" for=\"message\">Причина</label>
        <div class=\"col-lg-4\">
            <textarea rows=\"3\" class=\"form-control\" name=\"message\" id=\"message\">");
        // line 64
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
        echo \layout::func_from_text("</textarea>
        </div>
    </div>
    ");
        // line 67
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 68
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"priority\">Приоритет</label>
        <div class=\"col-lg-4\">
            <select name=\"priority\" id=\"priority\">
                <option value=\"1\" ");
            // line 72
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 1)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Низкий</option>
                <option value=\"2\" ");
            // line 73
            if (((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 2))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Обычный</option>
                <option value=\"3\" ");
            // line 74
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 3)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Высокий</option>
                <option value=\"4\" ");
            // line 75
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
            // line 83
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
            echo \layout::func_from_text("\">
                <span class=\"input-group-addon\">ч.</span>
            </div>
        </div>
    </div>
    ");
        }
        // line 89
        echo \layout::func_from_text("
    ");
        // line 90
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 91
            echo \layout::func_from_text("    ");
            if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
                // line 92
                echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"assigned\">Делегировано</label>
        <div class=\"col-lg-2\">
            <select name=\"assigned\" id=\"assigned\">
                <option value=\"\">&nbsp;</option>
                ");
                // line 97
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                    // line 98
                    echo \layout::func_from_text("                <option value=\"");
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
                // line 100
                echo \layout::func_from_text("            </select>
        </div>
    </div>
    ");
            }
            // line 104
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"start\">Начало</label>
        <div class=\"col-lg-2\">
            <input type=\"text\" name=\"start\" id=\"start\" class=\"form-control\" value=\"");
            // line 107
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"end\">Окончание</label>
        <div class=\"col-lg-2\">
            <input type=\"text\" name=\"end\" id=\"end\" class=\"form-control\" value=\"");
            // line 113
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("\">
        </div>
    </div>
    ");
        }
        // line 117
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"percent\">Статус выполнения</label>
        <div class=\"col-lg-2\">
            <select name=\"percent\" id=\"percent\" style=\"width: 100px;\">
                ");
        // line 121
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 0, 1 => 10, 2 => 20, 3 => 30, 4 => 40, 5 => 50, 6 => 60, 7 => 70, 8 => 80, 9 => 90, 10 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 122
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
        // line 124
        echo \layout::func_from_text("            </select>
        </div>
    </div>
    ");
        // line 127
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 128
            echo \layout::func_from_text("        <center>
            <a class=\"btn btn-warning\" href=\"\" add_file_to_task style=\"margin: 20px 0 20px 0;\">Прикрепить файлы</a>
            ");
            // line 130
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
                echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" style=\"margin: 20px 0 20px 0;\" href=\"\">Загрузить файлы</a>");
            }
            // line 131
            echo \layout::func_from_text("        </center>
        ");
            // line 132
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 133
            echo \layout::func_from_text("    ");
        }
        // line 134
        echo \layout::func_from_text("
    <div style=\"text-align: center;\">
        ");
        // line 136
        if (((isset($context["full_edit"]) ? $context["full_edit"] : null) && (!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")))) {
            // line 137
            echo \layout::func_from_text("        <div style=\"margin-bottom: 10px;\">
        Послать уведомление&nbsp;&nbsp;
            <input type=\"checkbox\" name=\"email\" checked> по email&nbsp;&nbsp;
            ");
            // line 140
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                echo \layout::func_from_text("<input type=\"checkbox\" name=\"sms\"> по смс");
            }
            // line 141
            echo \layout::func_from_text("        </div>
        ");
        }
        // line 143
        echo \layout::func_from_text("        <button class=\"btn btn-large btn-primary save_task\" type=\"button\">");
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
        return array (  366 => 143,  362 => 141,  358 => 140,  353 => 137,  351 => 136,  347 => 134,  344 => 133,  341 => 132,  338 => 131,  334 => 130,  330 => 128,  328 => 127,  323 => 124,  308 => 122,  304 => 121,  298 => 117,  289 => 113,  280 => 107,  275 => 104,  269 => 100,  248 => 98,  244 => 97,  237 => 92,  234 => 91,  232 => 90,  229 => 89,  220 => 83,  207 => 75,  201 => 74,  195 => 73,  189 => 72,  183 => 68,  181 => 67,  175 => 64,  167 => 61,  162 => 58,  155 => 56,  148 => 55,  146 => 54,  139 => 53,  135 => 52,  129 => 48,  122 => 44,  113 => 38,  108 => 35,  105 => 34,  99 => 33,  94 => 30,  88 => 28,  82 => 26,  80 => 25,  77 => 24,  74 => 23,  67 => 20,  63 => 18,  61 => 17,  53 => 13,  50 => 12,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
