<?php

/* applications\users\layouts\admin/all_users.html */
class __TwigTemplate_1326846710c7a067129a0414cf1497a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo \layout::func_from_text("&rarr; Пользователи");
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    ,\"/applications/users/source/js/admin.js\"
    ,\"/source/js/search.js\"
");
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" style=\"margin-bottom:20px;\">
    Поиск:&nbsp;<input type=\"text\" name=\"search\" class=\"input\">
    <input type=\"hidden\" name=\"page\" value=\"\">
    ");
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["f"]) {
            // line 12
            echo \layout::func_from_text("    &nbsp;");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"), "html", null, true));
            echo \layout::func_from_text("
        ");
            // line 13
            if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "select")) {
                // line 14
                echo \layout::func_from_text("            &nbsp;<select name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\">
                ");
                // line 15
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                    // line 16
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
                // line 18
                echo \layout::func_from_text("            </select>
        ");
            }
            // line 20
            echo \layout::func_from_text("    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo \layout::func_from_text("</form>
<div id=\"search_result\">
    ");
        // line 23
        $this->env->loadTemplate("/applications/users/layouts/admin/elements/all_result.html")->display($context);
        // line 24
        echo \layout::func_from_text("</div>

");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\admin/all_users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 24,  102 => 23,  98 => 21,  92 => 20,  88 => 18,  73 => 16,  69 => 15,  64 => 14,  62 => 13,  57 => 12,  53 => 11,  48 => 8,  45 => 7,  39 => 4,  36 => 3,  30 => 2,);
    }
}
