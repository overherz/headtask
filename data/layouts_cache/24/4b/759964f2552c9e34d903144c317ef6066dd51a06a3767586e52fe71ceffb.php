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
        return array (  138 => 17,  87 => 10,  145 => 60,  142 => 59,  131 => 56,  114 => 54,  82 => 35,  73 => 32,  65 => 30,  39 => 11,  37 => 10,  108 => 23,  94 => 11,  57 => 11,  50 => 6,  27 => 6,  120 => 26,  98 => 12,  93 => 43,  88 => 20,  80 => 18,  72 => 15,  59 => 11,  56 => 26,  28 => 7,  26 => 6,  78 => 9,  30 => 5,  22 => 2,  92 => 20,  84 => 18,  77 => 33,  74 => 16,  66 => 13,  58 => 10,  52 => 8,  48 => 6,  45 => 6,  25 => 5,  21 => 2,  184 => 53,  181 => 52,  176 => 49,  155 => 47,  151 => 46,  146 => 44,  143 => 20,  140 => 42,  134 => 39,  127 => 55,  125 => 33,  121 => 31,  112 => 13,  104 => 27,  99 => 46,  91 => 21,  86 => 20,  76 => 17,  67 => 17,  49 => 16,  38 => 9,  35 => 12,  19 => 1,  237 => 111,  232 => 31,  228 => 24,  225 => 23,  222 => 22,  218 => 16,  215 => 15,  210 => 4,  205 => 113,  203 => 111,  200 => 110,  194 => 107,  190 => 54,  186 => 105,  182 => 104,  179 => 103,  177 => 102,  173 => 100,  130 => 59,  128 => 58,  118 => 51,  115 => 14,  110 => 53,  106 => 51,  102 => 26,  97 => 45,  95 => 44,  81 => 19,  79 => 18,  71 => 18,  69 => 31,  62 => 13,  60 => 12,  55 => 9,  47 => 8,  42 => 5,  29 => 4,  24 => 3,  75 => 8,  70 => 9,  68 => 15,  63 => 7,  61 => 29,  54 => 10,  51 => 12,  44 => 5,  41 => 4,  34 => 3,  31 => 11,);
    }
}
