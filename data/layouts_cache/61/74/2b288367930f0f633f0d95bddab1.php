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
        return array (  48 => 7,  38 => 7,  32 => 3,  29 => 2,  315 => 105,  306 => 101,  298 => 98,  292 => 97,  289 => 96,  284 => 95,  272 => 85,  263 => 81,  254 => 77,  244 => 76,  236 => 71,  222 => 70,  212 => 69,  209 => 68,  206 => 67,  203 => 66,  200 => 65,  198 => 64,  194 => 62,  190 => 60,  186 => 59,  182 => 58,  177 => 57,  173 => 55,  168 => 53,  165 => 52,  161 => 51,  157 => 50,  152 => 49,  145 => 47,  139 => 46,  133 => 45,  124 => 44,  119 => 43,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 8,  37 => 5,  31 => 3,);
    }
}
