<?php

/* /source/jpaginator_boot.html */
class __TwigTemplate_0d64cc92737e2076f97cca928b850e10 extends Twig_Template
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
            echo \layout::func_from_text("<div class=\"pagination\" style=\"text-align: center;\">
    <ul>
        ");
            // line 4
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
                // line 5
                echo \layout::func_from_text("        ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 6
                    echo \layout::func_from_text("        <li><a href=\"#\" onclick=\"get_page(1);return false;\">1</a></li>
        ");
                    // line 7
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li></li>");
                    }
                    // line 8
                    echo \layout::func_from_text("        ");
                }
                // line 9
                echo \layout::func_from_text("
        ");
                // line 10
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "current_page"))) {
                    // line 11
                    echo \layout::func_from_text("        <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
        ");
                } else {
                    // line 13
                    echo \layout::func_from_text("        <li><a href=\"#\" onclick=\"get_page('");
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
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages")))) {
                    // line 17
                    echo \layout::func_from_text("        ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 18
                    echo \layout::func_from_text("        <li><a href=\"#\" onclick=\"get_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
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
        return "/source/jpaginator_boot.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 21,  84 => 18,  79 => 17,  77 => 16,  66 => 13,  25 => 4,  208 => 58,  206 => 57,  203 => 56,  194 => 52,  174 => 49,  169 => 47,  151 => 41,  137 => 40,  124 => 38,  118 => 36,  115 => 35,  113 => 34,  105 => 30,  101 => 29,  92 => 20,  83 => 23,  80 => 22,  72 => 20,  67 => 19,  54 => 16,  34 => 13,  21 => 2,  91 => 22,  85 => 21,  56 => 19,  53 => 18,  49 => 17,  45 => 6,  39 => 14,  33 => 10,  27 => 7,  19 => 1,  159 => 46,  155 => 44,  152 => 43,  148 => 30,  145 => 29,  140 => 4,  135 => 53,  133 => 52,  128 => 50,  125 => 49,  121 => 37,  116 => 45,  114 => 43,  97 => 28,  76 => 21,  70 => 22,  64 => 21,  58 => 10,  44 => 16,  42 => 5,  28 => 4,  23 => 1,  48 => 7,  38 => 7,  32 => 3,  29 => 8,  153 => 52,  144 => 48,  136 => 45,  130 => 51,  127 => 39,  122 => 42,  112 => 34,  109 => 32,  100 => 31,  94 => 28,  88 => 25,  82 => 24,  74 => 15,  68 => 22,  63 => 19,  60 => 11,  55 => 9,  52 => 8,  40 => 8,  37 => 12,  31 => 3,);
    }
}
