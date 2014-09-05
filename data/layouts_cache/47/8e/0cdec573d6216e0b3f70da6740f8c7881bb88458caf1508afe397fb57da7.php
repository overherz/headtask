<?php

/* applications/projects/layouts/tasks/tasks.html */
class __TwigTemplate_478e0cdec573d6216e0b3f70da6740f8c7881bb88458caf1508afe397fb57da7 extends Twig_Template
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
        echo \layout::func_from_text("Задачи ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
    }

    // line 6
    public function block_js($context, array $blocks = array())
    {
        // line 7
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script src=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 11
    public function block_project_data($context, array $blocks = array())
    {
        // line 12
        echo \layout::func_from_text("    ");
        echo \layout::func_from_text((isset($context["user_tasks"]) ? $context["user_tasks"] : null));
        echo \layout::func_from_text("
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  49 => 11,  43 => 8,  39 => 7,  36 => 6,  31 => 4,  28 => 3,);
    }
}
