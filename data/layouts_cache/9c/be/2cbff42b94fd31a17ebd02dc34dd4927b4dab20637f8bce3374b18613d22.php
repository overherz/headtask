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
        return array (  106 => 21,  92 => 20,  84 => 18,  79 => 17,  77 => 16,  74 => 15,  66 => 13,  60 => 11,  58 => 10,  55 => 9,  52 => 8,  48 => 7,  45 => 6,  42 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
