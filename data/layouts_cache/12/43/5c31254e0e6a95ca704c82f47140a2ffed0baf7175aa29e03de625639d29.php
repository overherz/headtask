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
        return array (  120 => 26,  106 => 25,  98 => 23,  93 => 22,  91 => 21,  88 => 20,  80 => 18,  74 => 16,  72 => 15,  69 => 14,  66 => 13,  62 => 12,  59 => 11,  56 => 10,  38 => 9,  28 => 7,  26 => 6,  19 => 1,);
    }
}
