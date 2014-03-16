<?php

/* applications\projects\layouts\add.html */
class __TwigTemplate_1308ce03875e7aa2ad0f91d359bb8718b1e677ea41ed85398949d0b30dc409fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'project' => array($this, 'block_project'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "index.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    ");
        if ((isset($context["project"]) ? $context["project"] : null)) {
            echo \layout::func_from_text("Редактирование проекта");
        } else {
            echo \layout::func_from_text("Создание проекта");
        }
    }

    // line 7
    public function block_project($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    ");
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project_menu.html"), "method"));
            $template->display($context);
        }
        // line 9
        echo \layout::func_from_text("    <form id=\"project_form\" class=\"form-horizontal\">
        <input type=\"hidden\" name=\"act\" value=\"save_project\">
        ");
        // line 11
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 12
        echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"name\">Название проекта</label>
                <div class=\"col-lg-10\">
                    <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"description\">Описание проекта</label>
                <div class=\"col-lg-10\">
                    <textarea rows=\"5\" class=\"form-control\" name=\"description\" id=\"description\">");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"url\">Ссылка</label>
                <div class=\"col-lg-10\">
                    <input type=\"text\" class=\"form-control\" name=\"url\" id=\"url\" value=\"");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"archive\">Архивный</label>
                <div class=\"col-lg-10 checkbox\">
                    <input type=\"checkbox\" name=\"archive\" id=\"archive\" value=\"1\" ");
        // line 33
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "archive")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text(" />
                </div>
            </div>
            ");
        // line 36
        if (((!$this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) && $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project"))) {
            // line 37
            echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-2 control-label\" for=\"owner\">Личный</label>
                <div class=\"col-lg-10 checkbox\">
                    <input type=\"checkbox\" name=\"owner\" id=\"owner\" value=\"1\" />
                </div>
            </div>
            ");
        }
        // line 44
        echo \layout::func_from_text("            <div class=\"form-group\">
                <div class=\"col-lg-10 col-lg-offset-2\">
                    <button class=\"btn btn-primary save_project\" type=\"button\">");
        // line 46
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
                </div>
            </div>
    </form>
<div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 46,  109 => 44,  100 => 37,  98 => 36,  90 => 33,  81 => 27,  72 => 21,  63 => 15,  58 => 12,  52 => 11,  48 => 9,  42 => 8,  39 => 7,  30 => 4,  27 => 3,);
    }
}
