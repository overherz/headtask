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
        return array (  73 => 15,  70 => 14,  67 => 13,  27 => 6,  233 => 67,  224 => 63,  217 => 60,  214 => 59,  203 => 58,  201 => 57,  198 => 56,  192 => 53,  182 => 52,  179 => 51,  177 => 50,  170 => 46,  155 => 45,  149 => 44,  146 => 43,  143 => 42,  137 => 40,  135 => 39,  131 => 37,  123 => 34,  119 => 33,  114 => 32,  110 => 30,  105 => 28,  102 => 27,  94 => 22,  86 => 23,  68 => 20,  62 => 19,  53 => 18,  33 => 9,  21 => 2,  140 => 41,  136 => 36,  133 => 35,  127 => 35,  125 => 32,  115 => 29,  112 => 28,  107 => 25,  80 => 22,  41 => 16,  34 => 14,  19 => 1,  103 => 36,  99 => 23,  96 => 29,  89 => 20,  84 => 23,  79 => 39,  77 => 38,  74 => 21,  72 => 19,  65 => 34,  60 => 11,  58 => 29,  44 => 17,  28 => 4,  23 => 3,  40 => 8,  38 => 12,  32 => 3,  29 => 7,  147 => 50,  138 => 46,  130 => 43,  124 => 42,  121 => 26,  116 => 40,  101 => 27,  98 => 26,  92 => 21,  81 => 18,  75 => 16,  69 => 35,  63 => 12,  57 => 10,  51 => 11,  48 => 17,  42 => 13,  39 => 9,  36 => 5,  30 => 3,);
    }
}
