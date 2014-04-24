<?php

/* /core/dev_panel/queries.html */
class __TwigTemplate_4b5d93b9c01809972fd272ae71c32028ffebc389ae47d52c8a0a8ed0d2ed5152 extends Twig_Template
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
        return array (  87 => 10,  50 => 6,  24 => 3,  144 => 61,  129 => 57,  108 => 53,  95 => 45,  71 => 33,  26 => 6,  73 => 15,  70 => 9,  67 => 32,  27 => 6,  233 => 67,  224 => 63,  217 => 60,  214 => 59,  203 => 58,  201 => 57,  198 => 56,  192 => 53,  182 => 52,  179 => 51,  177 => 50,  170 => 46,  155 => 45,  149 => 44,  146 => 43,  143 => 20,  137 => 40,  135 => 39,  131 => 37,  123 => 34,  119 => 33,  114 => 32,  110 => 30,  105 => 28,  102 => 27,  94 => 11,  86 => 23,  68 => 20,  62 => 19,  53 => 18,  33 => 9,  21 => 2,  140 => 41,  136 => 36,  133 => 58,  127 => 35,  125 => 32,  115 => 14,  112 => 13,  107 => 25,  80 => 22,  41 => 4,  34 => 14,  19 => 1,  103 => 36,  99 => 47,  96 => 29,  89 => 20,  84 => 37,  79 => 35,  77 => 38,  74 => 21,  72 => 19,  65 => 34,  60 => 11,  58 => 28,  44 => 5,  28 => 4,  23 => 3,  40 => 8,  38 => 12,  32 => 3,  29 => 7,  147 => 62,  138 => 17,  130 => 43,  124 => 42,  121 => 26,  116 => 56,  101 => 48,  98 => 12,  92 => 21,  81 => 18,  75 => 34,  69 => 35,  63 => 7,  57 => 10,  51 => 11,  48 => 17,  42 => 13,  39 => 12,  36 => 5,  30 => 3,);
    }
}
