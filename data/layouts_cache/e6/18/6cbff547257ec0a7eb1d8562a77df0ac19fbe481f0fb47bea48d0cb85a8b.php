<?php

/* applications\projects\layouts\calendar/months.html */
class __TwigTemplate_e6186cbff547257ec0a7eb1d8562a77df0ac19fbe481f0fb47bea48d0cb85a8b extends Twig_Template
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
        echo \layout::func_from_text("<div>
    <div style=\"float: right;\">
        <a href=\"\">Актуальная дата</a></div>
</div>

<section class=\"month\" style=\"clear: both;\">
    <h2 style=\"text-align: center;\">
        <a class=\"arrow\" href=\"\" change_year=\"dec\">&larr;</a>
        <span id=\"year\">");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["year"]) ? $context["year"] : null), "html", null, true));
        echo \layout::func_from_text("</span>
        <a class=\"arrow\" href=\"\" change_year=\"inc\">&rarr;</a>
    </h2>
    <input type=\"hidden\" name=\"year\" value=\"");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["year"]) ? $context["year"] : null), "html", null, true));
        echo \layout::func_from_text("\">
    <table class=\"table table-bordered months\">
        <tr>
            <td set_month=\"1\">Январь</td>
            <td set_month=\"2\">Февраль</td>
            <td set_month=\"3\">Март</td>
            <td set_month=\"4\">Апрель</td>
        </tr>
        <tr>
            <td set_month=\"5\">Май</td>
            <td set_month=\"6\">Июнь</td>
            <td set_month=\"7\">Июль</td>
            <td set_month=\"8\">Август</td>
        </tr>
        <tr>
            <td set_month=\"9\">Сентябрь</td>
            <td set_month=\"10\">Октябрь</td>
            <td set_month=\"11\">Ноябрь</td>
            <td set_month=\"12\">Декабрь</td>
        </tr>
    </table>
</section>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\calendar/months.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 12,  29 => 9,  19 => 1,);
    }
}
