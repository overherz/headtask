<?php

/* applications\projects\layouts\forum/add_topic.html */
class __TwigTemplate_7ab16cb54d43e63672b2a983ec29f5b7 extends Twig_Template
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
<script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>
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
        echo \layout::func_from_text("    <div class=\"docs-input-sizes\">
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"name\">Название темы</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"name\" id=\"name\" class=\"input-xxlarge\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\">
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"text\">Текст</label>
            <div class=\"controls\">
                <div class=\"wysiwyg\"><textarea name='text' id='text'>");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "text"), "html", null, true));
        echo \layout::func_from_text("</textarea></div>
            </div>
        </div>
        ");
        // line 31
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            // line 32
            echo \layout::func_from_text("        <div class=\"control-group\">
            <label class=\"control-label\" for=\"text\">Закрепленная</label>
            <div class=\"controls\">
                <input type=\"checkbox\" name=\"fixed\" value=\"1\" ");
            // line 35
            if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "fixed")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text(">
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"text\">Закрытая</label>
            <div class=\"controls\">
                <input type=\"checkbox\" name=\"closed\" value=\"1\" ");
            // line 41
            if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "closed")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text(">
            </div>
        </div>
        ");
        }
        // line 45
        echo \layout::func_from_text("    </div>
    <div style=\"text-align: center;\">
        <button class=\"btn btn-large btn-primary save_topic\" type=\"button\">");
        // line 47
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
        return "applications\\projects\\layouts\\forum/add_topic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 47,  118 => 45,  109 => 41,  98 => 35,  93 => 32,  91 => 31,  85 => 28,  76 => 22,  70 => 18,  64 => 17,  60 => 15,  57 => 14,  51 => 11,  47 => 10,  42 => 8,  39 => 7,  31 => 4,  28 => 3,);
    }
}
