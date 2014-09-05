<?php

/* applications/projects/layouts/projects_in_panel.html */
class __TwigTemplate_7c06a6203429c3ae65842d826294fd4688b0416043e08d49272cf950116449a1 extends Twig_Template
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
        echo \layout::func_from_text("<ul style=\"list-style: none;padding-left: 0;\" class=\"projects_in_panel\">
");
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "projects"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 3
            echo \layout::func_from_text("    <li style=\"text-indent: 0;\" class=\"sidebar_project ");
            if ((($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) || ($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "current_project") == $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")))) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\">
    <a href=\"/projects/tasks/");
            // line 4
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" data-id=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" style=\"padding: 5px 0 5px 30px;line-height: 15px;\">
        ");
            // line 5
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "owner")) {
                echo \layout::func_from_text("<i class=\"fa fa-user\" style=\"text-indent: 0;\"></i> ");
            }
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("
    </a>
    </li>
");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo \layout::func_from_text("</ul>
");
        // line 10
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "jpaginator_project_panel.html"), "method"));
        $template->display($context);
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/projects_in_panel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 10,  33 => 4,  26 => 3,  22 => 2,  190 => 54,  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 39,  127 => 34,  125 => 33,  112 => 29,  104 => 27,  102 => 26,  99 => 25,  86 => 21,  81 => 20,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 16,  198 => 15,  193 => 4,  188 => 119,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 108,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 46,  82 => 45,  66 => 32,  64 => 31,  47 => 17,  45 => 15,  24 => 1,  75 => 17,  70 => 18,  68 => 17,  63 => 14,  61 => 13,  54 => 22,  34 => 3,  51 => 9,  44 => 6,  41 => 14,  38 => 13,  31 => 11,  28 => 3,  121 => 31,  118 => 47,  107 => 39,  103 => 37,  97 => 24,  95 => 50,  91 => 22,  87 => 32,  80 => 44,  76 => 19,  67 => 17,  65 => 18,  62 => 17,  56 => 25,  52 => 9,  49 => 16,  42 => 8,  39 => 5,  32 => 4,  29 => 4,);
    }
}
