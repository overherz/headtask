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
                <a href=\"/users/profile/\" class=\"username_in_top\" title=\"Профиль\" style=\"display: inline-block;\"><i class=\"fa fa-user\"></i></a>
                <a href=\"/users/logout/\" id=\"logout\" style=\"display: inline-block;\"><i class=\"fa fa-power-off\"></i></a>
            </div>
        </li>

        ");
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"));
        foreach ($context['_seq'] as $context["k"] => $context["m"]) {
            // line 12
            echo \layout::func_from_text("            ");
            if (((isset($context["k"]) ? $context["k"] : null) != "crumbs")) {
                // line 13
                echo \layout::func_from_text("                ");
                if ((!$this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"))) {
                    // line 14
                    echo \layout::func_from_text("                    <li ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "active") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "menu"), "crumbs"), $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), array(), "array"))) {
                        echo \layout::func_from_text("class=\"active\"");
                    }
                    echo \layout::func_from_text(">
                        <div style=\"position: relative;\">
                            <a ");
                    // line 16
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "clickable") && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "application") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")))) {
                        echo \layout::func_from_text("href=\"");
                        if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type") == "link")) {
                        }
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), "html", null, true));
                        echo \layout::func_from_text("\"");
                    } else {
                        echo \layout::func_from_text("href='javascript:void(0);'");
                    }
                    echo \layout::func_from_text(" class=\"menu");
                    echo \layout::func_from_text(twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path"), array("/" => "_")), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "new_window")) {
                        echo \layout::func_from_text("target=\"_blank\"");
                    }
                    echo \layout::func_from_text(">
                                ");
                    // line 17
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                        echo \layout::func_from_text("<i class=\"fa fa-tasks sidebar_icon fa-fw\"></i>");
                    }
                    // line 18
                    echo \layout::func_from_text("                                ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/dashboard/")) {
                        echo \layout::func_from_text("<i class=\"fa fa-tachometer sidebar_icon fa-fw\"></i>");
                    }
                    // line 19
                    echo \layout::func_from_text("                                ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/calendar/")) {
                        echo \layout::func_from_text("<i class=\"fa fa-calendar sidebar_icon fa-fw\"></i>");
                    }
                    // line 20
                    echo \layout::func_from_text("                                ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/users/")) {
                        echo \layout::func_from_text("<i class=\"fa fa-users sidebar_icon fa-fw\"></i>");
                    }
                    // line 21
                    echo \layout::func_from_text("                                ");
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/logs/")) {
                        echo \layout::func_from_text("<i class=\"fa fa-eye sidebar_icon fa-fw\"></i>");
                    }
                    // line 22
                    echo \layout::func_from_text("                                <span class=\"sidebar_link\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</span>
                            </a>
                            ");
                    // line 24
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                        // line 25
                        echo \layout::func_from_text("                                <div style=\"position: absolute;top:0;right:15px;\">
                                    ");
                        // line 26
                        if (((($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_project")) || $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "access"), "add_own_project"))) {
                            // line 27
                            echo \layout::func_from_text("                                        <a href=\"/projects/add/\" class=\"");
                            if ((isset($context["add"]) ? $context["add"] : null)) {
                                echo \layout::func_from_text("active");
                            }
                            echo \layout::func_from_text("\" style=\"display: inline-block;text-indent: 2px;padding-right: 4px;\"><i class=\"fa fa-plus\"></i></a>
                                    ");
                        }
                        // line 29
                        echo \layout::func_from_text("                                    <a href=\"/projects/all/\" class=\"");
                        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
                            echo \layout::func_from_text("active");
                        }
                        echo \layout::func_from_text("\" style=\"display: inline-block;text-indent: 2px;padding-right: 4px;\" title=\"Все проекты\"><i class=\"fa fa-book\"></i></a>
                                </div>
                            ");
                    }
                    // line 31
                    echo \layout::func_from_text("</div>
                    </li>
                    ");
                    // line 33
                    if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "path") == "/projects/")) {
                        // line 34
                        echo \layout::func_from_text("                        <div id=\"project_panel_result\">[[projects__get_projects]]</div>

                        <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                            <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                            <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                            <input type=\"hidden\" name=\"id_project\" value=\"");
                        // line 39
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\">
                        </form>
                    ");
                    }
                    // line 42
                    echo \layout::func_from_text("                ");
                } else {
                    // line 43
                    echo \layout::func_from_text("                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">");
                    // line 44
                    echo \layout::func_from_text($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "name"));
                    echo \layout::func_from_text(" <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            ");
                    // line 46
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "category"));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                        // line 47
                        echo \layout::func_from_text("                                <li><a ");
                        if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "clickable")) {
                            echo \layout::func_from_text("href=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "path"), "html", null, true));
                            echo \layout::func_from_text("\"");
                        } else {
                            echo \layout::func_from_text("href='javascript:void(0);'");
                        }
                        echo \layout::func_from_text(" class=\"");
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
                    // line 49
                    echo \layout::func_from_text("                        </ul>
                    </li>
                ");
                }
                // line 52
                echo \layout::func_from_text("            ");
            }
            // line 53
            echo \layout::func_from_text("        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
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
        return array (  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 39,  127 => 34,  125 => 33,  121 => 31,  112 => 29,  104 => 27,  99 => 25,  91 => 22,  86 => 21,  76 => 19,  67 => 17,  49 => 16,  38 => 13,  35 => 12,  19 => 1,  237 => 111,  232 => 31,  228 => 24,  225 => 23,  222 => 22,  218 => 16,  215 => 15,  210 => 4,  205 => 113,  203 => 111,  200 => 110,  194 => 107,  190 => 54,  186 => 105,  182 => 104,  179 => 103,  177 => 102,  173 => 100,  130 => 59,  128 => 58,  118 => 51,  115 => 50,  110 => 48,  106 => 47,  102 => 26,  97 => 24,  95 => 44,  81 => 20,  79 => 31,  71 => 18,  69 => 22,  62 => 17,  60 => 15,  55 => 13,  47 => 11,  42 => 9,  29 => 4,  24 => 1,  75 => 17,  70 => 18,  68 => 17,  63 => 14,  61 => 13,  54 => 10,  51 => 12,  44 => 6,  41 => 14,  34 => 3,  31 => 11,);
    }
}
