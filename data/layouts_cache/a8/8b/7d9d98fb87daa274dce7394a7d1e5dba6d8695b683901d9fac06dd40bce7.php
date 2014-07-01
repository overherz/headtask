<?php

/* applications/projects/layouts/calendar/calendar_current_day.html */
class __TwigTemplate_a88b7d9d98fb87daa274dce7394a7d1e5dba6d8695b683901d9fac06dd40bce7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Календарь. Задачи сегодня");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script src=\"/source/js/jquery.cookie.js\"></script>
    <script src=\"");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-xs-10\" id=\"projects_second_panel\" style=\"padding-right: 0;\">
            <div class=\"jumbotron\" style=\"padding: 10px;margin-bottom: 0;\">
                <div id=\"projects_info\"></div>
                <ul class=\"breadcrumbs-one\">
                    <li><a>Задачи</a></li>
                    <li>
                        <a class=\"current\">
                            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d1\" id=\"d1\" class=\"dashboard_option\" value=\"1\" ");
        // line 20
        if (((isset($context["mask"]) ? $context["mask"] : null) & 1)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d1\" style=\"margin-bottom: 0;\"> Создатель</label></span>
                            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d2\" id=\"d2\" class=\"dashboard_option\" value=\"2\" ");
        // line 21
        if (((isset($context["mask"]) ? $context["mask"] : null) & 2)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d2\" style=\"margin-bottom: 0;\">Делегированные</label></span>
                            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d4\" id=\"d4\" class=\"dashboard_option\" value=\"4\" ");
        // line 22
        if (((isset($context["mask"]) ? $context["mask"] : null) & 4)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d4\" style=\"margin-bottom: 0;\">Ничьи</label></span>
                            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d8\" id=\"d8\" class=\"dashboard_option\" value=\"8\" ");
        // line 23
        if (((isset($context["mask"]) ? $context["mask"] : null) & 8)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d8\" style=\"margin-bottom: 0;\">Чужие</label></span>
                            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d16\" id=\"d16\" class=\"dashboard_option\" value=\"16\" ");
        // line 24
        if (((isset($context["mask"]) ? $context["mask"] : null) & 16)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d16\" style=\"margin-bottom: 0;\">Закрытые сегодня</label></span>
                        </a>
                    </li>
                </ul>
                <div style=\"margin-bottom: 10px;\">Всего задач: <span class=\"label label-info\" style=\"margin-right: 10px;\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true));
        echo \layout::func_from_text("</span>Показано задач: <span class=\"label label-info\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count_show"]) ? $context["count_show"] : null), "html", null, true));
        echo \layout::func_from_text("</span></div>
                ");
        // line 29
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        // line 30
        echo \layout::func_from_text("            </div>
        </div>
        <div class=\"col-xs-2\" style=\"padding-left: 0;border-left: 1px solid #777;\">
            <div class=\"jumbotron\" style=\"padding: 10px;margin-bottom: 0;background: #f5f5f5;\">
            <ul class=\"breadcrumbs-one\">
                <li><a>Пульс</a></li>
            </ul>
                <div style=\"height: 300px;\"></div>
            </div>
        </div>
    </div>
</div>

");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/calendar/calendar_current_day.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 30,  101 => 29,  95 => 28,  86 => 24,  80 => 23,  74 => 22,  68 => 21,  62 => 20,  51 => 11,  48 => 10,  42 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}
