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
        return array (  157 => 45,  152 => 42,  148 => 40,  145 => 39,  139 => 37,  137 => 36,  127 => 33,  124 => 32,  119 => 29,  96 => 27,  92 => 26,  53 => 20,  42 => 16,  37 => 14,  102 => 37,  91 => 17,  88 => 16,  83 => 4,  78 => 40,  73 => 38,  68 => 36,  66 => 35,  59 => 30,  45 => 18,  28 => 7,  23 => 3,  48 => 7,  40 => 15,  38 => 7,  32 => 3,  29 => 2,  80 => 26,  76 => 39,  69 => 23,  64 => 20,  61 => 32,  56 => 21,  46 => 18,  43 => 16,  34 => 3,  31 => 2,  143 => 20,  138 => 17,  115 => 14,  98 => 31,  94 => 11,  87 => 24,  70 => 9,  50 => 19,  44 => 5,  24 => 3,  21 => 2,  147 => 62,  144 => 61,  133 => 34,  129 => 57,  116 => 56,  112 => 13,  108 => 53,  101 => 48,  99 => 47,  95 => 30,  84 => 23,  79 => 35,  75 => 34,  71 => 37,  67 => 32,  63 => 7,  58 => 28,  41 => 4,  39 => 12,  26 => 6,  19 => 1,);
    }
}
