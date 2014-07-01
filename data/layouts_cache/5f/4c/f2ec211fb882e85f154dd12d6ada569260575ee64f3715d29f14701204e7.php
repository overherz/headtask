<?php

/* /applications/projects/layouts/projects_in_panel.html */
class __TwigTemplate_5f4cf2ec211fb882e85f154dd12d6ada569260575ee64f3715d29f14701204e7 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"list-group\">
    ");
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "projects"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 3
            echo \layout::func_from_text("        <a href=\"/projects/tasks/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" data-id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" class=\"list-group-item ");
            if ((($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) || ($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "current_project") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")))) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
            ");
            // line 4
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "owner")) {
                echo \layout::func_from_text("<i class=\"fa fa-user\"></i> ");
            }
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("
        </a>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 6
            echo \layout::func_from_text("ничего не найдено
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo \layout::func_from_text("</div>

");
        // line 10
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
        return array (  56 => 8,  38 => 4,  27 => 3,  75 => 8,  61 => 7,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  139 => 54,  130 => 55,  128 => 54,  117 => 46,  108 => 41,  100 => 39,  83 => 31,  81 => 30,  74 => 27,  44 => 6,  41 => 5,  34 => 3,  31 => 2,  78 => 9,  71 => 26,  68 => 22,  54 => 13,  51 => 12,  43 => 8,  40 => 7,  33 => 4,  30 => 5,  115 => 45,  112 => 44,  102 => 37,  98 => 35,  92 => 37,  90 => 36,  86 => 31,  82 => 30,  77 => 27,  73 => 26,  65 => 21,  63 => 19,  60 => 10,  52 => 13,  49 => 6,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
