<?php

/* applications\users\layouts\recovery.html */
class __TwigTemplate_2f14bd524d9cab9d6ca4fcd906ae8a99aad7351f18122971949d4e5c107f2aa7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
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

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("<script>
    \$(document).ready(function(\$)
    {
        \$(\".menu a\").removeClass(\"active\");
    });
</script>
");
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo \layout::func_from_text("<div class=\"content\">
");
        // line 13
        if ((isset($context["id"]) ? $context["id"] : null)) {
            // line 14
            echo \layout::func_from_text("    ");
            if ((isset($context["error"]) ? $context["error"] : null)) {
                echo \layout::func_from_text("<span style=\"color:red;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true));
                echo \layout::func_from_text("</span>
    ");
            } elseif ((isset($context["change"]) ? $context["change"] : null)) {
                // line 16
                echo \layout::func_from_text("        <div style=\"color:green;\">Вам отправлено письмо с новым паролем</div>    
    ");
            }
        } else {
            // line 19
            echo \layout::func_from_text("    ");
            if ((isset($context["success"]) ? $context["success"] : null)) {
                // line 20
                echo \layout::func_from_text("    <div style=\"color:green;\">Вам отправлено письмо с инструкцией</div>
    ");
            } else {
                // line 22
                echo \layout::func_from_text("    <form method=\"post\">
        Логин <span style=\"color:red;\">");
                // line 23
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true));
                echo \layout::func_from_text("</span><br>
        <input type=\"text\" name=\"email\" maxlength=\"60\" class=\"input\"/><br><br>
        <a class=\"newbtn\" href=\"\" onclick=\"\$(this).parent().submit();return false;\"><span>Запросить восстановление</span></a>
    </form>
    ");
            }
        }
        // line 29
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\recovery.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 29,  73 => 23,  70 => 22,  66 => 20,  63 => 19,  58 => 16,  50 => 14,  48 => 13,  45 => 12,  42 => 11,  32 => 4,  29 => 3,);
    }
}
