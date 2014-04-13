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
        if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
            // line 2
            echo \layout::func_from_text("    <a class=\"fa fa-15x fa-plus add-btn add-category\"></a>
");
        }
        // line 4
        echo \layout::func_from_text("
");
        // line 5
        if ((isset($context["options"]) ? $context["options"] : null)) {
            // line 6
            echo \layout::func_from_text("    <div class=\"panel-group\" id=\"accordion\">
        ");
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
                // line 8
                echo \layout::func_from_text("        <div class=\"panel panel-default\">
            <div class=\"panel-heading get_options\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse");
                // line 9
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
                <h4 class=\"panel-title\">");
                // line 10
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</h4>
                <div style=\"text-align: right;margin-top: 10px;\">
                    ");
                // line 12
                if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                    // line 13
                    echo \layout::func_from_text("                        <a class=\"fa fa-edit fa-15x edit-btn fa-fw edit-btn-category\" id=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"></a>
                        <a class=\"fa fa-trash-o fa-15x fa-fw del-btn\" id=\"");
                    // line 14
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"></a>
                        <a class=\"fa fa-plus fa-15x fa-fw add-btn add-subcategory\" data-id=\"");
                    // line 15
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"></a>
                    ");
                }
                // line 17
                echo \layout::func_from_text("                </div>
            </div>
            <div id=\"collapse");
                // line 19
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"panel-collapse collapse\" data-id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
                <div class=\"panel-body\" data-result=\"");
                // line 20
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
            // line 26
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
        return array (  87 => 26,  75 => 20,  69 => 19,  60 => 15,  56 => 14,  51 => 13,  44 => 10,  40 => 9,  37 => 8,  33 => 7,  30 => 6,  28 => 5,  25 => 4,  21 => 2,  19 => 1,  65 => 17,  62 => 13,  59 => 12,  52 => 9,  49 => 12,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
