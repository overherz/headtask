<?php

/* /source/index.html */
class __TwigTemplate_61742b288367930f0f633f0d95bddab1 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span12\">
            <div class=\"hero-unit\" style=\"padding:10px;\">
                ");
        // line 7
        $this->displayBlock('context', $context, $blocks);
        // line 8
        echo \layout::func_from_text("            </div>
        </div>
    </div>
</div>
");
    }

    // line 7
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
        return array (  48 => 7,  38 => 7,  32 => 3,  29 => 2,  153 => 52,  144 => 48,  136 => 45,  130 => 44,  127 => 43,  122 => 42,  112 => 34,  109 => 33,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 8,  37 => 5,  31 => 3,);
    }
}
