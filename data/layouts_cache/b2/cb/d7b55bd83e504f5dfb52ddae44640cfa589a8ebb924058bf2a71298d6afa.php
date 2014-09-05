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
            echo \layout::func_from_text("Редактирование задачи ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
        } else {
            echo \layout::func_from_text("Добавление задачи");
        }
        echo \layout::func_from_text(". Проект ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("
");
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
        echo \layout::func_from_text("    ");
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
        if ((isset($context["task"]) ? $context["task"] : null)) {
            // line 22
            echo \layout::func_from_text("        ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_tasks") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "edit_task"))) {
                $context["full_edit"] = true;
            }
        } else {
            // line 24
            echo \layout::func_from_text("    ");
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_task")) {
                $context["full_edit"] = true;
            }
        }
        // line 26
        echo \layout::func_from_text("
<form id=\"task_form\" class=\"form-horizontal\">
    <input type=\"hidden\" name=\"act\" value=\"save_task\">
    ");
        // line 29
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 30
        echo \layout::func_from_text("    ");
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 31
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"name\">Название задачи</label>
        <div class=\"col-md-10\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
            // line 34
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"description\">Описание задачи</label>
        <div class=\"col-md-10\">
            <div class=\"wysiwyg\"><textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
            // line 40
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</textarea></div>
        </div>
    </div>
    ");
        }
        // line 44
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"status\">Статус</label>
        <div class=\"col-md-4\">
            <select name=\"status\" id=\"status\">
                ");
        // line 48
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "closed")) {
            echo \layout::func_from_text("<option disabled selected>Закрытая</option>");
        }
        // line 49
        echo \layout::func_from_text("                <option value=\"new\" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Новая</option>
                ");
        // line 50
        if ((isset($context["task"]) ? $context["task"] : null)) {
            // line 51
            echo \layout::func_from_text("                <option value=\"in_progress\" ");
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">В процессе</option>
                <option value=\"rejected\" ");
            // line 52
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "rejected")) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Отклоненная</option>
                ");
        }
        // line 54
        echo \layout::func_from_text("            </select>
        </div>

        <label class=\"col-md-2 control-label rejected\" for=\"message\" ");
        // line 57
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">Причина</label>
        <div class=\"col-md-4 rejected\" ");
        // line 58
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "rejected")) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">
            <textarea rows=\"3\" class=\"form-control\" name=\"message\" id=\"message\">");
        // line 59
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "message"), "html", null, true));
        echo \layout::func_from_text("</textarea>
        </div>
    </div>
    ");
        // line 62
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 63
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"priority\">Приоритет</label>
        <div class=\"col-md-4\">
            <select name=\"priority\" id=\"priority\">
                <option value=\"1\" ");
            // line 67
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 1)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Низкий</option>
                <option value=\"2\" ");
            // line 68
            if (((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority")) || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 2))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Обычный</option>
                <option value=\"3\" ");
            // line 69
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 3)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Высокий</option>
                <option value=\"4\" ");
            // line 70
            if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "priority") == 4)) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">Критический</option>
            </select>
        </div>

        <label class=\"col-md-2 control-label\" for=\"start\">Начало</label>
        <div class=\"col-md-2\">
            <input type=\"text\" name=\"start\" id=\"start\" class=\"form-control\" value=\"");
            // line 76
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "start"), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("\">
        </div>

    </div>
    <div class=\"form-group\">
        ");
            // line 81
            if ((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner"))) {
                // line 82
                echo \layout::func_from_text("            <label class=\"col-md-2 control-label\" for=\"assigned\">Делегировано</label>
            <div class=\"col-md-4\">
                <select name=\"assigned\" id=\"assigned\">
                    <option value=\"\">&nbsp;</option>
                    ");
                // line 86
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                    // line 87
                    echo \layout::func_from_text("                        <option value=\"");
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
                // line 89
                echo \layout::func_from_text("                </select>
            </div>
        ");
            } else {
                // line 92
                echo \layout::func_from_text("            <div class=\"col-md-6\"></div>
        ");
            }
            // line 94
            echo \layout::func_from_text("
        <label class=\"col-md-2 control-label\" for=\"end\">Окончание</label>
        <div class=\"col-md-2\">
            <input type=\"text\" name=\"end\" id=\"end\" class=\"form-control\" value=\"");
            // line 97
            if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end"), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("\">
        </div>
    </div>
    ");
        }
        // line 101
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"percent\">% выполнения</label>
        <div class=\"col-md-4\">
            <select name=\"percent\" id=\"percent\" style=\"width: 100px;\">
                ");
        // line 105
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 0, 1 => 10, 2 => 20, 3 => 30, 4 => 40, 5 => 50, 6 => 60, 7 => 70, 8 => 80, 9 => 90, 10 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 106
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
        // line 108
        echo \layout::func_from_text("            </select>
        </div>
        <label class=\"col-md-2 control-label\" for=\"estimated_time\">Расчетное время</label>
        <div class=\"col-md-2\">
            <div class=\"input-group\">
                <input type=\"text\" name=\"estimated_time\" id=\"estimated_time\" class=\"form-control\" value=\"");
        // line 113
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "estimated_time"), "html", null, true));
        echo \layout::func_from_text("\">
                <span class=\"input-group-addon\">ч.</span>
            </div>
        </div>
    </div>
    ");
        // line 118
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 119
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-md-2 control-label\" for=\"category\">Категория</label>
        <div class=\"col-md-10\">
            <table style=\"width: 100%;\">
                ");
            // line 123
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 124
                echo \layout::func_from_text("                    <tr>
                        <td style=\"padding: 3px;\">
                            <input type=\"checkbox\" id=\"cat_");
                // line 126
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" style=\"margin-top: -2px;\" name=\"category[]\" value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" ");
                if ($this->getAttribute((isset($context["task_categories"]) ? $context["task_categories"] : null), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array")) {
                    echo \layout::func_from_text("checked");
                }
                echo \layout::func_from_text(">
                            <label class=\"label label-cat\" for=\"cat_");
                // line 127
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" style=\"background: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text(";position: relative;top:0;\">
                                ");
                // line 128
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                            </label>
                        </td>
                    </tr>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo \layout::func_from_text("            </table>
        </div>
    </div>
    ");
        }
        // line 137
        echo \layout::func_from_text("    ");
        if ((isset($context["full_edit"]) ? $context["full_edit"] : null)) {
            // line 138
            echo \layout::func_from_text("        <center>
            <a class=\"btn btn-warning\" href=\"\" add_file_to_task style=\"margin: 20px 0 20px 0;\">Прикрепить файлы</a>
            ");
            // line 140
            if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_files")) {
                echo \layout::func_from_text("<a class=\"btn btn-info upload_files\" style=\"margin: 20px 0 20px 0;\" href=\"\">Загрузить файлы</a>");
            }
            // line 141
            echo \layout::func_from_text("        </center>
        ");
            // line 142
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 143
            echo \layout::func_from_text("    ");
        }
        // line 144
        echo \layout::func_from_text("
    <div style=\"text-align: center;\">
        ");
        // line 146
        if (((isset($context["full_edit"]) ? $context["full_edit"] : null) && (!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "owner")))) {
            // line 147
            echo \layout::func_from_text("        <div style=\"margin-bottom: 10px;\">
        Послать уведомление&nbsp;&nbsp;
            <input type=\"checkbox\" name=\"email\" checked> по email&nbsp;&nbsp;
            ");
            // line 150
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
                echo \layout::func_from_text("<input type=\"checkbox\" name=\"sms\"> по смс");
            }
            // line 151
            echo \layout::func_from_text("        </div>
        ");
        }
        // line 153
        echo \layout::func_from_text("        <button class=\"btn btn-large btn-primary save_task\" type=\"button\">");
        if ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
        ");
        // line 154
        if ((!$this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"))) {
            // line 155
            echo \layout::func_from_text("            <button class=\"btn btn-large btn-primary save_task create_other\" type=\"button\">Сохранить и создать еще</button>
        ");
        }
        // line 157
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
        return array (  431 => 157,  427 => 155,  425 => 154,  416 => 153,  412 => 151,  408 => 150,  403 => 147,  401 => 146,  397 => 144,  394 => 143,  391 => 142,  388 => 141,  384 => 140,  380 => 138,  377 => 137,  371 => 133,  360 => 128,  352 => 127,  342 => 126,  338 => 124,  334 => 123,  328 => 119,  326 => 118,  318 => 113,  311 => 108,  296 => 106,  292 => 105,  286 => 101,  277 => 97,  272 => 94,  268 => 92,  263 => 89,  248 => 87,  244 => 86,  238 => 82,  236 => 81,  228 => 76,  217 => 70,  211 => 69,  205 => 68,  199 => 67,  193 => 63,  191 => 62,  185 => 59,  179 => 58,  173 => 57,  168 => 54,  161 => 52,  154 => 51,  152 => 50,  145 => 49,  141 => 48,  135 => 44,  128 => 40,  119 => 34,  114 => 31,  111 => 30,  105 => 29,  100 => 26,  94 => 24,  88 => 22,  86 => 21,  83 => 20,  80 => 19,  74 => 16,  70 => 15,  66 => 14,  61 => 13,  58 => 12,  52 => 9,  48 => 8,  45 => 7,  32 => 4,  29 => 3,);
    }
}
