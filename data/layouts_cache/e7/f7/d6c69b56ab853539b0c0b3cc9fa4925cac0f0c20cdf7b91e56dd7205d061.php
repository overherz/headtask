<?php

/* applications/projects/layouts/calendar/dashboard.html */
class __TwigTemplate_e7f7d6c69b56ab853539b0c0b3cc9fa4925cac0f0c20cdf7b91e56dd7205d061 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((isset($context["ajax_data"]) ? $context["ajax_data"] : null)) ? ("/source/ajax_index.html") : ("/source/index.html")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Dashboard");
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
        return "applications/projects/layouts/calendar/dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  47 => 10,  44 => 9,  37 => 6,  34 => 5,  28 => 3,);
    }
}
