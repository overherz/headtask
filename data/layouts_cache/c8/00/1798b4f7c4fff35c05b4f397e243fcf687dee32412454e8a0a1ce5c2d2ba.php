<?php

/* applications\pages\layouts\templates/index.html */
class __TwigTemplate_c8001798b4f7c4fff35c05b4f397e243fcf687dee32412454e8a0a1ce5c2d2ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
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
        echo \layout::func_from_text("    <div class=\"wysiwyg\">");
        echo \layout::func_from_text($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"));
        echo \layout::func_from_text("</div>
");
    }

    // line 16
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\templates/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 16,  87 => 14,  84 => 13,  77 => 10,  74 => 9,  67 => 7,  64 => 6,  54 => 4,  44 => 3,  34 => 2,);
    }
}
