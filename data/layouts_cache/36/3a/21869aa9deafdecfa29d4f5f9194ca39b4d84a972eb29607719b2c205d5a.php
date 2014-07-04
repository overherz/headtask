<?php

/* applications/groups/layouts/admin/index.html */
class __TwigTemplate_363a21869aa9deafdecfa29d4f5f9194ca39b4d84a972eb29607719b2c205d5a extends Twig_Template
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
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/miniColors/jquery.miniColors.css\">
");
    }

    // line 9
    public function block_js($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("    ,\"/source/js/miniColors/jquery.miniColors.min.js\"
    ,\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "groups", 1 => "groups_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("<div id=\"result\">
");
        // line 16
        $this->env->loadTemplate("/applications/groups/layouts/admin/groups.html")->display($context);
        // line 17
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/groups/layouts/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 17,  65 => 16,  62 => 15,  59 => 14,  53 => 11,  50 => 10,  47 => 9,  42 => 7,  39 => 6,  34 => 3,  31 => 2,);
    }
}
