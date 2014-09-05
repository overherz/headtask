<?php

/* applications/projects/layouts/users/users.html */
class __TwigTemplate_87b6ecca88bc216e6757dc52b0a4487f497b8b8d324af3941a58da5018a192d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Участники ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
    }

    // line 6
    public function block_js($context, array $blocks = array())
    {
        // line 7
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type=\"text/javascript\" src=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "users.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 11
    public function block_project_data($context, array $blocks = array())
    {
        // line 12
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin: 0px;float: left;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\">
        ");
        // line 17
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "users/users_table.html"), "method"));
        $template->display($context);
        // line 18
        echo \layout::func_from_text("    </div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/users/users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 18,  59 => 17,  52 => 12,  49 => 11,  43 => 8,  39 => 7,  36 => 6,  31 => 4,  28 => 3,);
    }
}
