<?php

/* /applications/projects/layouts/jpaginator_project_panel.html */
class __TwigTemplate_5992e3c7ea145ba3d3eab3125af8c84644a74096c5df8f7d41dfd88ec4008dd9 extends Twig_Template
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
            echo \layout::func_from_text("    <table style=\"width: 100%;\">
        <tr>
            <td style=\"white-space: nowrap;text-align: right;\">
                <ul class=\"pagination\" style=\"margin: 0px;margin-top: 15px;\">
                    ");
            // line 6
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
                // line 7
                echo \layout::func_from_text("                        ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 8
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_project_panel_page(1);return false;\">1</a></li>
                            ");
                    // line 9
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li></li>");
                    }
                    // line 10
                    echo \layout::func_from_text("                        ");
                }
                // line 11
                echo \layout::func_from_text("
                        ");
                // line 12
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "current_page"))) {
                    // line 13
                    echo \layout::func_from_text("                            <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                } else {
                    // line 15
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_project_panel_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                }
                // line 17
                echo \layout::func_from_text("
                        ");
                // line 18
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages")))) {
                    // line 19
                    echo \layout::func_from_text("                            ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 20
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_project_panel_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["projects"]) ? $context["projects"] : null), "paginator"), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                }
                // line 22
                echo \layout::func_from_text("                    ");
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
            // line 23
            echo \layout::func_from_text("                </ul>
            </td>
        </tr>
    </table>
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
        return array (  94 => 22,  86 => 20,  79 => 18,  62 => 13,  57 => 11,  54 => 10,  21 => 2,  60 => 12,  56 => 8,  38 => 4,  27 => 6,  75 => 8,  48 => 6,  30 => 5,  24 => 3,  22 => 2,  19 => 1,  102 => 37,  98 => 31,  95 => 30,  91 => 17,  88 => 16,  78 => 9,  76 => 17,  73 => 38,  68 => 15,  66 => 35,  61 => 7,  59 => 30,  45 => 18,  43 => 16,  23 => 1,  139 => 54,  130 => 55,  128 => 54,  117 => 46,  108 => 23,  100 => 39,  92 => 37,  90 => 36,  83 => 4,  81 => 19,  74 => 27,  71 => 37,  49 => 6,  44 => 7,  41 => 5,  34 => 3,  53 => 14,  50 => 9,  47 => 8,  39 => 8,  36 => 7,  31 => 2,  28 => 4,);
    }
}
