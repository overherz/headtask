<?php

/* /applications/projects/layouts/jpaginator_project_panel.html */
class __TwigTemplate_9cbe2cbff42b94fd31a17ebd02dc34dd4927b4dab20637f8bce3374b18613d22 extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "num_list")) {
            // line 2
            echo \layout::func_from_text("<div style=\"text-align: center;\" class=\"jpaginator_project_panel\">
    <ul class=\"pagination pagination_projects\" style=\"margin: 10px 0 0;\">
        ");
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "num_list"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 5
                echo \layout::func_from_text("            ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 6
                    echo \layout::func_from_text("                <li><a href=\"#\" onclick=\"get_project_panel_page(1);return false;\">1</a></li>
                ");
                    // line 7
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li></li>");
                    }
                    // line 8
                    echo \layout::func_from_text("            ");
                }
                // line 9
                echo \layout::func_from_text("
            ");
                // line 10
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "current_page"))) {
                    // line 11
                    echo \layout::func_from_text("                <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
            ");
                } else {
                    // line 13
                    echo \layout::func_from_text("                <li><a href=\"#\" onclick=\"get_project_panel_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
            ");
                }
                // line 15
                echo \layout::func_from_text("
            ");
                // line 16
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages")))) {
                    // line 17
                    echo \layout::func_from_text("                ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 18
                    echo \layout::func_from_text("                <li><a href=\"#\" onclick=\"get_project_panel_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("</a></li>
            ");
                }
                // line 20
                echo \layout::func_from_text("        ");
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo \layout::func_from_text("    </ul>
</div>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/jpaginator_project_panel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 21,  92 => 20,  84 => 18,  79 => 17,  77 => 16,  74 => 15,  60 => 11,  58 => 10,  48 => 7,  25 => 4,  21 => 2,  55 => 9,  33 => 4,  26 => 3,  22 => 2,  190 => 54,  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 39,  127 => 34,  125 => 33,  112 => 29,  104 => 27,  102 => 26,  99 => 25,  86 => 21,  81 => 20,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 16,  198 => 15,  193 => 4,  188 => 119,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 108,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 46,  82 => 45,  66 => 13,  64 => 31,  47 => 17,  45 => 6,  24 => 1,  75 => 17,  70 => 18,  68 => 17,  63 => 14,  61 => 13,  54 => 22,  34 => 3,  51 => 9,  44 => 6,  41 => 14,  38 => 13,  31 => 11,  28 => 3,  121 => 31,  118 => 47,  107 => 39,  103 => 37,  97 => 24,  95 => 50,  91 => 22,  87 => 32,  80 => 44,  76 => 19,  67 => 17,  65 => 18,  62 => 17,  56 => 25,  52 => 8,  49 => 16,  42 => 5,  39 => 5,  32 => 4,  29 => 4,);
    }
}
