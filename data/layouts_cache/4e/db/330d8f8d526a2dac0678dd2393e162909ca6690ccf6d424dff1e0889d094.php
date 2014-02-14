<?php

/* applications\projects\layouts\users/delete_user_form.html */
class __TwigTemplate_4edb330d8f8d526a2dac0678dd2393e162909ca6690ccf6d424dff1e0889d094 extends Twig_Template
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
        echo \layout::func_from_text("<div style='text-align:center;margin-bottom: 20px;'>Вы хотите удалить этого участника?</div>
Делегировать задачи:&nbsp;
<select name=\"delegate\">
    <option value=\"none\">никому</option>
    ");
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 6
            echo \layout::func_from_text("        <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text(" ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "nickname"), "html", null, true));
            echo \layout::func_from_text("</option>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo \layout::func_from_text("</select>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\users/delete_user_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  29 => 6,  25 => 5,  19 => 1,);
    }
}
