<?php

/* /applications/projects/layouts/projects_in_top.html */
class __TwigTemplate_c7a12fe11e9f5198f6926082b860ac963cbf90a17b1e48dad9ca2a1289f45979 extends Twig_Template
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
        echo \layout::func_from_text("<ul class=\"nav nav-list projects_list\">
    <li class=\"nav-header\" style=\"position: absolute;top:0;left: 50%;margin-left: -25px;\">Проекты</li>
    ");
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "projects"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 4
            echo \layout::func_from_text("        <li ");
            if ((($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) || ($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "current_project") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")))) {
                echo \layout::func_from_text("class=\"active\"");
            }
            echo \layout::func_from_text(" style=\"display:inline-block;margin-right:30px;\">
            <a href=\"/projects/~");
            // line 5
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description") || $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url"))) {
                echo \layout::func_from_text("class=\"project_description_bottom\" rel=\"popover\" data-original-title=\"Описание проекта\" data-content=\"");
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description"), "html", null, true));
                }
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url")) {
                    if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description")) {
                        echo \layout::func_from_text("<br>");
                    }
                    echo \layout::func_from_text("<a href='//");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url"), "html", null, true));
                    echo \layout::func_from_text("' target='_blank'>");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url"), "html", null, true));
                    echo \layout::func_from_text("</a>");
                }
                echo \layout::func_from_text("\"");
            }
            echo \layout::func_from_text(">
                ");
            // line 6
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "owner")) {
                echo \layout::func_from_text("<i class=\"icon-user\"></i> ");
            }
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("
            </a>
        </li>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 9
            echo \layout::func_from_text("ничего не найдено
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo \layout::func_from_text("</ul>
<div style=\"position:absolute;right:10px;top:0;\">");
        // line 12
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "jpaginator_project_panel.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/projects_in_top.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 12,  76 => 11,  57 => 6,  35 => 5,  23 => 3,  19 => 1,  148 => 49,  139 => 50,  137 => 49,  130 => 44,  127 => 43,  121 => 40,  110 => 35,  102 => 33,  100 => 32,  91 => 25,  88 => 24,  82 => 21,  71 => 16,  61 => 13,  44 => 6,  34 => 3,  77 => 25,  74 => 24,  69 => 9,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  242 => 86,  238 => 84,  234 => 82,  230 => 80,  220 => 78,  216 => 77,  213 => 76,  209 => 75,  206 => 74,  204 => 73,  201 => 72,  199 => 71,  195 => 69,  186 => 65,  180 => 64,  174 => 63,  169 => 60,  167 => 59,  159 => 56,  154 => 53,  145 => 49,  140 => 46,  138 => 45,  134 => 43,  125 => 42,  120 => 39,  111 => 35,  106 => 32,  104 => 31,  96 => 28,  90 => 27,  84 => 26,  78 => 25,  72 => 23,  63 => 14,  59 => 16,  54 => 10,  51 => 9,  45 => 9,  41 => 5,  38 => 7,  31 => 2,  28 => 4,);
    }
}
