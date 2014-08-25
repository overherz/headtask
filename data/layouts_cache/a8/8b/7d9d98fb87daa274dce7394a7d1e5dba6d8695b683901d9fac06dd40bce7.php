<?php

/* applications/projects/layouts/calendar/calendar_current_day.html */
class __TwigTemplate_a88b7d9d98fb87daa274dce7394a7d1e5dba6d8695b683901d9fac06dd40bce7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
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
        echo \layout::func_from_text("    <script src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_context($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<div id=\"projects_info\"></div>
<ul class=\"breadcrumbs-one\" >
    <li>
        <a class=\"current\">
            <span style=\"margin-right: 25px;\"><input type=\"checkbox\" name=\"d1\" id=\"d1\" class=\"dashboard_option\" value=\"1\" ");
        // line 14
        if (((isset($context["mask"]) ? $context["mask"] : null) & 1)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d1\" style=\"margin-bottom: 0;\"> Мои</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"radio\" name=\"d2\" id=\"d2\" class=\"dashboard_option\" value=\"2\" ");
        // line 15
        if (((isset($context["mask"]) ? $context["mask"] : null) & 2)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d2\" style=\"margin-bottom: 0;\">Мне</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"radio\" name=\"d2\" id=\"d4\" class=\"dashboard_option\" value=\"4\" ");
        // line 16
        if (((isset($context["mask"]) ? $context["mask"] : null) & 4)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d4\" style=\"margin-bottom: 0;\">Никому</label></span>
            <span style=\"margin-right: 25px;\"><input type=\"radio\" name=\"d2\" id=\"d8\" class=\"dashboard_option\" value=\"8\" ");
        // line 17
        if (((isset($context["mask"]) ? $context["mask"] : null) & 8)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d8\" style=\"margin-bottom: 0;\">Не мне</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d16\" id=\"d16\" class=\"dashboard_option\" value=\"16\" ");
        // line 18
        if (((isset($context["mask"]) ? $context["mask"] : null) & 16)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d16\" style=\"margin-bottom: 0;\">Закрытые</label></span>
        </a>
    </li>
</ul>

<div style=\"margin-bottom: 10px;\">Всего задач: <span class=\"label label-info\" style=\"margin-right: 10px;\">");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true));
        echo \layout::func_from_text("</span>Показано задач: <span class=\"label label-info\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count_show"]) ? $context["count_show"] : null), "html", null, true));
        echo \layout::func_from_text("</span></div>

<div>");
        // line 25
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>

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
        return array (  96 => 25,  89 => 23,  79 => 18,  73 => 17,  67 => 16,  61 => 15,  55 => 14,  49 => 10,  46 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
