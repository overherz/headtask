<?php

/* /source/menu.html */
class __TwigTemplate_38f76baab9950bfc35c0b0148c7879e8d0b5db9fd78dd3e77e62a3bd0aa23c8c extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"navbar navbar-inverse\" role=\"navigation\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <span class=\"navbar-brand\">Task me!</span>
            <div style=\"color: orange;position: absolute;left:80px;top:33px;font-size: 11px;\">beta</div>
            ");
        // line 6
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu")) {
            // line 7
            echo \layout::func_from_text("            <button type=\"button\" class=\"navbar-toggle pull-left\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            ");
        }
        // line 14
        echo \layout::func_from_text("        </div>
        ");
        // line 15
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu")) {
            // line 16
            echo \layout::func_from_text("        <div class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
                ");
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
            foreach ($context['_seq'] as $context["k"] => $context["m"]) {
                // line 19
                echo \layout::func_from_text("                    ");
                if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                    // line 20
                    echo \layout::func_from_text("                         ");
                    if ((!$this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                        // line 21
                        echo \layout::func_from_text("                            <li ");
                        if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), array(), "array"))) {
                            echo \layout::func_from_text("class=\"active\"");
                        }
                        echo \layout::func_from_text("><a ");
                        if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "clickable") && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "application") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")))) {
                            echo \layout::func_from_text("href=\"");
                            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")) {
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
                    } else {
                        // line 23
                        echo \layout::func_from_text("                             <li class=\"dropdown\">
                                 <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">");
                        // line 24
                        echo \layout::func_from_text($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"));
                        echo \layout::func_from_text(" <b class=\"caret\"></b></a>
                                 <ul class=\"dropdown-menu\">
                                     ");
                        // line 26
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"));
                        foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                            // line 27
                            echo \layout::func_from_text("                                        <li><a ");
                            if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "clickable")) {
                                echo \layout::func_from_text("href=\"");
                                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), "html", null, true));
                                echo \layout::func_from_text("\"");
                            } else {
                                echo \layout::func_from_text("href='javascript:void(0);'");
                            }
                            echo \layout::func_from_text(" title=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
                            echo \layout::func_from_text("\" class=\"");
                            if (($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), array(), "array"))) {
                                echo \layout::func_from_text("active");
                            }
                            echo \layout::func_from_text("\">");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
                            echo \layout::func_from_text("</a></li>
                                     ");
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 29
                        echo \layout::func_from_text("                                 </ul>
                             </li>
                         ");
                    }
                    // line 32
                    echo \layout::func_from_text("                    ");
                }
                // line 33
                echo \layout::func_from_text("                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo \layout::func_from_text("            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
                ");
            // line 36
            if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
                // line 37
                echo \layout::func_from_text("                    <li><a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\"><i class=\"fa fa-user\"></i><span>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
                echo \layout::func_from_text("</span></a></li>
                ");
            }
            // line 39
            echo \layout::func_from_text("                ");
            if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
                // line 40
                echo \layout::func_from_text("                    <li><a href=\"/users/logout/\" id=\"logout\"><i class=\"fa fa-power-off\"></i></a></li>
                ");
            }
            // line 42
            echo \layout::func_from_text("            </ul>
        </div>
        ");
        }
        // line 45
        echo \layout::func_from_text("    </div>
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
        return array (  157 => 45,  152 => 42,  148 => 40,  145 => 39,  139 => 37,  137 => 36,  133 => 34,  127 => 33,  124 => 32,  119 => 29,  96 => 27,  92 => 26,  87 => 24,  84 => 23,  53 => 20,  50 => 19,  42 => 16,  37 => 14,  26 => 6,  19 => 1,  142 => 68,  138 => 62,  135 => 61,  131 => 17,  128 => 16,  123 => 4,  118 => 71,  116 => 70,  113 => 69,  111 => 68,  108 => 67,  106 => 66,  101 => 63,  99 => 61,  93 => 58,  89 => 57,  45 => 18,  28 => 7,  23 => 1,  48 => 7,  40 => 15,  38 => 7,  32 => 3,  29 => 2,  80 => 26,  76 => 24,  69 => 23,  64 => 35,  61 => 19,  56 => 21,  46 => 18,  43 => 16,  34 => 3,  31 => 2,);
    }
}
