<?php

/* applications\pages\layouts\admin/pages.html */
class __TwigTemplate_3c03fea7cf5046838eb93d1a5f794ed9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/admin/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    &rarr; Статические страницы
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    
");
    }

    // line 8
    public function block_js($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ,\"/source/js/search.js\"
    ,\"/source/js/ckeditor/ckeditor.js\"
    ,\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "pages", 1 => "pages_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" style=\"margin-bottom:20px;\">
    Поиск:&nbsp;<input type=\"text\" name=\"search\" class=\"input\">
    <input type=\"hidden\" name=\"page\">
    ");
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["f"]) {
            // line 18
            echo \layout::func_from_text("    &nbsp;");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"), "html", null, true));
            echo \layout::func_from_text("
        ");
            // line 19
            if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "select")) {
                // line 20
                echo \layout::func_from_text("            &nbsp;<select name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\">
                ");
                // line 21
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                    // line 22
                    echo \layout::func_from_text("                <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : null), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected") == (isset($context["j"]) ? $context["j"] : null))) {
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
                // line 24
                echo \layout::func_from_text("            </select>
        ");
            }
            // line 26
            echo \layout::func_from_text("    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo \layout::func_from_text("</form>
<div id=\"search_result\">");
        // line 28
        $this->env->loadTemplate("/applications/pages/layouts/admin/pages_table.html")->display($context);
        echo \layout::func_from_text("</div>

");
        // line 30
        $this->env->loadTemplate("/applications/pages/layouts/admin/form.html")->display($context);
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\admin/pages.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 30,  116 => 28,  113 => 27,  107 => 26,  103 => 24,  88 => 22,  84 => 21,  79 => 20,  77 => 19,  72 => 18,  68 => 17,  63 => 14,  60 => 13,  54 => 11,  50 => 9,  47 => 8,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
