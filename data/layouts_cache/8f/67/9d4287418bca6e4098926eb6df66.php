<?php

/* applications\pages\layouts\admin/form.html */
class __TwigTemplate_8f679d4287418bca6e4098926eb6df66 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"add_html\" ");
        if ((!(isset($context["show"]) ? $context["show"] : null))) {
            echo \layout::func_from_text("style=\"display: none;\"");
        }
        echo \layout::func_from_text(">
<form class=\"new_page\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"id_text\" value=\"");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id_text"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">
    <div id=\"tabs\">
        <ul>
            <li><a href=\"#tabs-1\">Описание</a></li>
            <li><a href=\"#tabs-2\">Текст</a></li>
        </ul>
        <div id=\"tabs-1\">
            <div class=\"body\"><span class=\"title\">Название</span>
                <div><input type=\"text\" name=\"name\" value=\"");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Английское название</span>
                <div><input type=\"text\" name=\"url\" value=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Title</span>
                <div><input type=\"text\" name=\"title\" value=\"");
        // line 17
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Keywords</span>
                <div><input type=\"text\" name=\"keywords\" value=\"");
        // line 19
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Description</span>
                <div><textarea name=\"description\" class=\"input\" style=\"width:350px;height:100px;\">");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
        <div id=\"tabs-2\">
            <div class=\"body\">
                <div><textarea name=\"text\" class=\"input\">");
        // line 25
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
    </div>
</form>
</div>");
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 25,  63 => 21,  58 => 19,  53 => 17,  48 => 15,  43 => 13,  31 => 4,  27 => 3,  19 => 1,);
    }
}
