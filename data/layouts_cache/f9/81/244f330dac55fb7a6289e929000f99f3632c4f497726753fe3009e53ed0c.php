<?php

/* applications\options\layouts\/admin/edit_group.html */
class __TwigTemplate_f981244f330dac55fb7a6289e929000f99f3632c4f497726753fe3009e53ed0c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<form class=\"group\">
    <input type=\"hidden\" name=\"act\" value=\"save_group\">
    <input type=\"hidden\" name=\"act_group\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["act"]) ? $context["act"] : null), "html", null, true));
        echo \layout::func_from_text("\">
");
        // line 4
        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 5
        echo \layout::func_from_text("<div class=\"body\"><span class=\"title\">Название:</span>
    <div><input type=\"text\" name=\"name\" value=\"");
        // line 6
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input_text\"></div></div>
</form>
");
    }

    public function getTemplateName()
    {
        return "applications\\options\\layouts\\/admin/edit_group.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 6,  33 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
