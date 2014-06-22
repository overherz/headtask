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
        return array (  107 => 25,  99 => 23,  94 => 22,  89 => 20,  81 => 18,  75 => 16,  67 => 13,  63 => 12,  60 => 11,  57 => 10,  27 => 6,  193 => 53,  184 => 49,  177 => 46,  174 => 45,  163 => 44,  161 => 43,  154 => 42,  142 => 39,  139 => 38,  137 => 37,  120 => 32,  114 => 31,  111 => 30,  108 => 29,  105 => 28,  100 => 26,  97 => 25,  80 => 20,  62 => 18,  56 => 17,  46 => 15,  33 => 9,  21 => 2,  19 => 1,  102 => 27,  95 => 30,  91 => 24,  88 => 23,  83 => 4,  78 => 40,  73 => 15,  71 => 37,  68 => 36,  66 => 35,  61 => 32,  59 => 30,  45 => 18,  43 => 16,  28 => 4,  23 => 1,  40 => 11,  38 => 7,  32 => 3,  29 => 7,  147 => 50,  138 => 46,  130 => 43,  124 => 33,  121 => 26,  116 => 40,  101 => 27,  98 => 31,  92 => 21,  82 => 21,  76 => 39,  70 => 14,  64 => 17,  58 => 16,  51 => 16,  48 => 7,  42 => 7,  39 => 9,  36 => 10,  30 => 3,);
    }
}
