<?php

/* /applications/projects/layouts/projects_in_panel.html */
class __TwigTemplate_95149e26d01f5bd5df4457295cde662e extends Twig_Template
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
    <li class=\"nav-header\">Проекты</li>
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
            echo \layout::func_from_text(">
            <a href=\"/projects/~");
            // line 5
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" ");
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description") || $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url"))) {
                echo \layout::func_from_text("class=\"project_description\" rel=\"popover\" data-original-title=\"Описание проекта\" data-content=\"");
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description"), "html", null, true));
                }
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "url")) {
                    if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "description")) {
                        echo \layout::func_from_text("<br>");
                    }
                    echo \layout::func_from_text("<a href='");
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

");
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "jpaginator_project_panel.html"), "method"));
        $template->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/projects_in_panel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 13,  76 => 11,  69 => 9,  57 => 6,  35 => 5,  28 => 4,  23 => 3,  19 => 1,);
    }
}
