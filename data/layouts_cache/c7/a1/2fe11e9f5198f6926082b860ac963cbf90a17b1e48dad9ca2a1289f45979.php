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
        return array (  79 => 12,  69 => 9,  57 => 6,  35 => 5,  85 => 21,  56 => 19,  53 => 18,  49 => 17,  45 => 15,  37 => 12,  33 => 10,  29 => 8,  19 => 1,  159 => 50,  155 => 44,  152 => 43,  145 => 29,  140 => 4,  135 => 53,  133 => 52,  128 => 50,  125 => 49,  116 => 45,  114 => 43,  97 => 29,  76 => 11,  70 => 22,  64 => 21,  58 => 20,  52 => 19,  48 => 18,  28 => 4,  23 => 3,  148 => 30,  139 => 50,  137 => 49,  130 => 51,  127 => 43,  121 => 48,  110 => 35,  102 => 33,  100 => 31,  91 => 22,  88 => 25,  82 => 24,  71 => 16,  63 => 14,  61 => 13,  51 => 9,  41 => 5,  34 => 3,  31 => 2,  115 => 47,  112 => 46,  103 => 39,  101 => 38,  93 => 35,  84 => 29,  75 => 23,  66 => 17,  60 => 13,  54 => 10,  50 => 10,  44 => 16,  42 => 15,  39 => 13,  30 => 4,  27 => 7,);
    }
}
