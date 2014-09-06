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
    ");
        // line 11
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
        return array (  52 => 11,  49 => 10,  39 => 6,  228 => 61,  224 => 59,  215 => 55,  208 => 52,  205 => 51,  194 => 50,  192 => 49,  185 => 48,  173 => 45,  170 => 44,  168 => 43,  155 => 39,  151 => 38,  145 => 37,  142 => 36,  136 => 34,  133 => 33,  128 => 31,  122 => 30,  119 => 29,  103 => 26,  85 => 23,  74 => 21,  68 => 19,  56 => 17,  51 => 16,  40 => 11,  36 => 5,  33 => 9,  29 => 8,  21 => 2,  162 => 75,  159 => 74,  149 => 67,  143 => 64,  139 => 35,  135 => 62,  131 => 32,  116 => 28,  108 => 43,  99 => 25,  95 => 24,  89 => 35,  83 => 34,  77 => 22,  71 => 32,  66 => 18,  46 => 9,  42 => 12,  34 => 7,  30 => 3,  25 => 3,  22 => 2,  19 => 1,);
    }
}
