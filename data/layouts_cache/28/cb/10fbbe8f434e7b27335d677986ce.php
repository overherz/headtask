<?php

/* applications\projects\layouts\forum/forum_show.html */
class __TwigTemplate_28cb10fbbe8f434e7b27335d677986ce extends Twig_Template
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
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
<script src=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 14
    public function block_project_data($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin: 0px;float: left;\">
    <input type=\"hidden\" name=\"page\" value=\"\">
</form>
<div class=\"clearfix\"></div>
<div id=\"search_result\">
    ");
        // line 20
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum/topics.html"), "method"));
        $template->display($context);
        // line 21
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\forum/forum_show.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 21,  66 => 20,  59 => 15,  56 => 14,  50 => 11,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
