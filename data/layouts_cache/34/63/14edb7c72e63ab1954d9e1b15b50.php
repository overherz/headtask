<?php

/* applications\projects\layouts\calendar/calendar.html */
class __TwigTemplate_346314edb7c72e63ab1954d9e1b15b50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'css' => array($this, 'block_css'),
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
        echo \layout::func_from_text("Календарь");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("<script type=\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 10
    public function block_css($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/libraries/calendar/calendar.css\">
");
    }

    // line 14
    public function block_context($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("<div id=\"calendar\">
    ");
        // line 16
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/month.html"), "method"));
        $template->display($context);
        // line 17
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\calendar/calendar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 17,  61 => 16,  58 => 15,  55 => 14,  50 => 11,  47 => 10,  40 => 6,  37 => 5,  31 => 3,);
    }
}
