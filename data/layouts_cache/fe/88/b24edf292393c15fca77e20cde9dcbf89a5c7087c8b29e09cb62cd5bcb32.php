<?php

/* /source/jpaginator_boot.html */
class __TwigTemplate_fe88b24edf292393c15fca77e20cde9dcbf89a5c7087c8b29e09cb62cd5bcb32 extends Twig_Template
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
        if ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "num_list")) {
            // line 2
            echo \layout::func_from_text("    <table style=\"width: 100%;\">
        <tr>
            <td style=\"white-space: nowrap;text-align: right;\">
                <ul class=\"pagination\" style=\"margin: 0px;margin-top: 15px;\">
                    ");
            // line 6
            if ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "total")) {
                // line 7
                echo \layout::func_from_text("                        <li class=\"disabled pagination_disabled\"><a href=\"\" onclick=\"return false;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "from"), "html", null, true));
                echo \layout::func_from_text(" - ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "to"), "html", null, true));
                echo \layout::func_from_text(" <b>из ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "total"), "html", null, true));
                echo \layout::func_from_text("</b></a></li>
                    ");
            }
            // line 9
            echo \layout::func_from_text("                    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "num_list"));
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
                // line 10
                echo \layout::func_from_text("                        ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 11
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page(1);return false;\">1</a></li>
                            ");
                    // line 12
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li></li>");
                    }
                    // line 13
                    echo \layout::func_from_text("                        ");
                }
                // line 14
                echo \layout::func_from_text("
                        ");
                // line 15
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "current_page"))) {
                    // line 16
                    echo \layout::func_from_text("                            <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                } else {
                    // line 18
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                }
                // line 20
                echo \layout::func_from_text("
                        ");
                // line 21
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages")))) {
                    // line 22
                    echo \layout::func_from_text("                            ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 23
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                }
                // line 25
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
            // line 26
            echo \layout::func_from_text("                </ul>
            </td>
        </tr>
    </table>
");
        }
    }

    public function getTemplateName()
    {
        return "/source/jpaginator_boot.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 23,  92 => 21,  89 => 20,  81 => 18,  73 => 15,  67 => 13,  57 => 10,  39 => 9,  27 => 6,  214 => 64,  212 => 63,  208 => 61,  199 => 57,  179 => 54,  174 => 52,  164 => 51,  156 => 46,  141 => 45,  135 => 44,  132 => 43,  129 => 42,  126 => 41,  123 => 40,  117 => 37,  113 => 35,  105 => 33,  96 => 30,  91 => 28,  43 => 18,  21 => 2,  140 => 38,  125 => 32,  121 => 26,  115 => 29,  107 => 25,  84 => 26,  80 => 25,  75 => 16,  72 => 19,  41 => 16,  34 => 14,  19 => 1,  176 => 67,  172 => 61,  169 => 60,  165 => 30,  162 => 29,  157 => 4,  152 => 70,  150 => 69,  147 => 68,  145 => 67,  142 => 66,  138 => 65,  133 => 35,  131 => 60,  97 => 29,  76 => 23,  70 => 14,  64 => 21,  58 => 20,  44 => 17,  42 => 15,  28 => 4,  23 => 1,  48 => 18,  38 => 17,  32 => 3,  29 => 7,  153 => 52,  144 => 48,  136 => 36,  130 => 44,  127 => 33,  122 => 42,  112 => 28,  109 => 34,  100 => 32,  94 => 22,  88 => 27,  82 => 24,  74 => 23,  68 => 22,  63 => 12,  60 => 11,  55 => 15,  52 => 19,  40 => 8,  37 => 5,  31 => 3,);
    }
}
