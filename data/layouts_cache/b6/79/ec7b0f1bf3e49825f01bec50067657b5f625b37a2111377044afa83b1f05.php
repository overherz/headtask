<?php

/* /error/denied.html */
class __TwigTemplate_b679ec7b0f1bf3e49825f01bec50067657b5f625b37a2111377044afa83b1f05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
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
        echo \layout::func_from_text("<style>
    #wrap {
        background: #fff;
    }
</style>
");
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<div style=\"text-align: center;\">
    <img src=\"/source/images/access_denied.png\">
    <div>
        ");
        // line 13
        if ((isset($context["referer"]) ? $context["referer"] : null)) {
            echo \layout::func_from_text("<a href=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["referer"]) ? $context["referer"] : null), "html", null, true));
            echo \layout::func_from_text("\">вернуться на предыдущую страницу</a>
        ");
        } else {
            // line 14
            echo \layout::func_from_text(" <a href=\"/\">вернуться на главную страницу</a>
        ");
        }
        // line 16
        echo \layout::func_from_text("    </div>
</div>
");
    }

    public function getTemplateName()
    {
        return "/error/denied.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 16,  56 => 14,  49 => 13,  44 => 10,  41 => 9,  32 => 3,  29 => 2,);
    }
}
