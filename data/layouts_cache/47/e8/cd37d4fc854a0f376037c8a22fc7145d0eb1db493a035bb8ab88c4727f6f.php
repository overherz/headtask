<?php

/* applications\groups\layouts\admin/index.html */
class __TwigTemplate_47e8cd37d4fc854a0f376037c8a22fc7145d0eb1db493a035bb8ab88c4727f6f extends Twig_Template
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
        echo \layout::func_from_text("    &rarr; Группы
");
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
        // line 7
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "groups", 1 => "groups.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/miniColors/jquery.miniColors.css\">
");
    }

    // line 10
    public function block_js($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("    ,\"/source/js/miniColors/jquery.miniColors.min.js\"
    ,\"");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "groups", 1 => "groups_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo \layout::func_from_text("<div id=\"result\">
");
        // line 17
        $this->env->loadTemplate("/applications/groups/layouts/admin/groups.html")->display($context);
        // line 18
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\groups\\layouts\\admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 18,  68 => 17,  65 => 16,  62 => 15,  56 => 12,  53 => 11,  50 => 10,  42 => 7,  39 => 6,  34 => 3,  31 => 2,);
    }
}
