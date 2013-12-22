<?php

/* /source/footer.html */
class __TwigTemplate_ebf2e19f337fa99421b69fda143f983d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<div class=\"clearfix\"></div>
<div id=\"footer\">
    <div class=\"muted credit\"><span style=\"margin-right: 20px;\">v.2.3.5</span> by OverHerz &copy; ");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, "", "Y"), "html", null, true));
        echo \layout::func_from_text("</div>
</div>");
    }

    public function getTemplateName()
    {
        return "/source/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
