<?php

/* /source/paginator.html */
class __TwigTemplate_e506c0fa4114b7cd6d96b924183563451f3952af3edaa375e81d7e00fa453816 extends Twig_Template
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
                    echo \layout::func_from_text("        <li><a href=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "url", array(0 => 1), "method"), "html", null, true));
                    echo \layout::func_from_text("\">1</a>
            ");
                    // line 7
                    if (((isset($context["i"]) ? $context["i"] : null) > 2)) {
                        echo \layout::func_from_text("<span>&nbsp;...</span>");
                    }
                    // line 8
                    echo \layout::func_from_text("        </li>
        ");
                }
                // line 10
                echo \layout::func_from_text("
        ");
                // line 11
                if (((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "current_page"))) {
                    // line 12
                    echo \layout::func_from_text("        <li class=\"active\"><a href=\"\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
        ");
                } else {
                    // line 14
                    echo \layout::func_from_text("        <li><a href=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "url", array(0 => (isset($context["i"]) ? $context["i"] : null)), "method"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                    echo \layout::func_from_text("</a></li>
        ");
                }
                // line 16
                echo \layout::func_from_text("
        ");
                // line 17
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && ((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages")))) {
                    // line 18
                    echo \layout::func_from_text("        ");
                    if (((isset($context["i"]) ? $context["i"] : null) < ($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages") - 1))) {
                        echo \layout::func_from_text("<li><a href=\"\" onclick=\"return false;\">...</a></li>");
                    }
                    // line 19
                    echo \layout::func_from_text("        <li><a href=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "url", array(0 => $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages")), "method"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "get_pages"), "html", null, true));
                    echo \layout::func_from_text("</a></li>
        ");
                }
                // line 21
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
            // line 22
            echo \layout::func_from_text("    </ul>
</div>
");
        }
    }

    public function getTemplateName()
    {
        return "/source/paginator.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 22,  95 => 21,  87 => 19,  82 => 18,  80 => 17,  77 => 16,  58 => 10,  54 => 8,  45 => 6,  42 => 5,  25 => 4,  21 => 2,  19 => 1,  255 => 86,  246 => 80,  242 => 78,  240 => 77,  235 => 74,  221 => 73,  215 => 69,  213 => 68,  207 => 64,  201 => 62,  198 => 61,  192 => 59,  190 => 58,  184 => 55,  174 => 50,  170 => 48,  166 => 46,  162 => 44,  160 => 43,  154 => 42,  149 => 41,  141 => 40,  133 => 35,  125 => 32,  121 => 30,  104 => 29,  100 => 27,  96 => 25,  94 => 24,  90 => 22,  88 => 21,  72 => 20,  69 => 14,  63 => 12,  61 => 11,  59 => 15,  56 => 14,  50 => 7,  46 => 10,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
