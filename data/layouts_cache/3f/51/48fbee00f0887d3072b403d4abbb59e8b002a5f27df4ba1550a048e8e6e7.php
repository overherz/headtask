<?php

/* applications/projects/layouts/forum/add_topic.html */
class __TwigTemplate_3f5148fbee00f0887d3072b403d4abbb59e8b002a5f27df4ba1550a048e8e6e7 extends Twig_Template
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
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/ckeditor/", 1 => "ckeditor.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\" src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
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
        echo \layout::func_from_text("<form id=\"topic_form\" class=\"form-horizontal\">
    <input type=\"hidden\" name=\"act\" value=\"save_topic\">
    ");
        // line 17
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 18
        echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"name\">Название темы</label>
        <div class=\"col-lg-10\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"text\">Текст</label>
        <div class=\"col-lg-10\">
            <div class=\"wysiwyg\"><textarea name='text' id='text'>");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "text"), "html", null, true));
        echo \layout::func_from_text("</textarea></div>
        </div>
    </div>
    ");
        // line 30
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            // line 31
            echo \layout::func_from_text("    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"text\">Закрепленная</label>
        <div class=\"col-lg-10 checkbox\">
            <input type=\"checkbox\" name=\"fixed\" value=\"1\" ");
            // line 34
            if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "fixed")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text(">
        </div>
    </div>
    <div class=\"form-group\">
        <label class=\"col-lg-2 control-label\" for=\"text\">Закрытая</label>
        <div class=\"col-lg-10 checkbox\">
            <input type=\"checkbox\" name=\"closed\" value=\"1\" ");
            // line 40
            if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "closed")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text(">
        </div>
    </div>
    ");
        }
        // line 44
        echo \layout::func_from_text("    <div style=\"text-align: center;\">
        <button class=\"btn btn-large btn-primary save_topic\" type=\"button\">");
        // line 45
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
    </div>
<div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/forum/add_topic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 45,  120 => 44,  111 => 40,  100 => 34,  95 => 31,  93 => 30,  87 => 27,  78 => 21,  73 => 18,  67 => 17,  63 => 15,  60 => 14,  54 => 11,  50 => 10,  46 => 9,  42 => 8,  39 => 7,  31 => 4,  28 => 3,);
    }
}
