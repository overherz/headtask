<?php

/* applications\projects\layouts\tasks/show_task.html */
class __TwigTemplate_36aa233ef19e2672c46a45a56e3c4f65 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table\" style=\"margin-bottom: 0px;background: transparent;\">
    <tr>
        <td style=\"border-top: none;width: 1%;white-space: nowrap;padding:0px;\">Статус выполнения</td>
        <td style=\"border-top: none;padding:0px;padding-left: 10px;\">
            <div class=\"progress progress-striped ");
        // line 33
        if ((isset($context["undate"]) ? $context["undate"] : null)) {
            echo \layout::func_from_text("progress-danger");
        }
        echo \layout::func_from_text(" ");
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") == "in_progress")) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\">
                <div class=\"bar\" style=\"width: ");
        // line 34
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
        // line 35
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text(" %</span>
                </div>
            </div>
        </td>
    </tr>
</table>
<table class=\"table table-bordered\" style=\"background: #fff;margin-top:20px;\" id=\"tasks_table\">
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
    ");
        // line 54
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
        $template->display($context);
        // line 55
        echo \layout::func_from_text("</table>
");
        // line 56
        if ((isset($context["files"]) ? $context["files"] : null)) {
            // line 57
            echo \layout::func_from_text("    ");
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
            $template->display($context);
        }
        // line 59
        echo \layout::func_from_text("<div class=\"wysiwyg\" style=\"padding-bottom: 20px;\">");
        echo \layout::func_from_text($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "description"));
        echo \layout::func_from_text("</div>

");
        // line 61
        if ((isset($context["logs"]) ? $context["logs"] : null)) {
            // line 62
            echo \layout::func_from_text("<ul class=\"breadcrumb second\">
    <li>Логи</li>
</ul>

<table class=\"table table-hover table-bordered table-condensed\">
    <tr>
        <th>Пользователь</th>
        <th>Дата</th>
        <th>Описание</th>
    </tr>
    ");
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
                // line 73
                echo \layout::func_from_text("    <tr>
        <td>
            <a href=\"/users/~");
                // line 75
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"color:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(" !important;font-weight: bold;\" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "group_name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</a>
            <div class=\"nickname\">");
                // line 76
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "nickname"), "html", null, true));
                echo \layout::func_from_text("</div>
        </td>
        <td>");
                // line 78
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
                echo \layout::func_from_text("</td>
        <td>");
                // line 79
                echo \layout::func_from_text($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "text"));
                echo \layout::func_from_text("</td>
    </tr>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo \layout::func_from_text("</table>

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
        return array (  202 => 82,  193 => 79,  189 => 78,  184 => 76,  174 => 75,  170 => 73,  166 => 72,  154 => 62,  152 => 61,  146 => 59,  141 => 57,  139 => 56,  136 => 55,  133 => 54,  111 => 35,  97 => 34,  87 => 33,  81 => 29,  78 => 27,  76 => 26,  74 => 25,  71 => 24,  68 => 23,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
