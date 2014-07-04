<?php

/* /core/dev_panel/queries.html */
class __TwigTemplate_244b759964f2552c9e34d903144c317ef6066dd51a06a3767586e52fe71ceffb extends Twig_Template
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
        if ((isset($context["queries"]) ? $context["queries"] : null)) {
            // line 2
            echo \layout::func_from_text("<table style='width:100%;' cellspacing='0' cellpadding='0'>
");
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["queries"]) ? $context["queries"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["qu"]) {
                // line 4
                echo \layout::func_from_text("<tr>
    <td style='width:1px;white-space:nowrap !important;");
                // line 5
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2) == 0)) {
                    echo \layout::func_from_text("background:#fff;");
                }
                echo \layout::func_from_text("' valign='top'>
        <b ");
                // line 6
                if (($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "time") > 10)) {
                    echo \layout::func_from_text("class='dev_panel_red'");
                }
                echo \layout::func_from_text(">");
                if (($this->getAttribute($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "error"), 2) != "")) {
                    echo \layout::func_from_text("<div style='color:red;'>Error</div>");
                } else {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "time"), "html", null, true));
                    echo \layout::func_from_text("&nbsp;<span style=\"color:#555;padding-right:5px; \">мс</span>");
                }
                echo \layout::func_from_text("</b></td>
    <td ");
                // line 7
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2) == 0)) {
                    echo \layout::func_from_text("style='background:#fff;'");
                }
                echo \layout::func_from_text(">
    <div class=\"backtrace\">
        ");
                // line 9
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "trace"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                    // line 10
                    echo \layout::func_from_text("            ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "file"), "html", null, true));
                    echo \layout::func_from_text(" (");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "line"), "html", null, true));
                    echo \layout::func_from_text(")
            ");
                    // line 11
                    if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                        echo \layout::func_from_text(" &larr; ");
                    }
                    // line 12
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo \layout::func_from_text("    </div>
    <div style=\"clear: both;\">");
                // line 14
                echo \layout::func_from_text($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "query"));
                if (($this->getAttribute($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "error"), 2) != "")) {
                    echo \layout::func_from_text(" <div style='color:red;'>");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["qu"]) ? $context["qu"] : null), "error"), 2), "html", null, true));
                    echo \layout::func_from_text("</div>");
                }
                echo \layout::func_from_text("</div>
    </td>
</tr>
");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo \layout::func_from_text("    
    </table>
");
        } else {
            // line 20
            echo \layout::func_from_text("<b>Запросы отсутствуют</b>
");
        }
    }

    public function getTemplateName()
    {
        return "/core/dev_panel/queries.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 20,  138 => 17,  115 => 14,  98 => 12,  94 => 11,  87 => 10,  70 => 9,  50 => 6,  44 => 5,  24 => 3,  21 => 2,  147 => 62,  144 => 61,  133 => 58,  129 => 57,  116 => 56,  112 => 13,  108 => 53,  101 => 48,  99 => 47,  95 => 45,  84 => 37,  79 => 35,  75 => 34,  71 => 33,  67 => 32,  63 => 7,  58 => 28,  41 => 4,  39 => 12,  26 => 6,  47 => 27,  19 => 1,);
    }
}
