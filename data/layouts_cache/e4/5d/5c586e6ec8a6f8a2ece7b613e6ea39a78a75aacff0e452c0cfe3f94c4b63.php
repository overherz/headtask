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
    <div class=\"muted credit\"><span style=\"margin-right: 20px;\">v.3.2.1</span> by <a href=\"mailto:overherz@gmail.com\">OverHerz</a> &copy; ");
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
        return array (  107 => 25,  99 => 23,  94 => 22,  89 => 20,  81 => 18,  75 => 16,  67 => 13,  63 => 12,  60 => 11,  57 => 10,  27 => 6,  193 => 53,  184 => 49,  177 => 46,  174 => 45,  163 => 44,  161 => 43,  154 => 42,  142 => 39,  120 => 32,  114 => 31,  111 => 30,  108 => 29,  105 => 28,  100 => 26,  97 => 25,  80 => 20,  62 => 18,  33 => 9,  21 => 2,  157 => 45,  152 => 42,  148 => 40,  145 => 39,  139 => 38,  137 => 37,  133 => 34,  127 => 33,  119 => 29,  96 => 27,  87 => 24,  84 => 23,  56 => 17,  53 => 20,  50 => 19,  46 => 15,  37 => 14,  26 => 6,  19 => 1,  102 => 27,  95 => 30,  91 => 24,  88 => 23,  83 => 4,  78 => 40,  73 => 15,  71 => 37,  68 => 36,  66 => 35,  61 => 32,  59 => 30,  45 => 18,  43 => 16,  28 => 7,  23 => 3,  40 => 11,  38 => 7,  32 => 3,  29 => 7,  147 => 50,  138 => 46,  130 => 43,  124 => 33,  121 => 26,  116 => 40,  101 => 27,  98 => 31,  92 => 21,  82 => 21,  76 => 39,  70 => 14,  64 => 17,  58 => 16,  51 => 16,  48 => 7,  42 => 16,  39 => 9,  36 => 10,  30 => 3,);
    }
}
