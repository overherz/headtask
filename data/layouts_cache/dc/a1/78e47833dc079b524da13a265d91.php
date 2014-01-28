<?php

/* applications\options\layouts\admin/index.html */
class __TwigTemplate_dca178e47833dc079b524da13a265d91 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/admin/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    &rarr; Настройки
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "options", 1 => "options.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 8
    public function block_js($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ,\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "options", 1 => "options_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\"></form>
<div id=\"search_result\">");
        // line 14
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "options", 1 => "admin/options_table.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>

<div id=\"result\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\options\\layouts\\admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  62 => 13,  59 => 12,  52 => 9,  49 => 8,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
