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
    <script>
        \$(document).ready(function (\$) {
            animate_progress_bars();
        });
    </script>
");
    }

    // line 23
    public function block_project_data($context, array $blocks = array())
    {
        // line 24
        echo \layout::func_from_text("
");
        // line 25
        $context["undate"] = false;
        // line 26
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end") && ((twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d") > $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "end")) && (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "new") || ($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress"))))) {
            // line 27
            $context["undate"] = true;
        }
        // line 29
        echo \layout::func_from_text("
<div class=\"breadcrumb second\">
    <table class=\"table\" style=\"margin-bottom: 0px;background: transparent;\">
        <tr>
            <td style=\"border-top: none;width: 1%;white-space: nowrap;padding:0px;\">Статус выполнения</td>
            <td style=\"border-top: none;padding:0px;padding-left: 10px;\">
                <div class=\"progress progress-striped ");
        // line 35
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                    <div class=\"progress-bar ");
        // line 36
        if ((isset($context["undate"]) ? $context["undate"] : null)) {
            echo \layout::func_from_text("progress-bar-danger");
        }
        echo \layout::func_from_text("\" role=\"progressbar\" aria-valuenow=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent") > 0)) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
            echo \layout::func_from_text("%;");
        } else {
            echo \layout::func_from_text("30px;");
        }
        echo \layout::func_from_text("\">
                        <span>");
        // line 37
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text(" %</span>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<table class=\"table table-condensed\" style=\"margin-top:20px;\" id=\"tasks_table\">
    <thead>
    <tr>
        <th></th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Делегировано</th>
        <th>Начало</th>
        <th>Окончание</th>
        <th>Расчетное время</th>
        <th>Затраченное время</th>
        <th>Добавил</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 60
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
        $template->display($context);
        // line 61
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 63
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 64
            echo \layout::func_from_text("    ");
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
        }
        // line 66
        echo \layout::func_from_text("    <ul class=\"breadcrumb second\">
        <li>Описание задачи</li>
    </ul>
<div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        // line 69
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>

");
        // line 71
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 72
            echo \layout::func_from_text("<ul class=\"breadcrumb second\">
    <li>Логи</li>
</ul>

<table class=\"table table-hover table-condensed\">
    <thead>
    <tr>
        <th>Пользователь</th>
        <th>Дата</th>
        <th>Описание</th>
    </tr>
    </thead>
    <tbody>
    ");
            // line 85
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 86
                echo \layout::func_from_text("    <tr>
        <td>
            <a href=\"/users/~");
                // line 88
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
            <div class=\"nickname\">");
                // line 89
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</div>
        </td>
        <td>");
                // line 91
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
        <td>");
                // line 92
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
    </tr>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo \layout::func_from_text("    </tbody>
</table>

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
        return array (  213 => 95,  204 => 92,  200 => 91,  195 => 89,  185 => 88,  181 => 86,  177 => 85,  162 => 72,  160 => 71,  155 => 69,  150 => 66,  145 => 64,  143 => 63,  139 => 61,  136 => 60,  110 => 37,  95 => 36,  89 => 35,  81 => 29,  78 => 27,  76 => 26,  74 => 25,  71 => 24,  68 => 23,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
