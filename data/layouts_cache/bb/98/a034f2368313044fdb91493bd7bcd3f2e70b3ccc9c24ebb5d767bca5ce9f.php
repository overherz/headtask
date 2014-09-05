<?php

/* applications/users/layouts/users.html */
class __TwigTemplate_bb98a034f2368313044fdb91493bd7bcd3f2e70b3ccc9c24ebb5d767bca5ce9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Пользователи");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "invite.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_context($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("    ");
        if ((isset($context["invite"]) ? $context["invite"] : null)) {
            echo \layout::func_from_text("<input type=\"button\" class=\"btn btn-primary\" value=\"Пригласить\" style=\"position: absolute;right: 15px;\" id=\"invite_user\">");
        }
        // line 11
        echo \layout::func_from_text("    ");
        $this->env->loadTemplate("/source/search_form.html")->display($context);
        // line 12
        echo \layout::func_from_text("    <div id=\"search_result\" style=\"margin: 0 -15px;\">
        ");
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "users_table.html"), "method"));
        $template->display($context);
        // line 14
        echo \layout::func_from_text("    </div>
");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  60 => 13,  57 => 12,  54 => 11,  49 => 10,  46 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
