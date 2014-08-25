<?php

/* /source/wrapper_index2.html */
class __TwigTemplate_076fa99a25ff13091cfbf273abda469826d7e94e5c1854f6af4fc68dc013e8cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'menu' => array($this, 'block_menu'),
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
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    <style>
        body {
            background: url(/source/images/login_back.jpg) no-repeat;
        }

        #wrapper {
            padding-left: 0 !important;
        }
    </style>
");
    }

    // line 15
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo \layout::func_from_text("    <div id=\"content\" style=\"margin: 50px;\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\"><b>");
        // line 19
        $this->displayBlock('info_title', $context, $blocks);
        echo \layout::func_from_text("</b></div>
            <div class=\"panel-body\">
                ");
        // line 21
        $this->displayBlock('info', $context, $blocks);
        // line 22
        echo \layout::func_from_text("            </div>
        </div>
    </div>
");
    }

    // line 19
    public function block_info_title($context, array $blocks = array())
    {
    }

    // line 21
    public function block_info($context, array $blocks = array())
    {
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
        return array (  79 => 21,  74 => 19,  67 => 22,  65 => 21,  60 => 19,  56 => 17,  53 => 16,  48 => 15,  35 => 4,  32 => 3,);
    }
}
