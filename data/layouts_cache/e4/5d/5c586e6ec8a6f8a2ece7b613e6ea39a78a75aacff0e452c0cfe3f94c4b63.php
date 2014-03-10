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
        return array (  140 => 38,  133 => 35,  127 => 33,  121 => 30,  84 => 23,  80 => 22,  75 => 20,  72 => 19,  41 => 16,  34 => 14,  19 => 1,  119 => 52,  115 => 29,  112 => 28,  108 => 16,  105 => 15,  100 => 4,  95 => 55,  93 => 54,  90 => 53,  88 => 52,  85 => 51,  81 => 50,  76 => 47,  44 => 17,  28 => 4,  23 => 3,  48 => 7,  40 => 8,  38 => 15,  32 => 3,  29 => 2,  199 => 70,  191 => 64,  187 => 62,  181 => 61,  176 => 58,  170 => 57,  165 => 54,  159 => 52,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  139 => 45,  136 => 36,  132 => 43,  125 => 32,  117 => 37,  113 => 35,  109 => 33,  107 => 25,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 45,  71 => 20,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 15,  39 => 3,  31 => 2,);
    }
}
