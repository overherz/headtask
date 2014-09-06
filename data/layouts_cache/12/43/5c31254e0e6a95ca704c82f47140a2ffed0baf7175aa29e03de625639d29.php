<?php

/* /source/jpaginator_boot.html */
class __TwigTemplate_12435c31254e0e6a95ca704c82f47140a2ffed0baf7175aa29e03de625639d29 extends Twig_Template
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
        echo \layout::func_from_text("
    <table style=\"width: 100%;margin-bottom: 0;\">
        <tr>
            <td style=\"white-space: nowrap;text-align: right;padding: 0;line-height: 0;\">
                <ul class=\"pagination\" style=\"margin: 0;\">
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
        return array (  98 => 23,  93 => 22,  72 => 15,  69 => 14,  36 => 14,  119 => 16,  116 => 15,  94 => 12,  43 => 4,  40 => 3,  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 30,  145 => 28,  137 => 27,  130 => 24,  120 => 26,  109 => 21,  100 => 18,  88 => 20,  59 => 11,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 25,  92 => 17,  84 => 10,  79 => 17,  77 => 19,  74 => 16,  60 => 17,  58 => 10,  48 => 6,  25 => 4,  21 => 1,  55 => 9,  33 => 4,  26 => 6,  22 => 2,  190 => 54,  184 => 53,  181 => 34,  176 => 49,  155 => 29,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 22,  104 => 19,  102 => 26,  99 => 13,  86 => 21,  81 => 21,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 31,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 23,  82 => 45,  66 => 13,  64 => 31,  47 => 17,  45 => 8,  24 => 3,  75 => 8,  70 => 13,  68 => 17,  63 => 14,  61 => 5,  54 => 22,  34 => 2,  51 => 9,  44 => 6,  41 => 14,  38 => 9,  31 => 11,  28 => 7,  121 => 31,  118 => 47,  107 => 20,  103 => 37,  97 => 24,  95 => 50,  91 => 21,  87 => 32,  80 => 18,  76 => 19,  67 => 17,  65 => 6,  62 => 12,  56 => 10,  52 => 8,  49 => 16,  42 => 5,  39 => 5,  32 => 5,  29 => 4,);
    }
}
