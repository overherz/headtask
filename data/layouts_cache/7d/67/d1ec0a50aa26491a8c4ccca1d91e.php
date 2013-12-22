<?php

/* applications\projects\layouts\all_projects.html */
class __TwigTemplate_7d67d1ec0a50aa26491a8c4ccca1d91e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project' => array($this, 'block_project'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "index.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Все проекты
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    ");
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
");
    }

    // line 12
    public function block_project($context, array $blocks = array())
    {
        // line 13
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 14
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" style=\"margin-bottom:0;\">
    <input type=\"text\" size=\"50\" name=\"search\" class=\"input-large\" placeholder=\"Поиск\">
    <input type=\"hidden\" name=\"page\">
</form>
<div id=\"search_result\">");
        // line 18
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "all_projects_table.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\all_projects.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 18,  52 => 14,  50 => 13,  47 => 12,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
