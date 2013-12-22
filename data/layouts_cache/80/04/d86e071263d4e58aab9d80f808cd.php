<?php

/* applications\pages\layouts\index.html */
class __TwigTemplate_8004d86e071263d4e58aab9d80f808cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true));
        } else {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true));
        }
    }

    // line 3
    public function block_keywords($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords"), "html", null, true));
        } else {
            $this->displayParentBlock("keywords", $context, $blocks);
        }
    }

    // line 4
    public function block_description($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description"), "html", null, true));
        } else {
            $this->displayParentBlock("description", $context, $blocks);
        }
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
        // line 7
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "pages", 1 => "pages.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 9
    public function block_js($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "pages", 1 => "pages.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("<div class=\"title_block\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</div>
<div class=\"content_text\"><div class=\"wysiwyg\">");
        // line 15
        echo \layout::func_from_text($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"));
        echo \layout::func_from_text("</div></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 15,  86 => 14,  83 => 13,  76 => 10,  73 => 9,  66 => 7,  63 => 6,  53 => 4,  43 => 3,  33 => 2,);
    }
}
