<?php

/* /applications/projects/layouts/projects_in_panel.html */
class __TwigTemplate_32cd3f3e3a4b8271a901a1da7896d185d8f38ded75d4d0f68667c6f2666cf276 extends Twig_Template
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
            echo \layout::func_from_text("        <a href=\"/projects/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" class=\"list-group-item ");
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
        return array (  58 => 10,  47 => 6,  36 => 4,  27 => 3,  79 => 8,  65 => 7,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  111 => 39,  109 => 38,  97 => 29,  88 => 24,  80 => 22,  70 => 19,  61 => 13,  44 => 6,  34 => 3,  82 => 9,  75 => 24,  72 => 20,  43 => 8,  40 => 7,  33 => 4,  30 => 5,  272 => 98,  268 => 96,  264 => 94,  260 => 92,  250 => 90,  246 => 89,  243 => 88,  239 => 87,  236 => 86,  234 => 85,  231 => 84,  229 => 83,  225 => 81,  216 => 77,  210 => 76,  204 => 75,  199 => 72,  197 => 71,  189 => 68,  184 => 65,  175 => 61,  170 => 58,  168 => 57,  164 => 55,  155 => 54,  150 => 51,  141 => 47,  136 => 44,  134 => 43,  126 => 40,  120 => 38,  114 => 38,  108 => 37,  102 => 36,  93 => 29,  89 => 28,  83 => 24,  78 => 21,  69 => 22,  63 => 14,  56 => 14,  54 => 8,  51 => 9,  45 => 9,  41 => 5,  38 => 7,  31 => 2,  28 => 3,);
    }
}
