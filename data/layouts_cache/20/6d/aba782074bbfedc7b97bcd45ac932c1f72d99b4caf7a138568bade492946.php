<?php

/* applications/projects/layouts/all_projects.html */
class __TwigTemplate_206daba782074bbfedc7b97bcd45ac932c1f72d99b4caf7a138568bade492946 extends Twig_Template
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
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\">
        <div class=\"form-group col-xs-6\" style=\"padding-left: 0;\">
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Поиск\" style=\"margin-bottom: 10px;\">
            Личные <input type=\"checkbox\" name=\"my\" value=\"1\" ");
        // line 16
        if (($this->getAttribute((isset($context["get_data"]) ? $context["get_data"] : null), "filter") == "my")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text(">
        </div>
        <input type=\"hidden\" name=\"page\" value=\"\">
    </form>
    <div class=\"clearfix\"></div>

<div id=\"search_result\">");
        // line 22
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "all_projects_table.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/all_projects.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 22,  55 => 16,  50 => 13,  47 => 12,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
