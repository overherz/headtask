<?php

/* applications\projects\layouts\documents/add_documents.html */
class __TwigTemplate_8d2c4e8cd30f52512dd73e908e35168d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        if ((isset($context["documents"]) ? $context["documents"] : null)) {
            echo \layout::func_from_text("Редактирование новости");
        } else {
            echo \layout::func_from_text("Добавление новости");
        }
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>

<script src=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 14
    public function block_project_data($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("<form id=\"documents_form\" class=\"form-horizontal\">
    <input type=\"hidden\" name=\"act\" value=\"save_documents\">
    ");
        // line 17
        if ($this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 18
        echo \layout::func_from_text("        <div class=\"docs-input-sizes\">
            <div class=\"control-group\">
                <label class=\"control-label\" for=\"name\">Название</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"name\" id=\"name\" class=\"input-xxlarge\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\" for=\"description\">Текст</label>
                <div class=\"controls\">
                    <div class=\"wysiwyg\"><textarea rows=\"5\" class=\"input-xxlarge\" name=\"description\" id=\"description\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["documents"]) ? $context["documents"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea></div>
                </div>
            </div>
            <div style=\"text-align: center\">
                <button class=\"btn btn-large btn-primary save_documents\" type=\"button\">");
        // line 32
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
        return "applications\\projects\\layouts\\documents/add_documents.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 32,  82 => 28,  73 => 22,  67 => 18,  61 => 17,  57 => 15,  54 => 14,  48 => 11,  42 => 8,  39 => 7,  31 => 4,  28 => 3,);
    }
}
