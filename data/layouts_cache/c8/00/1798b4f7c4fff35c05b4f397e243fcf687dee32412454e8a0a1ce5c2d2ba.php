<?php

/* applications\pages\layouts\templates/index.html */
class __TwigTemplate_c8001798b4f7c4fff35c05b4f397e243fcf687dee32412454e8a0a1ce5c2d2ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    <div class=\"wysiwyg\">");
        echo \layout::func_from_text($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"));
        echo \layout::func_from_text("</div>
");
    }

    // line 6
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\templates/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  32 => 4,  29 => 3,);
    }
}
