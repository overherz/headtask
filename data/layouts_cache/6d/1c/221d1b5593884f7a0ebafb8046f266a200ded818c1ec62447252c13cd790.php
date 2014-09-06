<?php

/* /source/index.html */
class __TwigTemplate_6d1c221d1b5593884f7a0ebafb8046f266a200ded818c1ec62447252c13cd790 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'context' => array($this, 'block_context'),
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    <div class=\"jumbotron\" style=\"position: relative;\">
        ");
        // line 4
        $this->displayBlock('context', $context, $blocks);
        // line 5
        echo \layout::func_from_text("    </div>
");
    }

    // line 4
    public function block_context($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/source/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  37 => 5,  35 => 4,  32 => 3,  29 => 2,  52 => 11,  49 => 10,  46 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
