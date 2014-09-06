<?php

/* /source/search_form.html */
class __TwigTemplate_3542f1d0ba3ea1b1500d297afcb51ddd24695c27b34edaf1a681f2f856b39b78 extends Twig_Template
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
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\">
    <div class=\"form-group col-xs-6\" style=\"padding-left: 0;\">
        <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Поиск\">
    </div>
    <input type=\"hidden\" name=\"page\" value=\"\">
</form>
<div class=\"clearfix\"></div>");
    }

    public function getTemplateName()
    {
        return "/source/search_form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
