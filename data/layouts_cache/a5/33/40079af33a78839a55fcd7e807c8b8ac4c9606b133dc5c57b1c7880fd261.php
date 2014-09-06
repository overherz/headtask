<?php

/* /source/jpaginator_boot_if.html */
class __TwigTemplate_a53340079af33a78839a55fcd7e807c8b8ac4c9606b133dc5c57b1c7880fd261 extends Twig_Template
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
            echo \layout::func_from_text("    <table style=\"width: 100%;margin-bottom: 0;\">
        <tr>
            <td style=\"white-space: nowrap;text-align: right;padding: 0;line-height: 0;\">
                <ul class=\"pagination\" style=\"margin: 0;\">
                    ");
            // line 6
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
                // line 7
                echo \layout::func_from_text("                        ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 8
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page(1);return false;\">1</a></li>
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
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "current_page"))) {
                    // line 13
                    echo \layout::func_from_text("                            <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                        ");
                } else {
                    // line 15
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page('");
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
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages")))) {
                    // line 19
                    echo \layout::func_from_text("                            ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 20
                    echo \layout::func_from_text("                            <li><a href=\"#\" onclick=\"get_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
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
        return "/source/jpaginator_boot_if.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 23,  94 => 22,  57 => 11,  50 => 9,  27 => 6,  120 => 26,  98 => 23,  93 => 22,  88 => 20,  80 => 18,  72 => 15,  59 => 11,  56 => 10,  28 => 7,  26 => 6,  78 => 9,  30 => 5,  22 => 2,  92 => 20,  84 => 18,  77 => 16,  74 => 16,  66 => 13,  58 => 10,  52 => 8,  48 => 6,  45 => 6,  25 => 4,  21 => 2,  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 39,  127 => 34,  125 => 33,  121 => 31,  112 => 29,  104 => 27,  99 => 25,  91 => 21,  86 => 20,  76 => 17,  67 => 17,  49 => 16,  38 => 9,  35 => 12,  19 => 1,  237 => 111,  232 => 31,  228 => 24,  225 => 23,  222 => 22,  218 => 16,  215 => 15,  210 => 4,  205 => 113,  203 => 111,  200 => 110,  194 => 107,  190 => 54,  186 => 105,  182 => 104,  179 => 103,  177 => 102,  173 => 100,  130 => 59,  128 => 58,  118 => 51,  115 => 50,  110 => 48,  106 => 25,  102 => 26,  97 => 24,  95 => 44,  81 => 19,  79 => 18,  71 => 18,  69 => 14,  62 => 13,  60 => 12,  55 => 9,  47 => 8,  42 => 5,  29 => 4,  24 => 3,  75 => 8,  70 => 18,  68 => 15,  63 => 14,  61 => 7,  54 => 10,  51 => 12,  44 => 7,  41 => 14,  34 => 3,  31 => 11,);
    }
}
