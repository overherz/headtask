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
            <span class=\"navbar-brand\">Task me!</span>
            <button type=\"button\" class=\"navbar-toggle pull-left\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
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
            echo \layout::func_from_text("                    <li><a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\"><i class=\"fa fa-user\"></i><span>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "fio"), "html", null, true));
            echo \layout::func_from_text("</span></a></li>
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
        return array (  140 => 38,  136 => 36,  133 => 35,  127 => 33,  125 => 32,  121 => 30,  115 => 29,  112 => 28,  107 => 25,  84 => 23,  80 => 22,  75 => 20,  72 => 19,  41 => 16,  38 => 15,  34 => 14,  19 => 1,  102 => 37,  98 => 31,  95 => 30,  91 => 17,  88 => 16,  83 => 4,  78 => 40,  76 => 39,  73 => 38,  71 => 37,  68 => 36,  66 => 35,  61 => 32,  59 => 30,  45 => 18,  43 => 16,  28 => 4,  23 => 1,  56 => 8,  51 => 6,  44 => 17,  33 => 4,  30 => 3,  54 => 14,  50 => 13,  46 => 11,  42 => 8,  40 => 8,  37 => 6,  32 => 4,  29 => 3,);
    }
}
