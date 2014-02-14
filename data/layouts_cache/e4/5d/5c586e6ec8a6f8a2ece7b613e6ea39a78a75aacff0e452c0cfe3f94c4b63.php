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
        return array (  92 => 20,  84 => 18,  79 => 17,  74 => 15,  66 => 13,  55 => 9,  25 => 4,  123 => 35,  112 => 30,  106 => 21,  102 => 27,  98 => 26,  81 => 24,  77 => 16,  73 => 20,  69 => 18,  67 => 17,  60 => 11,  21 => 2,  91 => 25,  85 => 21,  53 => 18,  49 => 17,  37 => 12,  33 => 10,  27 => 7,  19 => 1,  159 => 50,  155 => 44,  152 => 43,  148 => 30,  145 => 29,  140 => 4,  135 => 53,  133 => 38,  130 => 37,  128 => 50,  125 => 49,  121 => 48,  116 => 32,  114 => 43,  100 => 31,  97 => 29,  88 => 25,  82 => 24,  76 => 23,  70 => 22,  64 => 21,  58 => 10,  52 => 8,  44 => 16,  42 => 5,  28 => 4,  23 => 3,  40 => 13,  38 => 7,  32 => 11,  29 => 8,  59 => 18,  56 => 19,  48 => 7,  45 => 6,  39 => 13,  36 => 5,  30 => 3,);
    }
}
