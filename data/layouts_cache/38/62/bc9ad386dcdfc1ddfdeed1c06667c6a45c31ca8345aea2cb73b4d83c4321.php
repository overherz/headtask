<?php

/* /source/search_macro.html */
class __TwigTemplate_3862bc9ad386dcdfc1ddfdeed1c06667c6a45c31ca8345aea2cb73b4d83c4321 extends Twig_Template
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
        return array (  84 => 10,  80 => 8,  211 => 41,  202 => 40,  192 => 39,  189 => 38,  182 => 35,  172 => 34,  164 => 33,  161 => 32,  159 => 31,  156 => 30,  146 => 29,  138 => 28,  135 => 27,  121 => 24,  113 => 23,  110 => 22,  105 => 20,  101 => 19,  93 => 18,  89 => 16,  63 => 13,  56 => 10,  46 => 9,  38 => 8,  35 => 7,  23 => 3,  79 => 15,  76 => 17,  62 => 13,  60 => 12,  50 => 9,  21 => 1,  58 => 10,  47 => 8,  36 => 4,  27 => 6,  75 => 8,  61 => 5,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  140 => 55,  131 => 25,  129 => 55,  117 => 46,  108 => 21,  100 => 39,  92 => 37,  83 => 31,  74 => 27,  44 => 7,  41 => 5,  34 => 2,  31 => 2,  78 => 9,  71 => 14,  68 => 15,  65 => 6,  54 => 10,  51 => 12,  43 => 4,  40 => 3,  33 => 6,  30 => 5,  119 => 46,  116 => 45,  106 => 38,  102 => 36,  96 => 34,  94 => 22,  90 => 36,  86 => 20,  81 => 19,  77 => 27,  69 => 21,  67 => 20,  64 => 19,  57 => 11,  52 => 13,  49 => 7,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
