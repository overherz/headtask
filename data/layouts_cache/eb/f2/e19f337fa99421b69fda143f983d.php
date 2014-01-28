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
        return array (  106 => 21,  84 => 18,  79 => 17,  77 => 16,  66 => 13,  25 => 4,  208 => 58,  206 => 57,  203 => 56,  194 => 52,  174 => 49,  169 => 47,  151 => 41,  137 => 40,  124 => 38,  118 => 36,  115 => 35,  113 => 34,  105 => 30,  101 => 29,  92 => 20,  83 => 23,  80 => 22,  72 => 20,  67 => 19,  54 => 16,  34 => 13,  21 => 2,  91 => 22,  85 => 21,  56 => 19,  53 => 18,  49 => 17,  45 => 6,  39 => 14,  33 => 10,  27 => 7,  19 => 1,  159 => 46,  155 => 44,  152 => 43,  148 => 30,  145 => 29,  140 => 4,  135 => 53,  133 => 52,  128 => 50,  125 => 49,  121 => 37,  116 => 45,  114 => 43,  97 => 28,  76 => 21,  70 => 22,  64 => 21,  58 => 10,  44 => 16,  42 => 5,  28 => 4,  23 => 3,  48 => 7,  38 => 7,  32 => 3,  29 => 8,  153 => 52,  144 => 48,  136 => 45,  130 => 51,  127 => 39,  122 => 42,  112 => 34,  109 => 32,  100 => 31,  94 => 28,  88 => 25,  82 => 24,  74 => 15,  68 => 22,  63 => 19,  60 => 11,  55 => 9,  52 => 8,  40 => 8,  37 => 12,  31 => 3,);
    }
}
