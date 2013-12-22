<?php

/* /applications/page/layouts/admin/elements/row.html */
class __TwigTemplate_2abae0ec3923e96e62b41d19fe601721 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"tree_block\" id=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
        echo \layout::func_from_text(" <span class=\"tree_icons\"><span class=\"path\">");
        if ($this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "path")) {
            echo \layout::func_from_text("<a href=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "path"), "html", null, true));
            echo \layout::func_from_text("\" target=\"_blank\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "path"), "html", null, true));
            echo \layout::func_from_text("</a>");
        }
        echo \layout::func_from_text("</span><a class=\"add-btn\" style=\"display:inline-block;margin-bottom: -4px;margin-right:3px;margin-left: 10px;\"><a class=\"edit-btn\" style=\"display:inline-block;margin-bottom: -4px;\"><a class=\"del-btn\" style=\"display:inline-block;margin-bottom: -4px;\"></a></span></div>
");
        // line 2
        if ($this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "category")) {
            // line 3
            echo \layout::func_from_text("<ol>
    ");
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "category"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 5
                echo \layout::func_from_text("        <li id=\"list_");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" menu=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" url=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\">");
                $this->env->loadTemplate("/applications/page/layouts/admin/elements/row.html")->display($context);
                echo \layout::func_from_text("</li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo \layout::func_from_text("</ol>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/page/layouts/admin/elements/row.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 7,  56 => 5,  36 => 3,  19 => 1,  117 => 21,  113 => 19,  91 => 17,  72 => 16,  67 => 14,  64 => 13,  61 => 12,  55 => 10,  52 => 9,  49 => 8,  42 => 6,  39 => 4,  34 => 2,  31 => 2,);
    }
}
