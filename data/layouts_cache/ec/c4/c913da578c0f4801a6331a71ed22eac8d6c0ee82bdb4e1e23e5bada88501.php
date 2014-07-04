<?php

/* /source/footer.html */
class __TwigTemplate_ecc4c913da578c0f4801a6331a71ed22eac8d6c0ee82bdb4e1e23e5bada88501 extends Twig_Template
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
        return array (  157 => 45,  152 => 42,  148 => 40,  145 => 39,  139 => 37,  137 => 36,  133 => 34,  127 => 33,  124 => 32,  119 => 29,  96 => 27,  92 => 26,  87 => 24,  84 => 23,  53 => 20,  50 => 19,  42 => 16,  37 => 14,  26 => 6,  19 => 1,  142 => 68,  138 => 62,  135 => 61,  131 => 17,  128 => 16,  123 => 4,  118 => 71,  116 => 70,  113 => 69,  111 => 68,  108 => 67,  106 => 66,  101 => 63,  99 => 61,  93 => 58,  89 => 57,  45 => 18,  28 => 7,  23 => 3,  48 => 7,  40 => 15,  38 => 7,  32 => 3,  29 => 2,  80 => 26,  76 => 24,  69 => 23,  64 => 35,  61 => 19,  56 => 21,  46 => 18,  43 => 16,  34 => 3,  31 => 2,);
    }
}
