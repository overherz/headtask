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
        return array (  138 => 17,  115 => 14,  147 => 62,  144 => 61,  133 => 58,  101 => 48,  108 => 53,  57 => 11,  50 => 6,  27 => 6,  187 => 37,  148 => 29,  135 => 27,  129 => 57,  83 => 15,  98 => 12,  93 => 22,  72 => 15,  69 => 14,  36 => 4,  119 => 25,  116 => 56,  94 => 11,  43 => 4,  40 => 3,  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 34,  145 => 28,  137 => 28,  130 => 24,  120 => 26,  109 => 21,  100 => 18,  88 => 17,  59 => 9,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 25,  92 => 17,  84 => 37,  79 => 35,  77 => 19,  74 => 16,  60 => 12,  58 => 28,  48 => 6,  25 => 4,  21 => 2,  55 => 8,  33 => 4,  26 => 6,  22 => 2,  190 => 38,  184 => 53,  181 => 34,  176 => 36,  155 => 29,  151 => 30,  146 => 44,  143 => 20,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 13,  104 => 19,  102 => 26,  99 => 47,  86 => 20,  81 => 19,  71 => 33,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 35,  165 => 110,  162 => 109,  160 => 31,  156 => 33,  113 => 65,  111 => 64,  89 => 47,  85 => 16,  82 => 45,  66 => 13,  64 => 31,  47 => 8,  45 => 7,  24 => 3,  75 => 34,  70 => 9,  68 => 15,  63 => 7,  61 => 5,  54 => 10,  34 => 3,  51 => 9,  44 => 5,  41 => 4,  38 => 9,  31 => 11,  28 => 7,  121 => 31,  118 => 47,  107 => 22,  103 => 21,  97 => 20,  95 => 45,  91 => 18,  87 => 10,  80 => 18,  76 => 17,  67 => 32,  65 => 6,  62 => 13,  56 => 10,  52 => 8,  49 => 16,  42 => 6,  39 => 12,  32 => 5,  29 => 4,);
    }
}
