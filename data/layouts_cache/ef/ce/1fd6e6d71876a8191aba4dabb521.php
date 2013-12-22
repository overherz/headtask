<?php

/* /source/menu.html */
class __TwigTemplate_efce1fd6e6d71876a8191aba4dabb521 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"navbar navbar-inverse\" xmlns=\"http://www.w3.org/1999/html\">
    <div class=\"navbar-inner\">
        <div class=\"container\">
            <span class=\"brand\" style=\"color: deepskyblue;font-weight: bold;\">Task me!</span>
            <div class=\"nav-collapse collapse\">
                <p style=\"position: absolute;right:0;margin-top: 5px;\">
                    ");
        // line 7
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            // line 8
            echo \layout::func_from_text("                        <a href=\"/users/logout/\" id=\"logout\"><i class=\"icon-off\"></i></a>
                    ");
        }
        // line 10
        echo \layout::func_from_text("                </p>
                <p class=\"navbar-text pull-right\" style=\"margin-right: 40px;font-weight: bold;\">
                    ");
        // line 12
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            // line 13
            echo \layout::func_from_text("                        <a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
            echo \layout::func_from_text("</a>
                    ");
        }
        // line 15
        echo \layout::func_from_text("                </p>
                <ul class=\"nav\">
                    ");
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
        foreach ($context['_seq'] as $context["k"] => $context["m"]) {
            // line 18
            echo \layout::func_from_text("                    ");
            if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                // line 19
                echo \layout::func_from_text("                        <li ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), array(), "array"))) {
                    echo \layout::func_from_text("class=\"active\"");
                }
                echo \layout::func_from_text("><a ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "clickable") && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "application") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")))) {
                    echo \layout::func_from_text("href=\"");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")) {
                        echo \layout::func_from_text("//");
                    }
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), "html", null, true));
                    echo \layout::func_from_text("\"");
                } else {
                    echo \layout::func_from_text("href='javascript:void(0);'");
                }
                echo \layout::func_from_text(" title=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" class=\"menu");
                echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), array("/" => "_")), "html", null, true));
                echo \layout::func_from_text("\" ");
                if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "new_window")) {
                    echo \layout::func_from_text("target=\"_blank\"");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</a></li>
                    ");
            }
            // line 21
            echo \layout::func_from_text("                    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo \layout::func_from_text("                </ul>
            </div>
        </div>
    </div>
</div>");
    }

    public function getTemplateName()
    {
        return "/source/menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 22,  85 => 21,  56 => 19,  39 => 13,  33 => 10,  27 => 7,  19 => 1,  160 => 51,  156 => 45,  153 => 44,  149 => 31,  146 => 30,  141 => 4,  136 => 54,  134 => 53,  131 => 52,  129 => 51,  126 => 50,  122 => 49,  117 => 46,  115 => 44,  101 => 32,  98 => 30,  89 => 26,  83 => 25,  77 => 24,  71 => 23,  65 => 22,  59 => 21,  53 => 18,  49 => 17,  45 => 15,  43 => 16,  28 => 4,  23 => 1,  48 => 7,  38 => 7,  32 => 3,  29 => 8,  315 => 105,  306 => 101,  298 => 98,  292 => 97,  289 => 96,  284 => 95,  272 => 85,  263 => 81,  254 => 77,  244 => 76,  236 => 71,  222 => 70,  212 => 69,  209 => 68,  206 => 67,  203 => 66,  200 => 65,  198 => 64,  194 => 62,  190 => 60,  186 => 59,  182 => 58,  177 => 57,  173 => 55,  168 => 53,  165 => 52,  161 => 51,  157 => 50,  152 => 49,  145 => 47,  139 => 46,  133 => 45,  124 => 44,  119 => 43,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 8,  37 => 12,  31 => 3,);
    }
}
