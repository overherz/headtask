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
        return array (  99 => 23,  92 => 21,  89 => 20,  81 => 18,  73 => 15,  67 => 13,  57 => 10,  39 => 9,  27 => 6,  214 => 64,  212 => 63,  208 => 61,  199 => 57,  179 => 54,  174 => 52,  164 => 51,  156 => 46,  141 => 45,  135 => 44,  132 => 43,  129 => 42,  126 => 41,  123 => 40,  117 => 37,  113 => 35,  105 => 33,  96 => 30,  91 => 28,  43 => 18,  21 => 2,  140 => 38,  125 => 32,  121 => 26,  115 => 29,  107 => 25,  84 => 26,  80 => 25,  75 => 16,  72 => 19,  41 => 16,  34 => 14,  19 => 1,  176 => 67,  172 => 61,  169 => 60,  165 => 30,  162 => 29,  157 => 4,  152 => 70,  150 => 69,  147 => 68,  145 => 67,  142 => 66,  138 => 65,  133 => 35,  131 => 60,  97 => 29,  76 => 23,  70 => 14,  64 => 21,  58 => 20,  44 => 17,  42 => 15,  28 => 4,  23 => 3,  48 => 18,  38 => 17,  32 => 3,  29 => 7,  153 => 52,  144 => 48,  136 => 36,  130 => 44,  127 => 33,  122 => 42,  112 => 28,  109 => 34,  100 => 32,  94 => 22,  88 => 27,  82 => 24,  74 => 23,  68 => 22,  63 => 12,  60 => 11,  55 => 15,  52 => 19,  40 => 8,  37 => 5,  31 => 3,);
    }
}
