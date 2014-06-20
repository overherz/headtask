<?php

/* applications\projects\layouts\tasks/show_task.html */
class __TwigTemplate_35653c71a08afed7e933ed1bd085a24b173ab028ad06a944ba3eba8ae1022b4b extends Twig_Template
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
    <li><a href=\"#tabs-3\">Логи</a></li>
</ul>

<div class=\"tab-content\">
    <div id=\"tabs-1\" class=\"tab-pane fade in active\">
        ");
        // line 32
        if ((isset($context["task_categories"]) ? $context["task_categories"] : null)) {
            // line 33
            echo \layout::func_from_text("            <div style=\"margin-bottom: 10px;\">
                ");
            // line 34
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["task_categories"]) ? $context["task_categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 35
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
            // line 37
            echo \layout::func_from_text("            </div>
        ");
        }
        // line 39
        echo \layout::func_from_text("
        <table class=\"table table-hover table-condensed table-border\" style=\"margin-top:20px;\" id=\"tasks_table\">
            <thead>
            <tr>
                <th>Статус</th>
                <th>Приоритет</th>
                <th>Делегировано</th>
                <th>Начало - Окончание</th>
                <th>Расчетное время</th>
                <th>Затраченное время</th>
                <th>Добавил</th>
                <th><i class=\"fa fa-calendar\"></i></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            ");
        // line 55
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
        $template->display($context);
        // line 56
        echo \layout::func_from_text("            </tbody>
        </table>
        ");
        // line 58
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 59
            echo \layout::func_from_text("            ");
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
            // line 60
            echo \layout::func_from_text("        ");
        }
        // line 61
        echo \layout::func_from_text("        <div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>
    </div>
    <div id=\"tabs-3\" class=\"tab-pane fade\">
    ");
        // line 64
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 65
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
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 75
                echo \layout::func_from_text("                <tr>
                    <td>
                        <a href=\"/users/~");
                // line 77
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
                // line 79
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
                    <td>");
                // line 80
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
                </tr>
            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo \layout::func_from_text("            </tbody>
        </table>
    ");
        }
        // line 86
        echo \layout::func_from_text("    </div>
</div>

");
        // line 89
        if ((($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed") || (isset($context["comments"]) ? $context["comments"] : null))) {
            // line 90
            echo \layout::func_from_text("<ul class=\"breadcrumbs-one second\">
    <li><a class=\"current\">Комментарии</a></li>
</ul>

<div class=\"all_comments\">
    ");
            // line 95
            if ((isset($context["comments"]) ? $context["comments"] : null)) {
                // line 96
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
                    // line 97
                    echo \layout::func_from_text("            ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                    $template->display($context);
                    // line 98
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
                // line 99
                echo \layout::func_from_text("    ");
            }
            // line 100
            echo \layout::func_from_text("</div>
");
        }
        // line 102
        echo \layout::func_from_text("
");
        // line 103
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            // line 104
            echo \layout::func_from_text("<div>
    <a href=\"#\" id=\"botnewcomm\" style=\"margin-top: 10px;\" class=\"btn btn-primary comment_to_comment\" to_comment=\"0\">Добавить комментарий</a>
    <form class=\"comment_form\" style=\"display: none;\">
        <input type=\"hidden\" name=\"act\" value=\"add_comment\">
        <input type=\"hidden\" name=\"parent\" value=\"0\">
        <input type=\"hidden\" name=\"id\" value=\"");
            // line 109
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
        return "applications\\projects\\layouts\\tasks/show_task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 109,  267 => 104,  265 => 103,  262 => 102,  258 => 100,  255 => 99,  241 => 98,  237 => 97,  219 => 96,  217 => 95,  210 => 90,  208 => 89,  203 => 86,  198 => 83,  189 => 80,  185 => 79,  174 => 77,  170 => 75,  166 => 74,  155 => 65,  153 => 64,  146 => 61,  143 => 60,  139 => 59,  137 => 58,  133 => 56,  130 => 55,  112 => 39,  108 => 37,  95 => 35,  91 => 34,  88 => 33,  86 => 32,  76 => 24,  73 => 22,  71 => 21,  69 => 20,  66 => 19,  63 => 18,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
