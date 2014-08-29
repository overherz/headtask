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
        echo \layout::func_from_text("    <script type=\"text/javascript\" src=\"/source/js/search.js\"></script>
    <script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
    <script src=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 11
    public function block_context($context, array $blocks = array())
    {
        // line 12
        echo \layout::func_from_text("<div id=\"projects_info\"></div>
    ");
        // line 13
        echo \layout::func_from_text((isset($context["user_tasks"]) ? $context["user_tasks"] : null));
        echo \layout::func_from_text("

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
        return array (  55 => 13,  52 => 12,  49 => 11,  43 => 8,  39 => 6,  36 => 5,  30 => 3,);
    }
}
