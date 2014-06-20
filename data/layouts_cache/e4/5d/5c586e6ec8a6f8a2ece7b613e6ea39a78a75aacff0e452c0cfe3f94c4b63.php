<?php

/* /source/footer.html */
class __TwigTemplate_e45d5c586e6ec8a6f8a2ece7b613e6ea39a78a75aacff0e452c0cfe3f94c4b63 extends Twig_Template
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
    <div class=\"muted credit\"><span style=\"margin-right: 20px;\">v.3.2.1</span> by OverHerz &copy; ");
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
        return array (  19 => 1,  104 => 37,  100 => 31,  97 => 30,  93 => 17,  90 => 16,  85 => 4,  80 => 40,  78 => 39,  75 => 38,  73 => 37,  66 => 35,  61 => 32,  59 => 30,  45 => 18,  43 => 16,  28 => 4,  23 => 3,  38 => 7,  32 => 3,  29 => 2,  196 => 133,  192 => 131,  187 => 128,  175 => 119,  70 => 36,  68 => 15,  65 => 14,  63 => 13,  60 => 12,  54 => 9,  51 => 8,  48 => 7,  40 => 8,  37 => 3,  31 => 2,);
    }
}
