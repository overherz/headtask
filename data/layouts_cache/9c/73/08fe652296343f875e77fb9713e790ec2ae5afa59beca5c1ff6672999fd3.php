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
            <div class=\"jumbotron\">
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
        return array (  48 => 7,  40 => 8,  38 => 7,  32 => 3,  29 => 2,  199 => 70,  191 => 64,  187 => 62,  181 => 61,  176 => 58,  170 => 57,  165 => 54,  159 => 52,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  139 => 45,  136 => 44,  132 => 43,  125 => 41,  117 => 37,  113 => 35,  109 => 33,  107 => 32,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 21,  71 => 20,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 4,  39 => 3,  31 => 2,);
    }
}
