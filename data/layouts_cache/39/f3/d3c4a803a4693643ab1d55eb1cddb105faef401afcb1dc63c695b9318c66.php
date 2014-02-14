<?php

/* /applications/options/layouts/admin/options_table.html */
class __TwigTemplate_39f3d3c4a803a4693643ab1d55eb1cddb105faef401afcb1dc63c695b9318c66 extends Twig_Template
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
        if ((isset($context["options"]) ? $context["options"] : null)) {
            // line 2
            echo \layout::func_from_text("    <div class=\"panel-group\" id=\"accordion\">
        ");
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
                // line 4
                echo \layout::func_from_text("        <div class=\"panel panel-default\">
            <div class=\"panel-heading get_options\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse");
                // line 5
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
                <h4 class=\"panel-title\">");
                // line 6
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</h4>
            </div>
            <div id=\"collapse");
                // line 8
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"panel-collapse collapse\" data-id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
                <div class=\"panel-body\" data-result=\"");
                // line 9
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">

                </div>
            </div>
        </div>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['op'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo \layout::func_from_text("    </div>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/options/layouts/admin/options_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  46 => 9,  40 => 8,  35 => 6,  28 => 4,  24 => 3,  21 => 2,  19 => 1,  65 => 14,  62 => 13,  59 => 12,  52 => 9,  49 => 8,  42 => 6,  39 => 5,  34 => 3,  31 => 5,);
    }
}
