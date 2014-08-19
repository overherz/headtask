<?php

/* applications/projects/layouts/category_form.html */
class __TwigTemplate_dde7f689178bf97b9b76ec7f7410ff2fa5546fa7d32144e8f8660b4524784697 extends Twig_Template
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
        echo \layout::func_from_text("<form id=\"category_form\" class=\"form-horizontal\" style=\"width: 480px;\">
    <input type=\"hidden\" name=\"act\" value=\"save_category\">
    <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["id_project"]) ? $context["id_project"] : null), "html", null, true));
        echo \layout::func_from_text("\">
    ");
        // line 4
        if ((isset($context["category"]) ? $context["category"] : null)) {
            // line 5
            echo \layout::func_from_text("    <input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
    ");
        }
        // line 7
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-3 control-label\" for=\"name\">Название</label>
        <div class=\"col-lg-9\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-3 control-label\" for=\"color\">Цвет фона</label>
        <div class=\"col-lg-9\">
            <input type=\"text\" name=\"color\" id=\"color\" class=\"form-control\" value=\"");
        // line 16
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color"), "html", null, true));
        echo \layout::func_from_text("\" readonly>
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-3 control-label\" for=\"color_text\">Цвет текста</label>
        <div class=\"col-lg-9\">
            <input type=\"text\" name=\"color_text\" id=\"color_text\" class=\"form-control\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color_text"), "html", null, true));
        echo \layout::func_from_text("\" readonly>
        </div>
    </div>

    <span class=\"label\" id=\"category_demo\" style=\"background: ");
        // line 26
        if ((isset($context["category"]) ? $context["category"] : null)) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color"), "html", null, true));
        } else {
            echo \layout::func_from_text("#fff");
        }
        echo \layout::func_from_text(";color: ");
        if ((isset($context["category"]) ? $context["category"] : null)) {
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color_text"), "html", null, true));
        } else {
            echo \layout::func_from_text("#000");
        }
        echo \layout::func_from_text("\">пример</span>
</form>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/category_form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 26,  58 => 22,  49 => 16,  40 => 10,  35 => 7,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
