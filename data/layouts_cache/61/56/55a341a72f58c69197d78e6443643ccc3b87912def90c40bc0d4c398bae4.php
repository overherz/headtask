<?php

/* applications/projects/layouts/logs_index.html */
class __TwigTemplate_615655a341a72f58c69197d78e6443643ccc3b87912def90c40bc0d4c398bae4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("<script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
<script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
");
    }

    // line 9
    public function block_context($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:20px;\">
    <input type=\"hidden\" name=\"page\" value=\"\">
    Тип <select name=\"type\">
        <option>&nbsp;</option>
        ");
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 15
            echo \layout::func_from_text("            <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . (isset($context["i"]) ? $context["i"] : null))), "html", null, true));
            echo \layout::func_from_text("</option>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo \layout::func_from_text("    </select>&nbsp;
    <i class=\"fa fa-calendar\"></i> <input type=\"text\" name=\"start\" value=\"");
        // line 18
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly> <i class=\"fa fa-arrow-right\"></i> <input type=\"text\" name=\"end\" value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly>
</form>

<div id=\"search_result\">
    ");
        // line 22
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.html"), "method"));
        $template->display($context);
        // line 23
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/logs_index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 23,  77 => 22,  68 => 18,  65 => 17,  54 => 15,  50 => 14,  44 => 10,  41 => 9,  32 => 4,  29 => 3,);
    }
}
