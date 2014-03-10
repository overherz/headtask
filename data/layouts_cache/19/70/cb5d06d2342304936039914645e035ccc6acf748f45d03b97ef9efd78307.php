<?php

/* /source/menu.html */
class __TwigTemplate_1970cb5d06d2342304936039914645e035ccc6acf748f45d03b97ef9efd78307 extends Twig_Template
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
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <span class=\"navbar-brand\">Task me!</span>
        </div>
        <div class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
                ");
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
        foreach ($context['_seq'] as $context["k"] => $context["m"]) {
            // line 15
            echo \layout::func_from_text("                    ");
            if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                // line 16
                echo \layout::func_from_text("                         ");
                if ((!$this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                    // line 17
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
                    // line 19
                    echo \layout::func_from_text("                             <li class=\"dropdown\">
                                 <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">");
                    // line 20
                    echo \layout::func_from_text($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"));
                    echo \layout::func_from_text(" <b class=\"caret\"></b></a>
                                 <ul class=\"dropdown-menu\">
                                     ");
                    // line 22
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                        // line 23
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
                    // line 25
                    echo \layout::func_from_text("                                 </ul>
                             </li>
                         ");
                }
                // line 28
                echo \layout::func_from_text("                    ");
            }
            // line 29
            echo \layout::func_from_text("                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo \layout::func_from_text("            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
                ");
        // line 32
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            // line 33
            echo \layout::func_from_text("                    <li><a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
            echo \layout::func_from_text("</a></li>
                ");
        }
        // line 35
        echo \layout::func_from_text("                ");
        if ($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user")) {
            // line 36
            echo \layout::func_from_text("                    <li><a href=\"/users/logout/\" id=\"logout\"><i class=\"fa fa-power-off\"></i></a></li>
                ");
        }
        // line 38
        echo \layout::func_from_text("            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
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
        return array (  140 => 38,  133 => 35,  127 => 33,  121 => 30,  84 => 23,  80 => 22,  75 => 20,  72 => 19,  41 => 16,  34 => 14,  19 => 1,  119 => 52,  115 => 29,  112 => 28,  108 => 16,  105 => 15,  100 => 4,  95 => 55,  93 => 54,  90 => 53,  88 => 52,  85 => 51,  81 => 50,  76 => 47,  44 => 17,  28 => 4,  23 => 1,  48 => 7,  40 => 8,  38 => 15,  32 => 3,  29 => 2,  199 => 70,  191 => 64,  187 => 62,  181 => 61,  176 => 58,  170 => 57,  165 => 54,  159 => 52,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  139 => 45,  136 => 36,  132 => 43,  125 => 32,  117 => 37,  113 => 35,  109 => 33,  107 => 25,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 45,  71 => 20,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 15,  39 => 3,  31 => 2,);
    }
}
