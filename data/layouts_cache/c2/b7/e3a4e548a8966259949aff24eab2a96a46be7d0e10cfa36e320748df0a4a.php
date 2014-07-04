<?php

/* /applications/menu/layouts/admin/elements/row.html */
class __TwigTemplate_c2b7e3a4e548a8966259949aff24eab2a96a46be7d0e10cfa36e320748df0a4a extends Twig_Template
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
        echo \layout::func_from_text("\">
    ");
        // line 2
        if ($this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "path")) {
            echo \layout::func_from_text("<a href=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "path"), "html", null, true));
            echo \layout::func_from_text("\" target=\"_blank\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>");
        }
        // line 3
        echo \layout::func_from_text("    <span class=\"tree_icons\">
        <a class=\"fa fa-plus fa-fw fa-15x add-btn\"></a>
        <a class=\"fa fa-edit fa-fw fa-15x edit-btn\"></a>
        <a class=\"fa fa-trash-o fa-fw fa-15x del-btn\"></a>
    </span>
</div>
");
        // line 9
        if ($this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "category")) {
            // line 10
            echo \layout::func_from_text("<ol>
    ");
            // line 11
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
                // line 12
                echo \layout::func_from_text("        <li id=\"list_");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" menu=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" url=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "url"), "html", null, true));
                echo \layout::func_from_text("\">");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "menu", 1 => "admin/elements/row.html"), "method"));
                $template->display($context);
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
            // line 14
            echo \layout::func_from_text("</ol>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/menu/layouts/admin/elements/row.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 14,  62 => 12,  45 => 11,  32 => 3,  24 => 2,  19 => 1,  343 => 162,  338 => 122,  333 => 17,  325 => 163,  323 => 162,  319 => 161,  277 => 122,  268 => 115,  249 => 112,  242 => 111,  238 => 110,  212 => 86,  206 => 85,  199 => 81,  191 => 80,  187 => 79,  180 => 78,  177 => 77,  174 => 76,  171 => 75,  167 => 73,  165 => 72,  154 => 70,  151 => 69,  148 => 68,  143 => 66,  138 => 64,  130 => 63,  126 => 62,  123 => 61,  120 => 60,  117 => 59,  110 => 57,  105 => 54,  99 => 53,  94 => 52,  89 => 51,  87 => 50,  68 => 39,  40 => 9,  22 => 1,  118 => 21,  114 => 58,  91 => 17,  72 => 40,  69 => 15,  67 => 14,  64 => 13,  61 => 12,  55 => 29,  52 => 9,  49 => 8,  42 => 10,  39 => 5,  34 => 3,  31 => 2,);
    }
}
