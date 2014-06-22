<?php

/* /source/index.html */
class __TwigTemplate_9c7308fe652296343f875e77fb9713e790ec2ae5afa59beca5c1ff6672999fd3 extends Twig_Template
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
        return array (  40 => 8,  38 => 7,  32 => 3,  29 => 2,  147 => 50,  138 => 46,  130 => 43,  124 => 42,  121 => 41,  116 => 40,  101 => 27,  98 => 26,  92 => 25,  82 => 20,  76 => 19,  70 => 18,  64 => 17,  58 => 16,  51 => 11,  48 => 7,  42 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}
