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
            if ((isset($context["label"]) ? $context["label"] : null)) {
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
        return array (  84 => 10,  80 => 8,  210 => 40,  201 => 39,  191 => 38,  188 => 37,  181 => 34,  171 => 33,  163 => 32,  160 => 31,  158 => 30,  155 => 29,  145 => 28,  137 => 27,  134 => 26,  120 => 23,  109 => 21,  107 => 20,  104 => 19,  88 => 15,  70 => 13,  59 => 11,  55 => 9,  45 => 8,  37 => 7,  23 => 3,  94 => 22,  79 => 18,  76 => 17,  62 => 12,  57 => 11,  50 => 9,  47 => 8,  21 => 1,  56 => 8,  38 => 4,  27 => 6,  75 => 8,  61 => 5,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  139 => 54,  130 => 24,  128 => 54,  117 => 46,  108 => 23,  100 => 18,  83 => 31,  81 => 19,  74 => 27,  44 => 7,  41 => 5,  34 => 2,  31 => 2,  78 => 14,  71 => 26,  68 => 15,  54 => 10,  51 => 12,  43 => 4,  40 => 3,  33 => 4,  30 => 5,  115 => 45,  112 => 22,  102 => 37,  98 => 35,  92 => 17,  90 => 36,  86 => 20,  82 => 30,  77 => 27,  73 => 26,  65 => 6,  63 => 19,  60 => 12,  52 => 13,  49 => 6,  42 => 8,  39 => 7,  32 => 5,  29 => 3,);
    }
}
