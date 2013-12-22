<?php

/* /error/404.html */
class __TwigTemplate_8dcac82bad5387c42d3d9cf2555578db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'crumbs' => array($this, 'block_crumbs'),
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
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    <style>
        #wrap {
            background: #fff;
        }
    </style>
");
    }

    // line 9
    public function block_js($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<script>
    \$(document).ready(function(\$)
    {
        \$(\".menu a\").removeClass(\"active\");
    });
</script>
");
    }

    // line 17
    public function block_crumbs($context, array $blocks = array())
    {
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        // line 20
        echo \layout::func_from_text("<div style=\"text-align: center;\">
    <img src=\"/source/images/404.jpg\" style=\"height: 500px;\">
    <div>
    ");
        // line 23
        if ((isset($context["referer"]) ? $context["referer"] : null)) {
            echo \layout::func_from_text("<a href=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["referer"]) ? $context["referer"] : null), "html", null, true));
            echo \layout::func_from_text("\">вернуться на предыдущую страницу</a>
    ");
        } else {
            // line 24
            echo \layout::func_from_text(" <a href=\"/\">вернуться на главную страницу</a>
    ");
        }
        // line 26
        echo \layout::func_from_text("    </div>
</div>
");
    }

    public function getTemplateName()
    {
        return "/error/404.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 26,  76 => 24,  69 => 23,  64 => 20,  61 => 19,  56 => 17,  46 => 10,  43 => 9,  34 => 3,  31 => 2,);
    }
}
