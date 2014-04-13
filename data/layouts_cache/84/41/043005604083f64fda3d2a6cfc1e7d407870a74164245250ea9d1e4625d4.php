<?php

/* applications\sefsef\layouts\index.html */
class __TwigTemplate_8441043005604083f64fda3d2a6cfc1e7d407870a74164245250ea9d1e4625d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
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

    // line 2
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "sefsef", 1 => "sefsef.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script type=\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "sefsef", 1 => "sefsef.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("sefsef
");
    }

    public function getTemplateName()
    {
        return "applications\\sefsef\\layouts\\index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 10,  50 => 9,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
