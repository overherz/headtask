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
        return array (  49 => 9,  39 => 7,  36 => 6,  28 => 3,  301 => 80,  297 => 78,  288 => 74,  282 => 72,  277 => 69,  274 => 68,  263 => 67,  256 => 66,  245 => 65,  243 => 64,  239 => 62,  237 => 61,  233 => 59,  230 => 58,  219 => 57,  217 => 56,  210 => 55,  206 => 53,  190 => 49,  188 => 48,  185 => 47,  183 => 46,  160 => 40,  157 => 39,  154 => 38,  148 => 36,  146 => 35,  137 => 33,  134 => 32,  131 => 31,  118 => 29,  113 => 28,  111 => 27,  100 => 26,  90 => 24,  88 => 23,  85 => 22,  79 => 20,  77 => 19,  67 => 18,  62 => 17,  57 => 16,  52 => 12,  45 => 11,  41 => 10,  31 => 4,  27 => 6,  119 => 16,  99 => 13,  94 => 12,  84 => 10,  65 => 6,  61 => 5,  43 => 8,  40 => 3,  34 => 8,  21 => 2,  197 => 86,  194 => 51,  184 => 78,  178 => 75,  174 => 74,  170 => 42,  166 => 41,  151 => 37,  143 => 34,  136 => 49,  130 => 46,  127 => 45,  125 => 44,  120 => 42,  116 => 15,  110 => 40,  104 => 39,  98 => 38,  92 => 37,  87 => 35,  80 => 8,  76 => 28,  74 => 27,  59 => 15,  55 => 14,  48 => 12,  42 => 8,  38 => 9,  25 => 3,  22 => 2,  19 => 1,);
    }
}
