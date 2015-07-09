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
        echo \layout::func_from_text("<div id=\"sidebar-wrapper\">
    <ul class=\"sidebar-nav\">
        <li class=\"sidebar-brand\" style=\"background: #fff;\">
            <span class=\"navbar-brand logo_color1\">h<span class=\"brand_full\">ead</span><span class=\"logo_color2\">t<span class=\"brand_full\">ask</span></span></span>
            <div style=\"position: absolute;top:0;right:0;\" id=\"user_menu\">
                <a href=\"/users/logout/\" id=\"logout\" style=\"display: inline-block;\"><i class=\"fa fa-power-off\"></i></a>
            </div>
        </li>

        ");
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
        foreach ($context['_seq'] as $context["k"] => $context["m"]) {
            // line 11
            echo \layout::func_from_text("            ");
            if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                // line 12
                echo \layout::func_from_text("                <li data-dropdown='");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("' class=\"");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), array(), "array"))) {
                    echo \layout::func_from_text("active");
                }
                echo \layout::func_from_text(" ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/"))) {
                    echo \layout::func_from_text("dropdown");
                }
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/users/logout/")) {
                    echo \layout::func_from_text("style=\"margin-top: 30px;\" ");
                }
                echo \layout::func_from_text(">
                    <div style=\"position: relative;\">
                        <a ");
                // line 14
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "clickable") && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "application") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")))) {
                    echo \layout::func_from_text("href=\"");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")) {
                    }
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), "html", null, true));
                    echo \layout::func_from_text("\"");
                } else {
                    echo \layout::func_from_text("href='javascript:void(0);'");
                }
                echo \layout::func_from_text(" class=\"pajax menu");
                echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), array("/" => "_")), "html", null, true));
                echo \layout::func_from_text("\" ");
                if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "new_window")) {
                    echo \layout::func_from_text("target=\"_blank\"");
                }
                echo \layout::func_from_text(">
                            ");
                // line 15
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-tasks sidebar_icon fa-fw\"></i>");
                }
                // line 16
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/dashboard/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-tachometer sidebar_icon fa-fw\"></i>");
                }
                // line 17
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/calendar/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-calendar sidebar_icon fa-fw\"></i>");
                }
                // line 18
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/users/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-users sidebar_icon fa-fw\"></i>");
                }
                // line 19
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/logs/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-eye sidebar_icon fa-fw\"></i>");
                }
                // line 20
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/users/profile/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-user sidebar_icon fa-fw\"></i>");
                }
                // line 21
                echo \layout::func_from_text("                            ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/users/logout/")) {
                    echo \layout::func_from_text("<i class=\"fa fa-power-off sidebar_icon fa-fw\"></i>");
                }
                // line 22
                echo \layout::func_from_text("                            <span class=\"sidebar_link\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</span>
                        </a>
                        ");
                // line 24
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                    // line 25
                    echo \layout::func_from_text("                            <div style=\"position: absolute;top:0;right:15px;\">
                                ");
                    // line 26
                    if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_own_project"))) {
                        // line 27
                        echo \layout::func_from_text("                                    <a href=\"/projects/add/\" class=\"");
                        if ((isset($context["add"]) ? $context["add"] : null)) {
                            echo \layout::func_from_text("active");
                        }
                        echo \layout::func_from_text("\" style=\"display: inline-block !important;text-indent: 2px;padding-right: 4px;\"><i class=\"fa fa-plus\"></i></a>
                                ");
                    }
                    // line 29
                    echo \layout::func_from_text("                            </div>
                        ");
                }
                // line 30
                echo \layout::func_from_text("</div>
                ");
                // line 31
                if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category")) {
                    // line 32
                    echo \layout::func_from_text("                    <ul class=\"submenu dropdown");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                    echo \layout::func_from_text("\" >
                    ");
                    // line 33
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                        // line 34
                        echo \layout::func_from_text("                        <li class=\"menu");
                        echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), array("/" => "_")), "html", null, true));
                        echo \layout::func_from_text(" ");
                        if (($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), array(), "array"))) {
                            echo \layout::func_from_text("active");
                        }
                        echo \layout::func_from_text("\" style=\"text-indent: 0;\">
                            <a ");
                        // line 35
                        if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "clickable")) {
                            echo \layout::func_from_text("href=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), "html", null, true));
                            echo \layout::func_from_text("\"");
                        } else {
                            echo \layout::func_from_text("href='javascript:void(0);'");
                        }
                        echo \layout::func_from_text(" class=\"pajax menu");
                        echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), array("/" => "_")), "html", null, true));
                        echo \layout::func_from_text("\" ");
                        if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "new_window")) {
                            echo \layout::func_from_text("target=\"_blank\"");
                        }
                        echo \layout::func_from_text(">");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
                        echo \layout::func_from_text("</a>
                        </li>
                    ");
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    echo \layout::func_from_text("                    </ul>
                ");
                }
                // line 40
                echo \layout::func_from_text("                    ");
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                    // line 41
                    echo \layout::func_from_text("                        <ul id=\"project_panel_result\" class=\"submenu dropdown");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                    echo \layout::func_from_text("\" >[[projects__get_projects]]</ul>
                    ");
                }
                // line 43
                echo \layout::func_from_text("                </li>
            ");
            }
            // line 45
            echo \layout::func_from_text("        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo \layout::func_from_text("    </ul>
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
        return array (  201 => 46,  195 => 45,  191 => 43,  185 => 41,  182 => 40,  178 => 38,  155 => 35,  146 => 34,  142 => 33,  137 => 32,  135 => 31,  132 => 30,  118 => 26,  113 => 24,  97 => 20,  92 => 19,  87 => 18,  82 => 17,  77 => 16,  73 => 15,  37 => 12,  34 => 11,  30 => 10,  19 => 1,  301 => 170,  296 => 31,  292 => 24,  289 => 23,  286 => 22,  282 => 16,  279 => 15,  274 => 4,  269 => 172,  267 => 170,  264 => 169,  258 => 166,  254 => 165,  250 => 164,  246 => 163,  243 => 162,  241 => 161,  226 => 148,  154 => 78,  152 => 77,  128 => 29,  120 => 27,  115 => 25,  111 => 47,  107 => 22,  102 => 21,  100 => 44,  86 => 32,  84 => 31,  76 => 25,  74 => 22,  67 => 20,  62 => 17,  60 => 15,  55 => 14,  51 => 12,  47 => 11,  42 => 9,  29 => 4,  24 => 1,);
    }
}
