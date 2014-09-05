<?php

/* /source/search_macro.html */
class __TwigTemplate_8b5d559c5e810875c12e00f14356b3d2aa71382551cbd4516424c76385d3f51c extends Twig_Template
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
    }

    // line 1
    public function getinput($_f = null, $_name = null, $_label = null)
    {
        $context = $this->env->mergeGlobals(array(
            "f" => $_f,
            "name" => $_name,
            "label" => $_label,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo \layout::func_from_text("    ");
            if (((isset($context["label"]) ? $context["label"] : null) && ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "text"))) {
                echo \layout::func_from_text("&nbsp;");
                echo \layout::func_from_text($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"));
            }
            // line 3
            echo \layout::func_from_text("    ");
            if ((($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "select") || ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "multy_select"))) {
                // line 4
                echo \layout::func_from_text("    <select name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
                if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "multy_select")) {
                    echo \layout::func_from_text("[]");
                }
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "multy_select")) {
                    echo \layout::func_from_text("multiple='true' size='");
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options")) > 5)) {
                        echo \layout::func_from_text("5");
                    } else {
                        echo \layout::func_from_text(twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options")), "html", null, true));
                    }
                    echo \layout::func_from_text("'");
                }
                echo \layout::func_from_text(">
    ");
                // line 5
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                    // line 6
                    echo \layout::func_from_text("    <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : null), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (twig_in_filter((isset($context["j"]) ? $context["j"] : null), $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected"))) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["o"]) ? $context["o"] : null), "html", null, true));
                    echo \layout::func_from_text("</option>
    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['j'], $context['o'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 8
                echo \layout::func_from_text("    </select>
    ");
            } elseif (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "checkbox")) {
                // line 10
                echo \layout::func_from_text("    <input type='checkbox' name='");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
                echo \layout::func_from_text("' ");
                if ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected")) {
                    echo \layout::func_from_text("checked");
                }
                echo \layout::func_from_text(" style=\"margin-top:-2px;\">
    ");
            } elseif (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "radio")) {
                // line 12
                echo \layout::func_from_text("        ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                    // line 13
                    echo \layout::func_from_text("            <div style=\"white-space: nowrap;\"><input name=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
                    echo \layout::func_from_text("\" type=\"radio\" value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : null), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (twig_in_filter((isset($context["j"]) ? $context["j"] : null), $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected"))) {
                        echo \layout::func_from_text("checked");
                    }
                    echo \layout::func_from_text("> ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["o"]) ? $context["o"] : null), "html", null, true));
                    echo \layout::func_from_text("</div>
        ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['j'], $context['o'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 15
                echo \layout::func_from_text("    ");
            }
            // line 16
            echo \layout::func_from_text("    ");
            if (((isset($context["label"]) ? $context["label"] : null) && ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") != "text"))) {
                echo \layout::func_from_text("&nbsp;");
                echo \layout::func_from_text($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"));
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "/source/search_macro.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 16,  116 => 15,  94 => 12,  43 => 4,  40 => 3,  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 30,  145 => 28,  137 => 27,  130 => 24,  120 => 23,  109 => 21,  100 => 18,  88 => 15,  59 => 11,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 21,  92 => 17,  84 => 10,  79 => 17,  77 => 16,  74 => 15,  60 => 11,  58 => 10,  48 => 6,  25 => 4,  21 => 1,  55 => 9,  33 => 4,  26 => 3,  22 => 2,  190 => 54,  184 => 53,  181 => 34,  176 => 49,  155 => 29,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 22,  104 => 19,  102 => 26,  99 => 13,  86 => 21,  81 => 20,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 31,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 46,  82 => 45,  66 => 13,  64 => 31,  47 => 17,  45 => 8,  24 => 3,  75 => 8,  70 => 13,  68 => 17,  63 => 14,  61 => 5,  54 => 22,  34 => 2,  51 => 9,  44 => 6,  41 => 14,  38 => 13,  31 => 11,  28 => 3,  121 => 31,  118 => 47,  107 => 20,  103 => 37,  97 => 24,  95 => 50,  91 => 22,  87 => 32,  80 => 8,  76 => 19,  67 => 17,  65 => 6,  62 => 12,  56 => 25,  52 => 8,  49 => 16,  42 => 5,  39 => 5,  32 => 5,  29 => 4,);
    }
}
