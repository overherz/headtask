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
        echo \layout::func_from_text("<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"jumbotron\" style=\"position: relative;\">
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
        return array (  48 => 7,  40 => 8,  38 => 7,  32 => 3,  29 => 2,  80 => 26,  76 => 24,  69 => 23,  64 => 20,  61 => 19,  56 => 17,  46 => 10,  43 => 9,  34 => 3,  31 => 2,  143 => 20,  138 => 17,  115 => 14,  98 => 12,  94 => 11,  87 => 10,  70 => 9,  50 => 6,  44 => 5,  24 => 3,  21 => 2,  147 => 62,  144 => 61,  133 => 58,  129 => 57,  116 => 56,  112 => 13,  108 => 53,  101 => 48,  99 => 47,  95 => 45,  84 => 37,  79 => 35,  75 => 34,  71 => 33,  67 => 32,  63 => 7,  58 => 28,  41 => 4,  39 => 12,  26 => 6,  19 => 1,);
    }
}
