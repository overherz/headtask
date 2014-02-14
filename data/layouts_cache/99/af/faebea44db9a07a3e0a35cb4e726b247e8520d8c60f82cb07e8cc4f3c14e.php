<?php

/* /source/search_form.html */
class __TwigTemplate_99affaebea44db9a07a3e0a35cb4e726b247e8520d8c60f82cb07e8cc4f3c14e extends Twig_Template
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
        return array (  19 => 1,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,);
    }
}
