<?php

/* /source/crumbs.html */
class __TwigTemplate_aebc6c9f2abc0101e65421e5b0a3195ca1ed11b931bfecc16ba94dcb158c67e0 extends Twig_Template
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
        echo \layout::func_from_text("<ul class=\"breadcrumbs-one\">
    ");
        // line 2
        if ($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "crumbs"), "name")) {
            // line 3
            echo \layout::func_from_text("    <li>");
            echo \layout::func_from_text($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "crumbs"), "name"));
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
                    echo \layout::func_from_text($this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "name"));
                    echo \layout::func_from_text("</a></li>");
                } else {
                    echo \layout::func_from_text("<li><a class=\"current\">");
                    echo \layout::func_from_text($this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "name"));
                    echo \layout::func_from_text("</a></li>");
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
        return array (  78 => 9,  75 => 8,  61 => 7,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  576 => 251,  565 => 242,  546 => 241,  529 => 240,  520 => 236,  506 => 225,  497 => 221,  465 => 191,  463 => 190,  447 => 179,  439 => 176,  430 => 172,  422 => 169,  412 => 164,  404 => 161,  395 => 157,  387 => 154,  379 => 151,  371 => 148,  362 => 144,  354 => 141,  346 => 138,  336 => 133,  328 => 130,  320 => 127,  311 => 123,  303 => 120,  295 => 117,  287 => 114,  278 => 110,  269 => 106,  260 => 102,  251 => 98,  243 => 95,  235 => 92,  226 => 88,  218 => 85,  209 => 81,  199 => 76,  190 => 72,  181 => 68,  173 => 65,  165 => 62,  157 => 59,  149 => 56,  142 => 51,  134 => 48,  124 => 46,  114 => 44,  112 => 43,  105 => 41,  102 => 40,  98 => 39,  92 => 36,  83 => 30,  74 => 24,  67 => 20,  58 => 13,  56 => 12,  53 => 11,  47 => 8,  44 => 7,  41 => 6,  33 => 3,  30 => 5,);
    }
}
