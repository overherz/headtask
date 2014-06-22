<?php

/* /source/wrapper_index2.html */
class __TwigTemplate_8fe1745950bbb4255011343984761aa7e086dc35593736b6cff76ec97d7a3a93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'info_title' => array($this, 'block_info_title'),
            'info' => array($this, 'block_info'),
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
        echo \layout::func_from_text("    <div class=\"container\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\"><b>");
        // line 6
        $this->displayBlock('info_title', $context, $blocks);
        echo \layout::func_from_text("</b></div>
            <div class=\"panel-body\">
                ");
        // line 8
        $this->displayBlock('info', $context, $blocks);
        // line 9
        echo \layout::func_from_text("            </div>
        </div>
    </div>
");
    }

    // line 6
    public function block_info_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_info($context, array $blocks = array())
    {
        echo \layout::func_from_text("ergerger");
    }

    public function getTemplateName()
    {
        return "/source/wrapper_index2.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 8,  51 => 6,  44 => 9,  33 => 4,  30 => 3,  54 => 14,  50 => 13,  46 => 11,  42 => 8,  40 => 8,  37 => 6,  32 => 4,  29 => 3,);
    }
}
