<?php

/* applications/projects/layouts/calendar/months.html */
class __TwigTemplate_204460f784b1fa728ecc2aaa55032a86b1b89a3acddc6ca192d9b74da1fd0d41 extends Twig_Template
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
    <div class=\"pull-right\">
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
            <td set_month=\"1\">");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_1"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"2\">");
        // line 16
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_2"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"3\">");
        // line 17
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_3"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"4\">");
        // line 18
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_4"), "html", null, true));
        echo \layout::func_from_text("</td>
        </tr>
        <tr>
            <td set_month=\"5\">");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_5"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"6\">");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_6"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"7\">");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_7"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"8\">");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_8"), "html", null, true));
        echo \layout::func_from_text("</td>
        </tr>
        <tr>
            <td set_month=\"9\">");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_9"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"10\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_10"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"11\">");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_11"), "html", null, true));
        echo \layout::func_from_text("</td>
            <td set_month=\"12\">");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("month_12"), "html", null, true));
        echo \layout::func_from_text("</td>
        </tr>
    </table>
</section>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/calendar/months.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 30,  85 => 29,  81 => 28,  77 => 27,  71 => 24,  67 => 23,  63 => 22,  59 => 21,  53 => 18,  49 => 17,  45 => 16,  41 => 15,  35 => 12,  29 => 9,  19 => 1,);
    }
}
