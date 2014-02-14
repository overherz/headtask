<?php

/* /applications/pages/layouts/admin/nested_option.html */
class __TwigTemplate_a119138aa7ab16b1c12c458f5541219830d8d3565b56db5742efe61d8dcdbfbe extends Twig_Template
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
        if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id") != $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"))) {
            // line 2
            echo \layout::func_from_text("    ");
            $context["depth"] = ((isset($context["depth"]) ? $context["depth"] : null) + 1);
            // line 3
            echo \layout::func_from_text("    <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id") == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "parent_id"))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">
        ");
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (isset($context["depth"]) ? $context["depth"] : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                echo \layout::func_from_text("- ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 5
            echo \layout::func_from_text("        ");
            echo \layout::func_from_text(twig_escape_filter($this->env, cut($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), 40), "html", null, true));
            echo \layout::func_from_text("
    </option>
    ");
            // line 7
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "sub")) {
                // line 8
                echo \layout::func_from_text("        ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "sub"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 9
                    echo \layout::func_from_text("            ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "pages", 1 => "admin/nested_option.html"), "method"));
                    $template->display($context);
                    // line 10
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo \layout::func_from_text("    ");
            }
        }
    }

    public function getTemplateName()
    {
        return "/applications/pages/layouts/admin/nested_option.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 11,  72 => 10,  68 => 9,  50 => 8,  48 => 7,  42 => 5,  33 => 4,  24 => 3,  21 => 2,  162 => 40,  155 => 36,  150 => 34,  145 => 32,  140 => 30,  135 => 28,  129 => 24,  115 => 23,  112 => 22,  98 => 21,  94 => 20,  77 => 19,  66 => 18,  63 => 17,  46 => 16,  31 => 4,  27 => 3,  19 => 1,);
    }
}
