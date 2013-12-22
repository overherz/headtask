<?php

/* applications\projects\layouts\forum/add_forum.html */
class __TwigTemplate_f79abc633ced89773b98c9436fc883d8 extends Twig_Template
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
        if ((isset($context["forum"]) ? $context["forum"] : null)) {
            echo \layout::func_from_text("Редактирование форума");
        } else {
            echo \layout::func_from_text("Добавление форума");
        }
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 13
    public function block_project_data($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("<form id=\"forum_form\" class=\"form-horizontal form-small\">
    <input type=\"hidden\" name=\"act\" value=\"save_forum\">
    ");
        // line 16
        if ($this->getAttribute((isset($context["forum"]) ? $context["forum"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["forum"]) ? $context["forum"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 17
        echo \layout::func_from_text("    <div class=\"docs-input-sizes\">
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"name\">Название</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"name\" id=\"name\" class=\"input-xxlarge\" value=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["forum"]) ? $context["forum"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" style=\"display: inline-block;\">
             </div>
         </div>
        <div style=\"text-align: center;margin-top: 50px;\">
            <button class=\"btn btn-large btn-primary save_forum\" type=\"button\">");
        // line 25
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
        return "applications\\projects\\layouts\\forum/add_forum.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 25,  75 => 21,  69 => 17,  63 => 16,  59 => 14,  56 => 13,  50 => 10,  46 => 9,  42 => 8,  39 => 7,  31 => 4,  28 => 3,);
    }
}
