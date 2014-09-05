<?php

/* /applications/projects/layouts/project.html */
class __TwigTemplate_95a489360c4cdec3c73d69b0ce19bd448b533815b9526c1cf79cf0df77531a15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'project' => array($this, 'block_project'),
            'project_data' => array($this, 'block_project_data'),
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
        echo \layout::func_from_text("        Проект ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
    }

    // line 6
    public function block_project($context, array $blocks = array())
    {
        // line 7
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project_menu.html"), "method"));
        $template->display($context);
        // line 8
        echo \layout::func_from_text("    ");
        $this->displayBlock('project_data', $context, $blocks);
    }

    public function block_project_data($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/project.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 9,  42 => 8,  39 => 7,  36 => 6,  31 => 4,  28 => 3,);
    }
}
