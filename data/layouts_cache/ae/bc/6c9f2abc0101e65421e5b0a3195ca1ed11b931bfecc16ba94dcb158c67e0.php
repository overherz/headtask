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
        echo \layout::func_from_text("<ul class=\"breadcrumb\">
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
                    echo \layout::func_from_text("<li class=\"active\">");
                    echo \layout::func_from_text($this->getAttribute((isset($context["cr"]) ? $context["cr"] : null), "name"));
                    echo \layout::func_from_text("</li>");
                }
                echo \layout::func_from_text(" ");
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    echo \layout::func_from_text("<span class=\"fa fa-angle-double-right\" style=\"margin: 0 5px;\"></span>");
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
        return array (  82 => 9,  79 => 8,  65 => 7,  48 => 6,  30 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}