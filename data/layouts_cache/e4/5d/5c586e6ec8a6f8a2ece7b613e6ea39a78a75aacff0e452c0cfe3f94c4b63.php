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
        return array (  126 => 33,  122 => 31,  113 => 27,  110 => 26,  104 => 24,  96 => 22,  94 => 21,  84 => 18,  81 => 17,  72 => 15,  63 => 13,  34 => 8,  30 => 6,  26 => 5,  21 => 2,  19 => 1,  102 => 37,  98 => 31,  95 => 30,  91 => 20,  88 => 16,  83 => 4,  78 => 40,  76 => 39,  73 => 38,  71 => 37,  68 => 36,  66 => 35,  61 => 32,  59 => 12,  45 => 10,  43 => 16,  28 => 4,  23 => 3,);
    }
}
