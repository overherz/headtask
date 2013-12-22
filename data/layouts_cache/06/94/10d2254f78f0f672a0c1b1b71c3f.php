<?php

/* applications\page\layouts\admin/index.html */
class __TwigTemplate_069410d2254f78f0f672a0c1b1b71c3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/html/admin.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/html/admin.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    &rarr; Меню
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "page", 1 => "page.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 8
    public function block_js($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ,\"/source/js/nestedSortable.js\"
    ,\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "page", 1 => "page_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo \layout::func_from_text("<h2>Меню <a class=\"add-btn\" style=\"display:inline-block;margin-bottom: -2px;\"></a></h2>
    ");
        // line 14
        if ((isset($context["menu"]) ? $context["menu"] : null)) {
            echo \layout::func_from_text("   
    <ol class=\"sortable\">
        ");
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
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
                echo \layout::func_from_text("         
        <li id=\"list_");
                // line 17
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
            // line 19
            echo \layout::func_from_text("    </ol>
    ");
        } else {
            // line 21
            echo \layout::func_from_text("        Нет данных
    ");
        }
    }

    public function getTemplateName()
    {
        return "applications\\page\\layouts\\admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 21,  113 => 19,  91 => 17,  72 => 16,  67 => 14,  64 => 13,  61 => 12,  55 => 10,  52 => 9,  49 => 8,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
