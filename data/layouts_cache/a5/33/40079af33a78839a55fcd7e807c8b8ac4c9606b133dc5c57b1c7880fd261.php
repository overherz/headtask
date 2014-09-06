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
        return array (  108 => 23,  57 => 11,  50 => 9,  27 => 6,  187 => 37,  148 => 29,  135 => 27,  129 => 26,  83 => 15,  98 => 23,  93 => 22,  72 => 15,  69 => 14,  36 => 4,  119 => 25,  116 => 15,  94 => 22,  43 => 4,  40 => 3,  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 34,  145 => 28,  137 => 28,  130 => 24,  120 => 26,  109 => 21,  100 => 18,  88 => 17,  59 => 9,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 25,  92 => 17,  84 => 10,  79 => 18,  77 => 19,  74 => 16,  60 => 12,  58 => 10,  48 => 6,  25 => 4,  21 => 2,  55 => 8,  33 => 4,  26 => 6,  22 => 2,  190 => 38,  184 => 53,  181 => 34,  176 => 36,  155 => 29,  151 => 30,  146 => 44,  143 => 43,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 22,  104 => 19,  102 => 26,  99 => 13,  86 => 20,  81 => 19,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 35,  165 => 110,  162 => 109,  160 => 31,  156 => 33,  113 => 65,  111 => 64,  89 => 47,  85 => 16,  82 => 45,  66 => 13,  64 => 31,  47 => 8,  45 => 7,  24 => 2,  75 => 8,  70 => 13,  68 => 15,  63 => 10,  61 => 5,  54 => 10,  34 => 3,  51 => 9,  44 => 7,  41 => 14,  38 => 9,  31 => 11,  28 => 7,  121 => 31,  118 => 47,  107 => 22,  103 => 21,  97 => 20,  95 => 50,  91 => 18,  87 => 32,  80 => 18,  76 => 17,  67 => 17,  65 => 6,  62 => 13,  56 => 10,  52 => 8,  49 => 16,  42 => 6,  39 => 5,  32 => 5,  29 => 4,);
    }
}
