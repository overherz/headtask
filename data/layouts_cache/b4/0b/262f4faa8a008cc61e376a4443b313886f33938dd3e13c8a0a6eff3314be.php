<?php

/* /source/admin/jpaginator_boot.html */
class __TwigTemplate_b40b262f4faa8a008cc61e376a4443b313886f33938dd3e13c8a0a6eff3314be extends Twig_Template
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
            echo \layout::func_from_text("<table style=\"width: 100%;\">
    <tr>
        ");
            // line 4
            if ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "total")) {
                // line 5
                echo \layout::func_from_text("            <td>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "from"), "html", null, true));
                echo \layout::func_from_text(" - ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "to"), "html", null, true));
                echo \layout::func_from_text(" <b>из ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "total"), "html", null, true));
                echo \layout::func_from_text("</b></td>
        ");
            }
            // line 7
            echo \layout::func_from_text("        <td style=\"white-space: nowrap;text-align: right;\">
            <ul class=\"pagination\" style=\"margin: 0px;margin-top: 15px;\">
                ");
            // line 9
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
                echo \layout::func_from_text("                    ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first") && ((isset($context["i"]) ? $context["i"] : null) != 1))) {
                    // line 11
                    echo \layout::func_from_text("                        <li><a href=\"#\" onclick=\"get_page(1);return false;\">1</a></li>
                        ");
                    // line 12
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li></li>");
                    }
                    // line 13
                    echo \layout::func_from_text("                    ");
                }
                // line 14
                echo \layout::func_from_text("
                    ");
                // line 15
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "current_page"))) {
                    // line 16
                    echo \layout::func_from_text("                        <li class=\"active\"><a href=\"\" onclick=\"return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                    ");
                } else {
                    // line 18
                    echo \layout::func_from_text("                        <li><a href=\"#\" onclick=\"get_page('");
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
                    echo \layout::func_from_text("                        ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 23
                    echo \layout::func_from_text("                        <li><a href=\"#\" onclick=\"get_page('");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("');return false;\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("</a></li>
                    ");
                }
                // line 25
                echo \layout::func_from_text("                ");
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
            echo \layout::func_from_text("            </ul>
        </td>
    </tr>
</table>
");
        }
    }

    public function getTemplateName()
    {
        return "/source/admin/jpaginator_boot.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 25,  100 => 23,  93 => 21,  82 => 18,  76 => 16,  64 => 12,  61 => 11,  58 => 10,  41 => 9,  37 => 7,  27 => 5,  25 => 4,  75 => 18,  52 => 14,  34 => 13,  21 => 2,  19 => 1,  525 => 345,  520 => 288,  515 => 17,  505 => 346,  503 => 345,  445 => 289,  443 => 288,  435 => 282,  416 => 279,  409 => 278,  405 => 277,  237 => 111,  231 => 110,  224 => 106,  216 => 105,  212 => 104,  205 => 103,  202 => 102,  199 => 101,  196 => 100,  192 => 98,  190 => 97,  179 => 95,  176 => 94,  173 => 93,  168 => 91,  163 => 89,  155 => 88,  151 => 87,  148 => 86,  145 => 85,  142 => 84,  139 => 83,  135 => 82,  130 => 79,  124 => 78,  119 => 77,  114 => 76,  112 => 75,  72 => 40,  68 => 13,  55 => 15,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 26,  118 => 28,  99 => 26,  95 => 22,  90 => 20,  88 => 23,  83 => 22,  79 => 21,  74 => 15,  71 => 14,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 17,  35 => 3,  32 => 2,);
    }
}