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
        return array (  48 => 6,  24 => 3,  22 => 2,  19 => 1,  111 => 39,  109 => 38,  97 => 29,  88 => 24,  80 => 22,  70 => 19,  61 => 7,  44 => 6,  34 => 3,  82 => 25,  75 => 8,  72 => 20,  43 => 8,  40 => 7,  33 => 4,  30 => 5,  272 => 98,  268 => 96,  264 => 94,  260 => 92,  250 => 90,  246 => 89,  243 => 88,  239 => 87,  236 => 86,  234 => 85,  231 => 84,  229 => 83,  225 => 81,  216 => 77,  210 => 76,  204 => 75,  199 => 72,  197 => 71,  189 => 68,  184 => 65,  175 => 61,  170 => 58,  168 => 57,  164 => 55,  155 => 54,  150 => 51,  141 => 47,  136 => 44,  134 => 43,  126 => 40,  120 => 38,  114 => 38,  108 => 37,  102 => 36,  93 => 29,  89 => 28,  83 => 24,  78 => 9,  69 => 22,  63 => 14,  56 => 14,  54 => 10,  51 => 9,  45 => 9,  41 => 5,  38 => 7,  31 => 2,  28 => 3,);
    }
}
