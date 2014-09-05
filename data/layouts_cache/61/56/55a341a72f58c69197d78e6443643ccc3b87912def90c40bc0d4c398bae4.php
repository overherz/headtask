<?php

/* applications/projects/layouts/logs_index.html */
class __TwigTemplate_615655a341a72f58c69197d78e6443643ccc3b87912def90c40bc0d4c398bae4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Общая лента");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("<script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_context($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:20px;\">
    <input type=\"hidden\" name=\"page\" value=\"\">
    <table class=\"table table_style no_style\" style=\"width: auto;margin-top: 0\">
        <thead>
            <tr>
                <th>Тип</th>
                <th>Дата</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name=\"type[]\" multiple size=\"");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["types"]) ? $context["types"] : null)), "html", null, true));
        echo \layout::func_from_text("\">
                        ");
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 25
            echo \layout::func_from_text("                            <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang(("type_" . (isset($context["i"]) ? $context["i"] : null))), "html", null, true));
            echo \layout::func_from_text("</option>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo \layout::func_from_text("                    </select>
                </td>
                <td>
                    От: <input type=\"text\" name=\"start\" value=\"");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" readonly style=\"width: 90px;margin-bottom: 10px;\"><br>
                    До: <input type=\"text\" name=\"end\" value=\"");
        // line 31
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" readonly style=\"width: 90px;\">
                </td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\">
                </td>
            </tr>
        </tbody>
    </table>
</form>

<div id=\"search_result\">
    ");
        // line 42
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.html"), "method"));
        $template->display($context);
        // line 43
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
        return array (  109 => 43,  106 => 42,  92 => 31,  88 => 30,  83 => 27,  72 => 25,  68 => 24,  64 => 23,  49 => 10,  46 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
