<?php

/* applications\projects\layouts\tasks/gantt.html */
class __TwigTemplate_e64057692ba7969e5552be700938eea8dbf2c28ae620010f51a5edba0cdf5c5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
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
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("<link rel=\"stylesheet\" href=\"/libraries/gantt/css/style.css\" type=\"text/css\" />
");
    }

    // line 11
    public function block_js($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script src=\"/libraries/gantt/js/jquery.fn.gantt.min.js\"></script>
    <script src=\"");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "gantt.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 17
    public function block_project_data($context, array $blocks = array())
    {
        // line 18
        echo \layout::func_from_text("<div class=\"gantt\" style=\"min-height: 50px;\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks/gantt.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 18,  61 => 17,  55 => 14,  50 => 12,  47 => 11,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
