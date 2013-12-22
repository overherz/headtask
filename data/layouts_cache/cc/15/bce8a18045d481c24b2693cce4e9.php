<?php

/* /source/crumbs.html */
class __TwigTemplate_cc15bce8a18045d481c24b2693cce4e9 extends Twig_Template
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
        echo \layout::func_from_text("<ul class=\"breadcrumb\">
    ");
        // line 2
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "crumbs"), "name")) {
            // line 3
            echo \layout::func_from_text("    <li>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "crumbs"), "name"), "html", null, true));
            echo \layout::func_from_text("</li>
    ");
        } else {
            // line 5
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "crumbs"));
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
            foreach ($context['_seq'] as $context["k"] => $context["cr"]) {
                // line 6
                echo \layout::func_from_text("    ");
                if (((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) && $this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "url"))) {
                    echo \layout::func_from_text("<li><a href=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "url"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</a></li>");
                } else {
                    echo \layout::func_from_text("<li class=\"active\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</li>");
                }
                echo \layout::func_from_text(" ");
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    echo \layout::func_from_text("<span class=\"icon-double-angle-right\" style=\"margin: 0 5px;\"></span>");
                }
                // line 7
                echo \layout::func_from_text("    ");
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
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['cr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo \layout::func_from_text("    ");
        }
        // line 9
        echo \layout::func_from_text("</ul>");
    }

    public function getTemplateName()
    {
        return "/source/crumbs.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 7,  24 => 3,  22 => 2,  80 => 13,  92 => 20,  66 => 13,  60 => 11,  58 => 10,  55 => 9,  52 => 8,  48 => 6,  42 => 5,  25 => 4,  21 => 2,  79 => 8,  76 => 11,  57 => 6,  35 => 5,  23 => 3,  19 => 1,  148 => 49,  139 => 50,  137 => 49,  130 => 44,  127 => 43,  121 => 40,  110 => 35,  102 => 33,  100 => 32,  91 => 25,  88 => 24,  82 => 9,  71 => 16,  61 => 13,  44 => 6,  34 => 3,  77 => 16,  74 => 15,  69 => 9,  43 => 8,  40 => 7,  33 => 4,  30 => 5,  242 => 86,  238 => 84,  234 => 82,  230 => 80,  220 => 78,  216 => 77,  213 => 76,  209 => 75,  206 => 74,  204 => 73,  201 => 72,  199 => 71,  195 => 69,  186 => 65,  180 => 64,  174 => 63,  169 => 60,  167 => 59,  159 => 56,  154 => 53,  145 => 49,  140 => 46,  138 => 45,  134 => 43,  125 => 42,  120 => 39,  111 => 35,  106 => 21,  104 => 31,  96 => 28,  90 => 27,  84 => 18,  78 => 25,  72 => 23,  63 => 14,  59 => 16,  54 => 10,  51 => 9,  45 => 6,  41 => 5,  38 => 7,  31 => 2,  28 => 4,);
    }
}
